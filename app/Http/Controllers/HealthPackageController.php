<?php

namespace App\Http\Controllers;

use App\Models\HealthPackage;
use Illuminate\Http\Request;

class HealthPackageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $healthPackageList = HealthPackage::all();
        return view('admin.health-packages.index', compact('healthPackageList'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required',
            'price' => 'required',
            'description' => 'required',
        ]);

        $data['created_by'] = user()->id;
        HealthPackage::create($data);
        $this->catchReload();
        return back()->withSuccess('Health Package is successfully created.');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\HealthPackage  $healthPackage
     * @return \Illuminate\Http\Response
     */
    public function edit(HealthPackage $healthPackage)
    {
        $statuses = ['Inactivated', 'Activated'];
        $healthPackage->status = $healthPackage->status > 0 ? 0 : 1;
        return $healthPackage->update() && $this->catchReload() ? session()->flash('success', "Health Package is successfully {$statuses[$healthPackage->status]}.") : 0;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\HealthPackage  $healthPackage
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, HealthPackage $healthPackage)
    {
        $data = $request->validate([
            'name' => 'required',
            'price' => 'required',
            'description' => 'required',
        ]);
        $healthPackage->update($data);
        $this->catchReload();
        return back()->withSuccess('Health Package is successfully updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\HealthPackage  $healthPackage
     * @return \Illuminate\Http\Response
     */
    public function destroy(HealthPackage $healthPackage)
    {
        return $healthPackage->delete() && $this->catchReload() ? session()->flash('success', 'Health Package is successfully deleted.') : 0;
    }

    private function catchReload()
    {
        cache()->forget('health-packages');
        return true;
    }
}
