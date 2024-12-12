<?php

namespace App\Services;

use App\Models\User;
use App\Models\Role;
use App\Models\AppLink;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

use Carbon\Carbon;
use Illuminate\Support\Facades\Http;

/**
 *
 */
trait Helpers
{
    private $log;
    private $store;
    public $dataStore;
    public $statuses = ['Inactivated', 'Activated'];
    public $folderPaths = ['0' => 'others', 1 => 'admins', 2 => 'admins', 3 => 'officers', 4 => 'account'];

    private static $me;
    public static $route;
    public static $prefixes;
    public static $smsData;
    public static $currentAction;
    public static $prefix = 'admin';
    public static $prefixContainer = false;
    public static $paymentTypes = ['Bank', 'Nagad', 'bKash', 'Rocket'];
    public static $permissions = [
        1 => ['id' => 1, 'rm' => 'index,show', 'name' => 'Read', 'icon' => 'Read', 'alert' => 'success'],
        2 => ['id' => 2, 'rm' => 'create,store', 'name' => 'Add', 'icon' => 'Read', 'alert' => 'primary'],
        3 => ['id' => 3, 'rm' => 'edit', 'name' => 'Edit', 'icon' => 'Read', 'alert' => 'warning'],
        4 => ['id' => 4, 'rm' => 'update', 'name' => 'Update', 'icon' => 'Read', 'alert' => 'warning'],
        5 => ['id' => 5, 'rm' => 'destroy', 'name' => 'Delete', 'icon' => 'Read', 'alert' => 'danger']
    ];
    public static $actions = ['index', 'show', 'create', 'store', 'edit', 'update', 'destroy'];

    public function storeData($key, $value)
    {
        $this->store[$key] = $value;
    }
    public function get(string $key, $default = null)
    {
        if (!$this->store) return null;
        return $this->store[$key];
    }
    public function unsetData($key)
    {
        unset($this->store[$key]);
    }

    public static function getMe()
    {
        self::$me = self::$me ? self::$me : new self();
        return self::$me;
    }

    /**
     * file upload and old file delete.
     * want to delete old file then pass file path or not then pass false
     * user role to get user file upload folder
     * @param  string|\App\Models\Role as $role->id  $userRoll
     * @param  string|bool  $file
     * @param  string  $key // file key
     * @return string $file
     */
    public function fileUploadHandle($userRoll = 0, $file = false, $key = 'photo')
    {
        $request = request();
        if ($request->hasFile($key)) {
            $photo = $request->file($key);

            $directory = 'others';
            if (is_numeric($userRoll) && isset($this->folderPaths[$userRoll])) {
                $directory = $this->folderPaths[$userRoll];
            } elseif (is_string($userRoll)) {
                $directory = $userRoll;
            }

            $name = time() . random_int(5, 95) . '.' . $photo->getClientOriginalExtension();

            $directory = "media/uploads/{$directory}/";

            // check file directory is exists
            if (!File::isDirectory($directory)) {
                File::makeDirectory($directory, 0777, true, true);
            }

            // $photo->move(public_path($directory), $name);

            !file_exists(public_path("{$directory}{$name}")) ? $photo->move(public_path($directory), $name) : false;
            $file && fileDelete($file);
            $file = "{$directory}{$name}";
        }
        return $file;
    }

    /**
     * User create or Update.
     * if create a new user then pass array of user info with specific key
     * if update a existing user then pass user object
     * @param  []:\App\Models\User $user
     * @return \App\Models\User $user
     */
    protected function userCreateUpdate($user, $update = [])
    {
        if (is_array($user) && !$update) {
            extract($user);
            $school_id = isset($school_id) ? $school_id : 0;
            if (!isset($table_id)) {
                $table_id = User::where('role_id', $role_id)->count() + 1;
                $table_id = "{$role_id}{$table_id}";
            }
            $user['name'] = $name ?? (isset($fname) ? $fname . ' ' . $lname : 'N/A');
            $user['username'] = usernameGenerate($school_id, $role_id, $table_id); // $table_id mins relational table primary key as id
            $user['password'] = Hash::make(isset($password) ? $password : '123456');

            if (!empty($email) && User::where('email', $email)->first()) {
                DB::table($tableName)->where('id', $table_id)->delete();
                return $this->backWithErrors(['email' => 'The email has already been taken.']);
            }

            $user = User::where('username', $user['username'])->first() ?:  User::create($user);
        } elseif ($update) {
            extract($update);
            $update['name'] = isset($name) ? $name : (isset($fname) ? $fname . ' ' . $lname : 'N/A');
            if (isset($password) && strlen($password) > 5) {
                $update['password'] = Hash::make($password);
            } else {
                unset($update['password']);
            }
            $user->update($update);
        }
        return $user;
    }

