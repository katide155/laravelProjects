<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class Post extends Model
{
    use HasFactory;
	
	use Sortable;
	
	public $sortable = ['id', 'title', 'description', 'category_id'];
	
		public function postCategory(){
		
		return $this->hasOne(Category::class, 'id', 'category_id');

	}
}
