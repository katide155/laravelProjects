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


Route::prefix('posts')->group(function(){
	//Index
	Route::get('', 'App\Http\Controllers\PostController@index')->name('post.index')->middleware('auth');
	//create
	 Route::get('create', 'App\Http\Controllers\PostController@create')->name('post.create')->middleware('auth');
	 Route::post('store', 'App\Http\Controllers\PostController@store')->name('post.store')->middleware('auth');
	//edit
	Route::get('edit/{post}', 'App\Http\Controllers\PostController@edit')->name('post.edit')->middleware('auth');
	Route::post('update/{post}', 'App\Http\Controllers\PostController@update')->name('post.update')->middleware('auth');
	//delete
	 Route::post('destroy/{post}', 'App\Http\Controllers\PostController@destroy')->name('post.destroy')->middleware('auth');
	//show
	 Route::get('show/{post}', 'App\Http\Controllers\PostController@show')->name('post.show')->middleware('auth');	
	 Route::get('filter', 'App\Http\Controllers\PostController@filter')->name('post.filter')->middleware('auth');
});

Route::prefix('categories')->group(function(){
	//Index
	Route::get('', 'App\Http\Controllers\CategoryController@index')->name('category.index')->middleware('auth');
	//create
	 Route::get('create', 'App\Http\Controllers\CategoryController@create')->name('category.create')->middleware('auth');
	 Route::post('store', 'App\Http\Controllers\CategoryController@store')->name('category.store')->middleware('auth');
	//edit
	Route::get('edit/{category}', 'App\Http\Controllers\CategoryController@edit')->name('category.edit')->middleware('auth');
	Route::post('update/{category}', 'App\Http\Controllers\CategoryController@update')->name('category.update')->middleware('auth');
	//delete
	 Route::post('destroy/{category}', 'App\Http\Controllers\CategoryController@destroy')->name('category.destroy')->middleware('auth');
	//show
	 Route::get('show/{category}', 'App\Http\Controllers\CategoryController@show')->name('category.show')->middleware('auth');	
});