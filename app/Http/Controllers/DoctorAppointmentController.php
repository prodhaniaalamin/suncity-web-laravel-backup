<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use Illuminate\Support\Facades\Auth;
use App\Models\DoctorAppointment;
use Illuminate\Http\Request;
use Carbon\Carbon;

class DoctorAppointmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        //return back()->withSuccess('Appointment is successfully created.');
        $request->validate([
            'name' => 'required',
            'phone' => 'required',
            'doctor_id' => 'required',
            'description' => 'required',
            'time' => 'required',
            'day' => 'required',
        ], [
            'name.required' => 'The patient name is required.',
            'phone.required' => 'The patient phone number is required.',
            'doctor_id.required' => 'The doctor select is required.',
            'description.required' => 'The message is required.',
            'time.required' => 'The time is required.',
            'day.required' => 'The date is required.',
        ]);

        $patient = Patient::find($request->patient_id);
        if(!$patient) {
            $patient = Patient::create([
                'name' => $request->name,
                'phone' => $request->phone
            ]);
        }

        $data = $request->all();
        $data['day'] = $request->day.' '.$request->time;
        $data['patient_id'] = $patient->id;
        DoctorAppointment::create($data);
        return back()->with('success', 'Appointment is successfully created.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\DoctorAppointment  $doctorAppointment
     * @return \Illuminate\Http\Response
     */
    public function show(DoctorAppointment $doctorAppointment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\DoctorAppointment  $doctorAppointment
     * @return \Illuminate\Http\Response
     */
    public function edit(DoctorAppointment $doctorAppointment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\DoctorAppointment  $doctorAppointment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, DoctorAppointment $doctorAppointment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\DoctorAppointment  $doctorAppointment
     * @return \Illuminate\Http\Response
     */
    public function destroy(DoctorAppointment $doctorAppointment)
    {
        //
    }

    public function AppointmentList() {
        return view('admin.doctors.appointment-list', [
            'appointments' => DoctorAppointment::latest()->with(['doctor', 'patient'])->get()
        ]);
    }
}
