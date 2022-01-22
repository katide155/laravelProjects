<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CompanyType extends Model
{
    use HasFactory;
	
	
	public function companyTypeCompanies(){
		
		return $this->hasMany(Company::class, 'company_type_id', 'id');
		
	}
}
