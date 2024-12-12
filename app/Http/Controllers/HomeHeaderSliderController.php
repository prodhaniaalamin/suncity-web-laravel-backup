<?php

namespace App\Http\Controllers;

use App\Models\HomeHeaderSlider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class HomeHeaderSliderController extends Controller
{
    private function catchReload()
    {
        Cache::forget('home-page-header-sliders');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response|\Illuminate\View\View
     */
    public function index()
    {
        return view('admin.home-header-slider.index', ['homeHeaderSlides' => HomeHeaderSlider::latest()->get()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
            'title' => ['required'],
            'paragraph' => ['required'],
            'image' => ['required']
        ]);
        $inputs = $request->all();
        $inputs['image'] = $this->fileUploadHandle('home-header-sliders', null, 'image');
        HomeHeaderSlider::create($inputs);
        $this->catchReload();
        return back()->with('success', 'Home Page Header Slider is successfully created.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\HomeHeaderSlider  $homeHeaderSlider
     * @return \Illuminate\Http\Response
     */
    public function show(HomeHeaderSlider $homeHeaderSlider)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\HomeHeaderSlider  $homeHeaderSlider
     * @return \Illuminate\Http\Response
     */
    public function edit(HomeHeaderSlider $homeHeaderSlider)
    {
        $statuses = ['Inactivated', 'Activated'];
        $homeHeaderSlider->status = $homeHeaderSlider->status > 0 ? 0 : 1;
        $result = $homeHeaderSlider->update();
        $this->catchReload();
        return $result ? session()->flash('success', "Home Page Header Slider is successfully {$statuses[$homeHeaderSlider->status]}.") : 0;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\HomeHeaderSlider  $homeHeaderSlider
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, HomeHeaderSlider $homeHeaderSlider)
    {
        $request->validate([
            'title' => ['required'],
            'paragraph' => ['required']
        ]);
        $inputs = $request->all();
        $inputs['image'] = $this->fileUploadHandle('home-header-sliders', $homeHeaderSlider->image, 'image');
        $homeHeaderSlider->update($inputs);
        $this->catchReload();
        return back()->with('success', 'Home Page Header Slider is successfully created.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\HomeHeaderSlider  $homeHeaderSlider
     * @return \Illuminate\Http\Response
     */
    public function destroy(HomeHeaderSlider $homeHeaderSlider)
    {
        $result = $homeHeaderSlider->delete();
        $this->catchReload();
        return $result ? session()->flash('success', 'Home Page Header Slider is successfully deleted.') : 0;
    }
}
