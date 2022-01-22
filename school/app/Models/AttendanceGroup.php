<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AttendanceGroup extends Model
{
    use HasFactory;
	
	public function attendanceGroupStudents(){
		
		return $this->hasMany(Student::class, 'student_attendance_group_id', 'id');
		
	}
	
	public function attendanceGroupSchool(){
		
		return $this->belongsTo(School::class, 'attendance_group_school_id', 'id');
		
	}
}
