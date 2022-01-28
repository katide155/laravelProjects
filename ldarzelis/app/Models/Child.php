<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Child extends Model
{
    use HasFactory;
	
	public function childGroup(){
		
		return $this->belongsTo(Group::class, 'child_group_id', 'id');
		
	}
}
