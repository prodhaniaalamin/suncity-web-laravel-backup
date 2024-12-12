<?php

namespace App\Http\Controllers;

use App\Models\Testimonial;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class TestimonialController extends Controller
{
    private function catchReload()
    {
        Cache::forget('testimonial-list');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.testimonials.index', ['testimonials' => Testimonial::latest()->get()]);
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
            'name' => ['required'],
            'testimonial' => ['required'],
            'photo' => ['required']
        ]);
        $inputs = $request->all();
        $inputs['photo'] = $this->fileUploadHandle('testimonials');
        Testimonial::create($inputs);
        $this->catchReload();
        return back()->with('success', 'Testimonial is successfully created.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Testimonial  $testimonial
     * @return \Illuminate\Http\Response
     */
    public function show(Testimonial $testimonial)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Testimonial  $testimonial
     * @return \Illuminate\Http\Response
     */
    public function edit(Testimonial $testimonial)
    {
        $statuses = ['Inactivated', 'Activated'];
        $testimonial->status = $testimonial->status > 0 ? 0 : 1;
        $result = $testimonial->update();
        $this->catchReload();
        return $result ? session()->flash('success', "Testimonial is successfully {$statuses[$testimonial->status]}.") : 0;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Testimonial  $testimonial
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Testimonial $testimonial)
    {
        $request->validate([
            'name' => ['required'],
            'testimonial' => ['required']
        ]);
        $inputs = $request->all();
        $inputs['photo'] = $this->fileUploadHandle('testimonials', $testimonial->photo);
        $testimonial->update($inputs);
        $this->catchReload();
        return back()->with('success', 'Testimonial is successfully created.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Testimonial  $testimonial
     * @return \Illuminate\Http\Response
     */
    public function destroy(Testimonial $testimonial)
    {
        $result = $testimonial->delete();
        $this->catchReload();
        return $result ? session()->flash('success', 'Testimonial is successfully deleted.') : 0;
    }
}
