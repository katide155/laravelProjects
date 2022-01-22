<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;
	
	public function companyClients(){
		
		return $this->hasMany(Client::class, 'client_company_id', 'id');
		
	}
	
	public function companyType(){
		
		return $this->belongsTo(CompanyType::class, 'company_type_id', 'id');
		
	}
}
