<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Http\Requests\StoreStudentRequest;
use App\Http\Requests\UpdateStudentRequest;
use Illuminate\Http\Request;
use App\Models\AttendanceGroup;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
		$students = Student::all();
		$attendanceGroups = AttendanceGroup::all();
		return view('students.index', ['students'=>$students],['attendanceGroups'=>$attendanceGroups]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
		$attendanceGroups = AttendanceGroup::all();
        return view('students.create',['attendanceGroups'=>$attendanceGroups]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreStudentRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $student = new Student;
		$student->student_name = $request->student_name;
		$student->student_surname = $request->student_surname;
		$student->student_attendance_group_id = $request->student_attendance_group_id;
		$student->student_image_url = $request->student_image_url;
		
		$student->save();
		return redirect()->route('student.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function show(Student $student)
    {
		$studentGroup = $student->studentAttendanceGroup->attendance_group_name;
		$attendanceGroups = AttendanceGroup::all();
        return view('students.show', ['student'=>$student],['studentGroup'=>$studentGroup]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function edit(Student $student)
    {
		$attendanceGroups = AttendanceGroup::all();
        return view('students.edit', ['student'=>$student],['attendanceGroups'=>$attendanceGroups]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateStudentRequest  $request
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Student $student)
    {
		$student->student_name = $request->student_name;
		$student->student_surname = $request->student_surname;
		$student->student_attendance_group_id = $request->student_attendance_group_id;
		$student->student_image_url = $request->student_image_url;
		
		$student->save();
		return redirect()->route('student.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function destroy(Student $student)
    {
        $student->delete();
		return redirect()->route('student.index')->with('success_message', 'Sėkmingai ištrinta');
    }
}
