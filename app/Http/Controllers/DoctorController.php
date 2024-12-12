<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use Illuminate\Http\Request;

class DoctorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.doctors.index', ['doctors' => Doctor::latest()->get()]);
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
            'department_id' => 'required',
            'email' => 'required_without:phone|email',
            'phone' => 'required_without:email',
            'specialty' => 'required',
            'qualification' => 'required',
            'address' => 'required',
        ]);

        $data = $request->all();
        $data['user_id'] = 0;
        $data['photo'] = $this->fileUploadHandle('doctors');
        $data['options']['social_media'] = json_encode([
                'facebook' => $request->facebook,
                'twitter' => $request->twitter,
                'instagram' => $request->instagram
            ]);
        $doctor = Doctor::create($data);

        $data['role_id'] = 4;
        $data['table_id'] = $doctor->id;
        $user = $this->userCreateUpdate($data);
        $doctor->update(['user_id' => $user->id]);
        $this->catchReload();

        return back()->with('success', 'Doctor is successfully created.');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Doctor  $doctor
     * @return \Illuminate\Http\Response
     */
    public function edit(Doctor $doctor)
    {
        $statuses = ['Inactivated', 'Activated'];
        $doctor->status = $doctor->status > 0 ? 0 : 1;
        $result = $doctor->update();
        $this->catchReload();
        return $result ? session()->flash('success', "Doctor is successfully {$statuses[$doctor->status]}.") : 0;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Doctor  $doctor
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Doctor $doctor)
    {
        $request->validate([
            'name' => 'required',
            'department_id' => 'required',
            'email' => 'required_without:phone|email',
            'phone' => 'required_without:email',
            'specialty' => 'required',
            'qualification' => 'required',
            'address' => 'required',
        ]);

        $data = $request->all();
        $data['photo'] = $this->fileUploadHandle('doctors', $doctor->photo);
        $data['options']['social_media'] = json_encode([
            'facebook' => $request->facebook,
            'twitter' => $request->twitter,
            'instagram' => $request->instagram
        ]);
        $doctor->update($data);
        $this->userCreateUpdate($doctor->user, $data);
        $this->catchReload();
        return back()->with('success', 'Doctor details hes been successfully updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Doctor  $doctor
     * @return \Illuminate\Http\Response
     */
    public function destroy(Doctor $doctor)
    {
        fileDelete($doctor->photo);
        return $doctor->delete() && $this->catchReload() ? session()->flash('success', 'Doctor is successfully deleted.') : 0;
    }

    private function catchReload()
    {
        cache()->forget('our-doctors');
        return true;
    }

    public function doctors()
    {
        return view('website.doctors.list');
    }
    public function doctorDetails( $id )
    {
        $doctor = Doctor::find($id);

        $related_doctors = Doctor::where('department_id', $doctor->department_id)->where('id','!=', $id)->latest()->get();

        return view('website.doctors.details', compact('doctor', 'related_doctors'));
    }
}
