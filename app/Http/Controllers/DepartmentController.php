<?php

namespace App\Http\Controllers;

use App\Models\Department;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    private function catchReload()
    {
        cache()->forget('departments');
        return true;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $departmentList = Department::all();
        return view('admin.departments.index', compact('departmentList'));
    }

    public function show($id) {
        $department = Department::with(['doctors'=> fn($query) => $query->limit(3)->orderBy('id', 'desc')])->find($id);
        return view('website.departments.details', compact('department'));
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
            'name' => ['required', "unique:departments,name,null,id"]
        ]);
        $data = $request->all();
        $data['image'] = $this->fileUploadHandle('departments', false, 'image');
        Department::create($data);
        $this->catchReload();
        return redirect()->route('departments.index')->with('success', 'Department is successfully created.');
    }

    /**
     * Active or Inactive the specified resource.
     *
     * @param  \App\Models\Department  $department
     * @return \Illuminate\Http\Response
     */
    public function edit(Department $department)
    {
        $statuses = ['Inactivated', 'Activated'];
        $department->status = $department->status > 0 ? 0 : 1;
        $result = $department->update();
        $this->catchReload();
        return $result ? session()->flash('success', "Department is successfully {$statuses[$department->status]}.") : 0;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Department  $department
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Department $department)
    {
        $request->validate([
            'name' => ['required', "unique:departments,name,null,id,id,!{$department->id}"]
        ]);
        $data = $request->all();
        $data['image'] = $this->fileUploadHandle('departments', $department->image, 'image');
        $department->update($data);
        $this->catchReload();
        return redirect()->route('departments.index')->with('success', 'Department is successfully updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Department  $department
     * @return \Illuminate\Http\Response
     */
    public function destroy(Department $department)
    {
        return $department->delete() && $this->catchReload() ? session()->flash('success', 'Department is successfully deleted.') : 0;
    }
}
