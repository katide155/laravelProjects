<?php

namespace App\Http\Controllers;

use App\Models\AttendanceGroup;
use App\Models\School;
use App\Http\Requests\StoreAttendanceGroupRequest;
use App\Http\Requests\UpdateAttendanceGroupRequest;
use Illuminate\Http\Request;

class AttendanceGroupController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
		$attendanceGroups = AttendanceGroup::all();
		$schools = School::all();
		return view('attendance-groups.index', ['attendanceGroups'=>$attendanceGroups],['schools' => $schools]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
		$schools = School::all();
        return view('attendance-groups.create', ['schools' => $schools]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreAttendanceGroupRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $attendanceGroup = new AttendanceGroup;
		$attendanceGroup->attendance_group_name = $request->attendance_group_name;
		$attendanceGroup->attendance_group_description = $request->attendance_group_description;
		$attendanceGroup->attendance_group_difficulty = $request->attendance_group_difficulty;
		$attendanceGroup->attendance_group_school_id = $request->attendance_group_school_id;
		
		$attendanceGroup->save();
		return redirect()->route('attendancegroup.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\AttendanceGroup  $attendanceGroup
     * @return \Illuminate\Http\Response
     */
    public function show(AttendanceGroup $attendanceGroup)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\AttendanceGroup  $attendanceGroup
     * @return \Illuminate\Http\Response
     */
    public function edit(AttendanceGroup $attendanceGroup)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateAttendanceGroupRequest  $request
     * @param  \App\Models\AttendanceGroup  $attendanceGroup
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateAttendanceGroupRequest $request, AttendanceGroup $attendanceGroup)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\AttendanceGroup  $attendanceGroup
     * @return \Illuminate\Http\Response
     */
    public function destroy(AttendanceGroup $attendanceGroup)
    {
        //
    }
}
