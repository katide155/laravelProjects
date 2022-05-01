<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class PlanAccount extends Model
{
    use HasFactory;
	
	use Sortable;
	
	public $sortable = ['account_number', 'account_title', 'account_type_id'];
	
	public function planAccountType(){
		
		return $this->belongsTo(AccountType::class, 'account_type_id', 'id');
		
	}
	
}