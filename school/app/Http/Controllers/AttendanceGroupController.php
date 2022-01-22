<?php

namespace App\Http\Controllers;

use App\Models\AttendanceGroup;
use App\Http\Requests\StoreAttendanceGroupRequest;
use App\Http\Requests\UpdateAttendanceGroupRequest;

class AttendanceGroupController extends Controller
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
     * @param  \App\Http\Requests\StoreAttendanceGroupRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreAttendanceGroupRequest $request)
    {
        //
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
