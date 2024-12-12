<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    private function catchReload()
    {
        return cache()->put('categories', Category::where('status', 1)->get()->makeHidden(['created_at', 'updated_at']), 60 * 60 * 24);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categoryList = Category::all();

        return view('admin.categories.index', compact('categoryList'));
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
            'name' => ['required', "unique:categories,name,null,id"]
        ]);
        Category::create($request->all());
        $this->catchReload();
        return redirect()->route('categories.index')->with('success', 'Category is successfully created.');
    }

    /**
     * Active or Inactive the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        $statuses = ['Inactivated', 'Activated'];
        $category->status = $category->status > 0 ? 0 : 1;
        $result = $category->update();
        $this->catchReload();
        return $result ? session()->flash('success', "Category is successfully {$statuses[$category->status]}.") : 0;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        $request->validate([
            'name' => ['required', "unique:categories,name,null,id,id,!{$category->id}"]
        ]);
        $category->name = $request->name;
        $category->update();
        $this->catchReload();
        return redirect()->route('categories.index')->with('success', 'Category is successfully updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        $result = $category->delete();
        $this->catchReload();
        return $result ? session()->flash('success', 'Category is successfully deleted.') : 0;
    }
}
