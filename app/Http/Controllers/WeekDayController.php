<?php

namespace App\Http\Controllers;

use App\Models\WeekDay;
use Illuminate\Http\Request;

class WeekDayController extends Controller
{
    private function catchReload()
    {
        return cache()->forever('week_days' . user()->school_id, WeekDay::where(['is_on' => 1, 'school_id' => user()->school_id])->get()->makeHidden(['created_at', 'updated_at']));
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.settings.week-manage', ['weekDays' => WeekDay::where('school_id', user()->school_id)->get()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $school_id = user()->school_id;
        $request->validate([
            'name' => ['required', "unique:week_days,name,null,id,school_id,{$school_id}"]
        ]);
        $inputs['name'] = $request->name;
        $inputs['school_id'] = $school_id;
        WeekDay::create($inputs) && $this->catchReload();
        return back()->withSuccess("Week Day <b>{$request->name}</b> is successfully created.");
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Teacher  $teacher
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, WeekDay $week_day)
    {
        $week_day->name = $request->name;
        $week_day->update() && $this->catchReload();
        return back()->withSuccess("Week Day <b>{$request->name}</b> is successfully updated.");
    }


    /**
     * Active or Inactive the specified resource.
     *
     * @param  \App\Models\Subject  $subject
     * @return \Illuminate\Http\Response
     */
    public function edit(WeekDay $week_day)
    {
        $week_day->update(['is_on' => $week_day->is_on > 0 ? 0 : 1]) && $this->catchReload();
        return response()->json(weekDays());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\WeekDay  $week_day
     * @return \Illuminate\Http\Response
     */
    public function weekDayManage(Request $request)
    {

        $weekDays = WeekDay::where('school_id', user()->school_id)->get();
        foreach ($weekDays as $k => $day) {
            $changed = $request->days[$k];
            $day->name = $changed['name'];
            $day->is_on = $changed['is_on'];
            $day->update();
        }
        cache()->forever('weekDays' . user()->school_id, WeekDay::where('school_id', user()->school_id)->get()->makeHidden(['created_at', 'updated_at']));
        session()->flash('success', $request->action === 'change' ?
            "Week day serial is successfully changed." : "{$request->action} is successfully set as {$request->onOff}.");
        return 1;
    }
}