    public function backWithErrors($errorData)
    {
        return back()->withErrors($errorData)->withInput();
    }

    public static function user()
    {
        return auth()->user();
    }

    public static function permissionCheck()
    {
        $routeController = self::$currentAction->controller;
        $actionMethod = substr($routeController, strrpos($routeController, '@') + 1, strlen($routeController));

        if (in_array($actionMethod, self::$actions)) {
            foreach (self::$permissions as $index => $permission) {
                if (strpos($permission['rm'], $actionMethod) > -1) {
                    $access = $index;
                }
            }

            if (isset($access) && in_array($access, role()->permissions)) {
                $route = getNaves(true)->firstWhere('route', self::$route);
                return !$route || ($route && in_array($route->id, role()->roleRoutes));
            }
            return false;
        }
        return true;
    }


    public function searchUsers($search = '', $with = [], $takeLimit = 10)
    {
        return User::with($with)
            ->where(function ($query) use ($search) {
                $query->where('phone', 'like', "%{$search}%");
            })
            ->orWhere(function ($query) use ($search) {
                $query->where('email', 'like', "%{$search}%");
            })
            ->orWhere(function ($query) use ($search) {
                $query->where('name', 'like', "%{$search}%");
            })
            ->orWhere(function ($query) use ($search) {
                $query->where('username', 'like', "%{$search}%");
            })
            ->take($takeLimit)->get()->map(function ($user) {
                $user->photo = image($user->photo, 'user', true);
                return $user;
            });
    }

    protected function getUsers($userNames, $with = [])
    {
        return User::with($with)->select(['id', 'role_id', 'name', 'photo', 'phone', 'username'])
            ->whereIn('username', $userNames)
            ->orderBy('username')
            ->groupBy('username')
            ->get();
    }

    public function validation($data, $roles, $needValidate = true): array
    {
        $validator = Validator::make($data, $roles);
        if ($validator->fails()) {
            return $needValidate ? $validator->validate() : $this->validationFailed($validator);
        } else {
            return $this->dataMarge($validator->safe()->all(), $data);
        }
    }

    public function validationFailed($validator)
    {
        throw new HttpResponseException(response()->json([
            'success' => false,
            'error' => is_array($validator) ? $validator : $validator->errors(),
            'olds' => is_array($validator) ? request()->all() : $this->dataMarge($validator->safe()->all(), request()->all()),
            'message' => 'One or more fields are required or not entered properly'
        ], 422));
    }

    public function dataMarge($first, $second)
    {
        $data = array_merge($first, $second);
        unset($data['_token']);
        return toIntval($data);
    }


    public function croppedImageHandle($path = '', $oldFile = false, $keyName = 'photo')
    {

        $file = $oldFile ?: '';
        $directory = 'others';
        if (is_numeric($path) && isset($this->folderPaths[$path])) {
            $directory = $this->folderPaths[$path];
        } elseif (is_string($path)) {
            $directory = $path;
        }
        $data = request()->all();
        if (isset($data[$keyName])) {
            $directory = "media/uploads/crop/{$directory}/";

            // check file directory is exists
            if (!File::isDirectory($directory)) {
                File::makeDirectory($directory, 0777, true, true);
            }

            $image_parts = explode(";base64,", $data[$keyName]);
            $image_type_aux = explode("image/", $image_parts[0]);
            $image_type = $image_type_aux[1];
            $name = time() . random_int(5, 95) . '.' . $image_type;
            $file = "{$directory}{$name}";

            $image_base64 = base64_decode($image_parts[1]);
            file_put_contents(public_path($file), $image_base64);
            $oldFile && fileDelete($oldFile);
        }
        return $file;
    }

    public function invoiceEventLastDate($invoice)
    {
        $paymentRecords = $invoice->paid && $invoice->payment_records ? array_filter($invoice->payment_records ?: [], fn ($r_index_key) => is_numeric($r_index_key), ARRAY_FILTER_USE_KEY) : null;
        return $paymentRecords ?  Carbon::createFromFormat('d, M Y h:i A', $paymentRecords[count($paymentRecords) - 1]['date'])->format('Y-m-d H:i:s') : ($invoice->updated_at ? $invoice->updated_at->format('Y-m-d H:i:s') : null);
    }
}
