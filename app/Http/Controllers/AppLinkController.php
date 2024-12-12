<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\AppLink;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

class AppLinkController extends Controller
{

    public function routeList()
    {
        if (!Auth::check() || (user() && user()->role_id !== 1)) return redirect()->route('login')->withErrors('There is not access permission for you.');
        return $this->routes(1);
    }
    private function catchUpdate()
    {
        cache()->forget('naves');
        cache()->forget('roles');
        return true;
    }

    private function routes($needFull = false)
    {
        $routeList = Route::getRoutes();
        foreach ((array)$routeList as $key => $route) {
            if (strpos($key, 'nameList')) {
                $routeList = $needFull ? array_map(fn ($r) => $r->uri, $route) : array_keys($route);
            }
        }
        return $routeList;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function routeAccessControl(Request $request)
    {
        $role = Role::find($request->role);
        $role->update(['routes' => $request->routes]);
        return $this->catchUpdate();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function index()
    {
        //         dd($this->routes());
        //        dd(Route::getRoutes());
        return view('permissions.route-access', ['routeList' => AppLink::all(), 'user'=>Auth::user()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        if (!empty($request->route) && !in_array($request->route, $this->routes())) {
            return back()->with('error', 'Sorry! Invalid route name! please insert current route name.');
        }

        $type = $request->type;
        $container = $request->all();
        switch ($type) {
            case 'folder':
                $container['parent_id'] = 0;
                $container['folder_indexing'] = 99;
                break;
            case 'subfolder':
                $container['parent_id'] = $request->folder_id;
                unset($container['route']);
                break;

            default:
                $container['parent_id'] = is_numeric($request->subfolder_id) ? $request->subfolder_id : $request->folder_id;
                break;
        }

        $type = ucfirst($type);
        AppLink::create($container);
        $route = empty($request->route) ? '' : " and route name <b>{$request->route}</b>";
        $this->catchUpdate();
        return redirect()->route('app-links.index')->withSuccess("{$type}{$route} is successfully created.");
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\AppLink  $appLink
     * @return void
     */
    public function edit(AppLink $appLink)
    {
        $appLink->status = $appLink->status > 0 ? 0 : 1;
        $result = $appLink->update();
        $this->catchUpdate();
        return $result ? session()->flash('success', "User Role permission is successfully {$this->statuses[$appLink->status]}.") : 0;
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\AppLink  $appLink
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, AppLink $appLink)
    {
        if (!empty($request->route) && !in_array($request->route, $this->routes())) {
            return back()->with('error', 'Sorry! Invalid route name! please insert current route name.');
        }

        $type = $request->type;
        $container = $request->all();
        switch ($type) {
            case 'folder':
                $container['parent_id'] = 0;
                $container['folder_indexing'] = 99;
                break;
            case 'subfolder':
                $container['parent_id'] = $request->folder_id;
                unset($container['route']);
                $appLink->route = null;
                break;

            case 'link':
                $container['parent_id'] = is_numeric($request->subfolder_id) ? $request->subfolder_id : $request->folder_id;
                break;
        }

        $type = ucfirst($type);
        $appLink->update($container);
        $this->catchUpdate();
        return redirect()->route('app-links.index')->withSuccess("{$type} is successfully updated.");
    }

    public function destroy(AppLink $appLink)
    {
        Setting::where('key', $appLink->route)->delete();
        return $appLink->delete() && $this->catchUpdate() ? session()->flash('success', 'App link is successfully deleted.') : 0;
    }

    public function folderIndexing()
    {
        if (user()->role_id !== 1) return back()->withErrors('Permission denied.');
        return view('permissions.HCL-folder-indexing-manage', ['folders' => AppLink::where(['status' => 1, 'parent_id' => 0])->get()]);
    }

    public function folderIndexingUpdate(Request $request)
    {
        return $request->all();
        if (user()->role_id !== 1) return back()->withErrors('Permission denied.');
        $naves = AppLink::where('parent_id', 0)->get();
        $newIndexing = $request->indexing ?: [];
        foreach($newIndexing as $index => $id) {
            $navFolder = $naves->find($id);
            if($navFolder) {
                $navFolder->folder_indexing = $index + 1;
                $navFolder->save();
            }
        }
        $this->catchUpdate();
        return back()->withSuccess('HCL folder indexing is updated.');


        $request->indexing = $request->indexing ?: [];

        foreach ($naves as $folder) {
            $folder->folder_indexing = 99;
            if (in_array($folder->id, $request->indexing)) {
                $folder->folder_indexing = array_search($folder->id, $request->indexing) + 1;
            }
            $folder->update();
        }
        $this->catchUpdate();
        return back()->withSuccess('HCL folder indexing is updated.');
    }
}
