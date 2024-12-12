<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.blogs.index', ['blogList' => Blog::latest()->get()]);
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
        // Form validation
        $this->validate($request, [
            'title' => 'required'
        ]);

        $inputs = $request->all();
        $inputs['image'] = $this->fileUploadHandle('blog-images', false, 'image');
        Blog::create($inputs);
        return back()->withSuccess('Blog Post is successfully created');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function show(Blog $blog)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function edit(Blog $blog)
    {
        //
        $statuses = ['Inactivated', 'Activated'];
        $blog->status = $blog->status > 0 ? 0 : 1;
        return $blog->update() ? session()->flash('success', "Blog post is successfully {$statuses[$blog->status]}.") : 0;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Blog $blog)
    {
        // Form validation
        $this->validate($request, [
            'title' => 'required'
        ]);

        $inputs = $request->all();
        $inputs['image'] = $this->fileUploadHandle('blog-images', $blog->image, 'image');
        $blog->update($inputs);
        return back()->withSuccess('Blog Post is successfully updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function destroy(Blog $blog)
    {
        return $blog->delete() ? session()->flash('success', 'Blog post is successfully deleted.') : 0;
    }

    public function blogList()
    {
        $recentView = cache()->get('recent-views') ?: [];
        $recent = Blog::whereIn('id', $recentView)->limit(3)->get();
        return view('website.blogs.index', ['blogList' => Blog::latest()->get(), 'recent' => $recent]);
    }

    public function blogCategory($id)
    {
        $recentView = cache()->get('recent-views') ?? [];
        $recent = Blog::whereIn('id', $recentView)->limit(3)->get();
        $blogList = Blog::where('category_id', $id)->latest()->limit(3)->get();
        return view('website.blogs.category-blogs', ['blogList' => $blogList, 'category'=>Category::find($id), 'recent'=> $recent]);
    }

    public function details($id)
    {

        $blog = Blog::find($id);
        if (!$blog) return abort(404);

        $recentView = cache()->get('recent-views') ?: [];

        if(!in_array($blog->id, $recentView)) {
            array_unshift($recentView, $blog->id);
            cache()->forever('recent-views', $recentView);
        }

        $blog->view_count = $blog->view_count + 1;
        $blog->save();

        $recentView = cache()->get('recent-views');
        $recent = Blog::whereIn('id', $recentView)->get();

        $popular = Blog::limit(3)->orderBy('view_count','desc')->get();

        return view('website.blogs.details', compact('blog', 'popular', 'recent'));
    }
}
