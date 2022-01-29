<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    use HasFactory;
	
	
	public function authorImage(){
		
		return $this->hasOne(AuthorImage::class, 'id', 'author_image_id');
		
	}
}
