<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;
	
	public function studentAttendanceGroup(){
		
		return $this->belongsTo(AttendanceGroup::class, 'student_attendance_group_id', 'id');
		
	}
}
