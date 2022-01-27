<?php

namespace App\Http\Controllers;

use App\Models\AttendanceGroup;
use App\Models\School;
use App\Http\Requests\StoreAttendanceGroupRequest;
use App\Http\Requests\UpdateAttendanceGroupRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class AttendanceGroupController extends Controller
{
	
	public function groupDifficultyLevels(){
		$levels = array('Begginer','Middle','Advanced');
		return $levels;
	}
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
		$levels = $this->groupDifficultyLevels();
		$attendanceGroups = AttendanceGroup::all();
		$schools = School::all();
		return view('attendance-groups.index', ['attendanceGroups'=>$attendanceGroups,'schools' => $schools, 'levels' => $levels]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
		$levels = $this->groupDifficultyLevels();
		$schools = School::all();
        return view('attendance-groups.create', ['schools' => $schools, 'levels' => $levels]);
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
		
		$target_file = basename($_FILES["attendance_group_logo"]["name"]);
		
        $request->file('attendance_group_logo')->move(public_path('images/attendancegroups-logos'), $target_file);
		
		$attendanceGroup->attendance_group_logo = '/images/attendancegroups-logos/'.$target_file;
		
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
		$levels = $this->groupDifficultyLevels();
		$schools = School::all();
        return view('attendance-groups.show', ['attendanceGroup'=>$attendanceGroup, 'schools' => $schools, 'levels' => $levels]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\AttendanceGroup  $attendanceGroup
     * @return \Illuminate\Http\Response
     */
    public function edit(AttendanceGroup $attendanceGroup)
    {
		$levels = $this->groupDifficultyLevels();
		$schools = School::all();
        return view('attendance-groups.edit', ['attendanceGroup'=>$attendanceGroup, 'schools' => $schools, 'levels' => $levels]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateAttendanceGroupRequest  $request
     * @param  \App\Models\AttendanceGroup  $attendanceGroup
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, AttendanceGroup $attendanceGroup)
    {
		$attendanceGroup->attendance_group_name = $request->attendance_group_name;
		$attendanceGroup->attendance_group_description = $request->attendance_group_description;
		$attendanceGroup->attendance_group_difficulty = $request->attendance_group_difficulty;
		$attendanceGroup->attendance_group_school_id = $request->attendance_group_school_id;
		
		if (File::exists(public_path($attendanceGroup->attendance_group_logo))) {
			File::delete(public_path($attendanceGroup->attendance_group_logo));
		}
		
		$target_file = basename($_FILES["attendance_group_logo"]["name"]);
		
        $request->file('attendance_group_logo')->move(public_path('images/attendancegroups-logos'), $target_file);
		
		$attendanceGroup->attendance_group_logo = '/images/attendancegroups-logos/'.$target_file;	
		
		$attendanceGroup->save();
		return redirect()->route('attendancegroup.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\AttendanceGroup  $attendanceGroup
     * @return \Illuminate\Http\Response
     */
    public function destroy(AttendanceGroup $attendanceGroup)
    {
		$students = $attendanceGroup->attendanceGroupStudents;
		if(count($students) != 0){
			return redirect()->route('attendancegroup.index')->with('error_message', 'Trinti negalima, grupė turi studentų');
		}
        $attendanceGroup->delete();
		return redirect()->route('attendancegroup.index')->with('success_message', 'Sėkmingai ištrinta');
    }
}
