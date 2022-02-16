<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AuthorImage extends Model
{
    use HasFactory;
	
	public function imageAuthor(){

		return $this->belongsTo(Author::class, 'author_id', 'id');
	}
}
