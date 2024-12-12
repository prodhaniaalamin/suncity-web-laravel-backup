<?php

namespace App\Http\Controllers;

use App\Models\AboutPageTab;
use Illuminate\Http\Request;

class AboutPageTabController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.about-page-tabs.index', ['aboutPageTabs' => AboutPageTab::latest()->get()]);
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
            'name' => 'required',
            'title' => 'required',
            'description' => 'required',
        ]);
        $this->reloadCache();
        AboutPageTab::create($request->all());
        return back()->withSuccess('About Page Tab is successfully created.');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\AboutPageTab  $aboutPageTab
     * @return \Illuminate\Http\Response
     */
    public function edit(AboutPageTab $aboutPageTab)
    {
        $statuses = ['Inactivated', 'Activated'];
        $aboutPageTab->status = $aboutPageTab->status > 0 ? 0 : 1;
        return $aboutPageTab->update() && $this->reloadCache() ? session()->flash('success', "About Page Tab is successfully {$statuses[$aboutPageTab->status]}.") : 0;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\AboutPageTab  $aboutPageTab
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, AboutPageTab $aboutPageTab)
    {
        $request->validate([
            'name' => 'required',
            'title' => 'required',
            'description' => 'required',
        ]);
        $this->reloadCache();
        $aboutPageTab->update($request->all());
        return back()->withSuccess('About Page Tab is successfully updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\AboutPageTab  $aboutPageTab
     * @return \Illuminate\Http\Response
     */
    public function destroy(AboutPageTab $aboutPageTab)
    {
        return $aboutPageTab->delete() && $this->reloadCache() ? session()->flash('success', 'About Page Tab is successfully deleted.') : 0;
    }

    private function reloadCache()
    {
        cache()->forget('about-page-tabs');
        return true;
    }
}
