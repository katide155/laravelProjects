<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;
	
	public function articleCategories()
	{
		return $this->belongsToMany(Category::class, 'article_categories', 'article_id','category_id');
	}
	
	public function articleAuthor(){
		
		return $this->belongsTo(Author::class, 'author_id', 'id');
		
	}

}
