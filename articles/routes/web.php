<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::prefix('articles')->group(function(){
	//Index
	Route::get('', 'App\Http\Controllers\ArticleController@index')->name('article.index')->middleware('auth');
	//create
	 Route::get('create', 'App\Http\Controllers\ArticleController@create')->name('article.create')->middleware('auth');
	 Route::post('store', 'App\Http\Controllers\ArticleController@store')->name('article.store')->middleware('auth');
	//edit
	Route::get('edit/{article}', 'App\Http\Controllers\ArticleController@edit')->name('article.edit')->middleware('auth');
	Route::post('update/{article}', 'App\Http\Controllers\ArticleController@update')->name('article.update')->middleware('auth');
	//delete
	 Route::post('destroy/{article}', 'App\Http\Controllers\ArticleController@destroy')->name('article.destroy')->middleware('auth');
	//show
	 Route::get('show/{article}', 'App\Http\Controllers\ArticleController@show')->name('article.show')->middleware('auth');	
});

Route::prefix('articleimages')->group(function(){
	//Index
	Route::get('', 'App\Http\Controllers\ArticleImageController@index')->name('articleimage.index')->middleware('auth');
	//create
	 Route::get('create', 'App\Http\Controllers\ArticleImageController@create')->name('articleimage.create')->middleware('auth');
	 Route::post('store', 'App\Http\Controllers\ArticleImageController@store')->name('articleimage.store')->middleware('auth');
	//edit
	Route::get('edit/{articleImage}', 'App\Http\Controllers\ArticleImageController@edit')->name('articleimage.edit')->middleware('auth');
	Route::post('update/{articleImage}', 'App\Http\Controllers\ArticleImageController@update')->name('articleimage.update')->middleware('auth');
	//delete
	 Route::post('destroy/{articleImage}', 'App\Http\Controllers\ArticleImageController@destroy')->name('articleimage.destroy')->middleware('auth');
	//show
	 Route::get('show/{articleImage}', 'App\Http\Controllers\ArticleImageController@show')->name('articleimage.show')->middleware('auth');	
});

Route::prefix('authors')->group(function(){
	//Index
	Route::get('', 'App\Http\Controllers\AuthorController@index')->name('author.index')->middleware('auth');
	//create
	 Route::get('create', 'App\Http\Controllers\AuthorController@create')->name('author.create')->middleware('auth');
	 Route::post('store', 'App\Http\Controllers\AuthorController@store')->name('author.store')->middleware('auth');
	//edit
	Route::get('edit/{author}', 'App\Http\Controllers\AuthorController@edit')->name('author.edit')->middleware('auth');
	Route::post('update/{author}', 'App\Http\Controllers\AuthorController@update')->name('author.update')->middleware('auth');
	//delete
	 Route::post('destroy/{author}', 'App\Http\Controllers\AuthorController@destroy')->name('author.destroy')->middleware('auth');
	//show
	 Route::get('show/{author}', 'App\Http\Controllers\AuthorController@show')->name('author.show')->middleware('auth');
	//search
	 Route::get('search', 'App\Http\Controllers\AuthorController@search')->name('author.search')->middleware('auth');
});

Route::prefix('authorimages')->group(function(){
	//Index
	Route::get('', 'App\Http\Controllers\AuthorImageController@index')->name('authorimage.index')->middleware('auth');
	//create
	 Route::get('create', 'App\Http\Controllers\AuthorImageController@create')->name('authorimage.create')->middleware('auth');
	 Route::post('store', 'App\Http\Controllers\AuthorImageController@store')->name('authorimage.store')->middleware('auth');
	//edit
	Route::get('edit/{authorImage}', 'App\Http\Controllers\AuthorImageController@edit')->name('authorimage.edit')->middleware('auth');
	Route::post('update/{authorImage}', 'App\Http\Controllers\AuthorImageController@update')->name('authorimage.update')->middleware('auth');
	//delete
	Route::post('destroy/{authorImage}', 'App\Http\Controllers\AuthorImageController@destroy')->name('authorimage.destroy')->middleware('auth');
	//show
	Route::get('show/{authorImage}', 'App\Http\Controllers\AuthorImageController@show')->name('authorimage.show')->middleware('auth');	
});

Route::prefix('books')->group(function(){
	//Index
	Route::get('', 'App\Http\Controllers\BookController@index')->name('book.index')->middleware('auth');
	//create
	 Route::get('create', 'App\Http\Controllers\BookController@create')->name('book.create')->middleware('auth');
	 Route::post('store', 'App\Http\Controllers\BookController@store')->name('book.store')->middleware('auth');
	//edit
	Route::get('edit/{book}', 'App\Http\Controllers\BookController@edit')->name('book.edit')->middleware('auth');
	Route::post('update/{book}', 'App\Http\Controllers\BookController@update')->name('book.update')->middleware('auth');
	//delete
	 Route::post('destroy/{book}', 'App\Http\Controllers\BookController@destroy')->name('book.destroy')->middleware('auth');
	//show
	 Route::get('show/{book}', 'App\Http\Controllers\BookController@show')->name('book.show')->middleware('auth');
	//search
	 Route::get('filter', 'App\Http\Controllers\BookController@filter')->name('book.filter')->middleware('auth');
	 Route::get('pagination', 'App\Http\Controllers\BookController@pagination')->name('book.pagination')->middleware('auth');
	 Route::get('sortfilter', 'App\Http\Controllers\BookController@sortfilter')->name('book.sortfilter')->middleware('auth');
	 Route::get('sortable', 'App\Http\Controllers\BookController@sortable')->name('book.sortable')->middleware('auth');
	 Route::get('advancedsort', 'App\Http\Controllers\BookController@advancedsort')->name('book.advancedsort')->middleware('auth');
});

Route::prefix('ratings')->group(function(){
	//Index
	Route::get('', 'App\Http\Controllers\RatingController@index')->name('rating.index')->middleware('auth');
	//create
	 Route::get('create', 'App\Http\Controllers\RatingController@create')->name('rating.create')->middleware('auth');
	 Route::get('createjs', 'App\Http\Controllers\RatingController@createjs')->name('rating.createjs')->middleware('auth');
	 Route::post('store', 'App\Http\Controllers\RatingController@store')->name('rating.store')->middleware('auth');
	 Route::post('storejs', 'App\Http\Controllers\RatingController@storejs')->name('rating.storejs')->middleware('auth');
	//edit
	Route::get('edit/{rating}', 'App\Http\Controllers\RatingController@edit')->name('rating.edit')->middleware('auth');
	Route::post('update/{rating}', 'App\Http\Controllers\RatingController@update')->name('rating.update')->middleware('auth');
	//delete
	 Route::post('destroy/{rating}', 'App\Http\Controllers\RatingController@destroy')->name('rating.destroy')->middleware('auth');
	//show
	 Route::get('show/{rating}', 'App\Http\Controllers\RatingController@show')->name('rating.show')->middleware('auth');	
});