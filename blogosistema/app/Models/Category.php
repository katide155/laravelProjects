<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class Category extends Model
{
    use HasFactory;


	use Sortable;
	
	public $sortable = ['id', 'title', 'description'];
	
	//pamirsau pasakyti kad modelyje reikia parasyti sita kintamaji $sortableAs, nes jei category_posts_count irasytas i $sortable tada sql klaida, supratau, ačiū
	public $sortableAs = ['category_posts_count'];
	
	public function categoryPosts(){
		
		return $this->hasMany(Post::class, 'category_id', 'id');

	}
}
