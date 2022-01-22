<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class School extends Model
{
    use HasFactory;
	
	public function schoolAttendanceGroups(){
		
		return $this->hasMany(AttendanceGroup::class, 'attendance_group_school_id', 'id');
		
	}
}
