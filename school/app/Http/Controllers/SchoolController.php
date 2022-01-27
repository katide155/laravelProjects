<?php

namespace App\Http\Controllers;

use App\Models\School;
use App\Http\Requests\StoreSchoolRequest;
use App\Http\Requests\UpdateSchoolRequest;
use Illuminate\Http\Request;

class SchoolController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
		$schools = School::all();
		return view('schools.index', ['schools'=>$schools]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('schools.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreSchoolRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
		

        $school = new School;
		$school->school_name = $request->school_name;
		$school->school_description = $request->school_description;
		$school->school_place = $request->school_place;
		$school->school_phone = $request->school_phone;
		
		$target_file = basename($_FILES["school_logo"]["name"]);
		
        $request->file('school_logo')->move(public_path('images/school-logos'), $target_file);
		
		$school->school_logo = '/images/school-logos/'.$target_file;
		
		
		$school->save();
		return redirect()->route('school.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\School  $school
     * @return \Illuminate\Http\Response
     */
    public function show(School $school)
    {
       return view('schools.show', ['school'=>$school]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\School  $school
     * @return \Illuminate\Http\Response
     */
    public function edit(School $school)
    {
        return view('schools.edit', ['school'=>$school]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateSchoolRequest  $request
     * @param  \App\Models\School  $school
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, School $school)
    {
		$school->school_name = $request->school_name;
		$school->school_description = $request->school_description;
		$school->school_place = $request->school_place;
		$school->school_phone = $request->school_phone;
		$target_file = basename($_FILES["school_logo"]["name"]);
		
        $request->file('school_logo')->move(public_path('images/school-logos'), $target_file);
		
		$school->school_logo = '/images/school-logos/'.$target_file;		
		$school->save();
		return redirect()->route('school.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\School  $school
     * @return \Illuminate\Http\Response
     */
    public function destroy(School $school)
    {
       	$attendanceGroups = $school->schoolAttendanceGroups;
		if(count($attendanceGroups) != 0){
			return redirect()->route('school.index')->with('error_message', 'Trinti negalima, mokykla turi grupių');
		}
        $school->delete();
		return redirect()->route('school.index')->with('success_message', 'Sėkmingai ištrinta');
    }
}
