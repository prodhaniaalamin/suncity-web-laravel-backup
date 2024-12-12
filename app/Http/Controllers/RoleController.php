<?php

namespace App\Http\Controllers;

use App\Models\Role;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    private function roleProcess($currentPrefixes = ['super-admin', 'admin'])
    {
        $currentPrefixes = json_encode($currentPrefixes);
        $content = '<?php

        namespace App\Services;

        trait DynamicRole
        {
            public static $prefixes = \'' . $currentPrefixes . '\';
        }';
        $content = str_replace("'[", '[', $content);
        $content = str_replace("]'", ']', $content);
        return file_put_contents(base_path('app/Services/DynamicRole.php'), $content);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('permissions.role-access', ['roleList' => Role::all()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $prefixes = prefixes();
        $roleData = $request->all();
        $prefix = trim(str_replace(' ', '-', $request->prefix));
        $roleData['access'] = implode(',', toIntval($request->permissions));
        if (!in_array($prefix, $prefixes)) {
            $prefixes[] = $prefix;
            $this->roleProcess($prefixes);
            self::$prefixes = $prefixes;
        }
        $roleData['prefix'] = $prefix;
        Role::create($roleData);
        cache()->put('roles', Role::all(), 60 * 60 * 24);
        return redirect()->route('roles.index')->withSuccess('User Role permission is successfully submitted.');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function edit(Role $role)
    {
        $role->status = $role->status > 0 ? 0 : 1;
        return $role->update() ? session()->flash('success', "User Role permission is successfully {$this->statuses[$role->status]}.") : 0;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Role $role)
    {
        $prefixes = prefixes();
        $roleData = $request->all();
        $prefix = trim(str_replace(' ', '-', $request->prefix));
        $roleData['access'] = implode(',', toIntval($request->permissions));

        if ($role->prefix !== $prefix) {
            $i = array_search($role->prefix, $prefixes);
            $prefixes[$i] = $prefix;
            $this->roleProcess($prefixes);
            self::$prefixes = $prefixes;
        }
        $roleData['prefix'] = $prefix;
        $role->update($roleData);
        cache()->put('roles', Role::all(), 60 * 60 * 24);
        return redirect()->route('roles.index')->withSuccess('User Role permission is successfully updated.');
    }
}
