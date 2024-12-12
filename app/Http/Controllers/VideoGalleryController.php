<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\VideoGallery;

class VideoGalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.video-gallery.index', ['videoGalleryList' => VideoGallery::latest()->get()]);
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
            'video' => 'required',
        ]);
        VideoGallery::create($request->all());
        $this->catchReload();
        return back()->withSuccess('Video gallery is successfully created.');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(VideoGallery $videoGallery)
    {
        $statuses = ['Inactivated', 'Activated'];
        $videoGallery->status = $videoGallery->status > 0 ? 0 : 1;
        return $videoGallery->update() && $this->catchReload() ? session()->flash('success', "Video gallery is successfully {$statuses[$videoGallery->status]}.") : 0;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  App\Models\VideoGallery  $videoGallery
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, VideoGallery $videoGallery)
    {
        $request->validate([
            'video' => 'required',
        ]);
        $this->catchReload();
        $videoGallery->update($request->all());
        return back()->withSuccess('Video gallery is successfully updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  App\Models\VideoGallery  $videoGallery
     * @return \Illuminate\Http\Response
     */
    public function destroy(VideoGallery $videoGallery)
    {
        return $videoGallery->delete() && $this->catchReload() ? session()->flash('success', 'Video gallery is successfully deleted.') : 0;
    }

    private function catchReload() {
        cache()->forget('video-gallery-cache');
        return true;
    }
}
