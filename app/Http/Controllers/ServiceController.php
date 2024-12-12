<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    private function catchReload()
    {
        cache()->forget('services');
        return true;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $serviceList = Service::all();

        return view('admin.services.index', compact('serviceList'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => ['required', "unique:services,title,null,id"],
            'icon'=> 'required',
        ]);
        Service::create($request->all());
        $this->catchReload();
        return back()->with('success', 'Service is successfully created.');
    }

    /**
     * Active or Inactive the specified resource.
     *
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function edit(Service $service)
    {
        $statuses = ['Inactivated', 'Activated'];
        $service->status = $service->status > 0 ? 0 : 1;
        return $service->update() && $this->catchReload() ? session()->flash('success', "Service is successfully {$statuses[$service->status]}.") : 0;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Service $service)
    {
        $request->validate([
            'title' => ['required', "unique:services,title,null,id,id,!{$service->id}"],
            'icon' => 'required',
        ]);
        $service->update($request->all());
        $this->catchReload();
        return back()->with('success', 'Service is successfully updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function destroy(Service $service)
    {
        return $service->delete() && $this->catchReload() ? session()->flash('success', 'Service is successfully deleted.') : 0;
    }
}
