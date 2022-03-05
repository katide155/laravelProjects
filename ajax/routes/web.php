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

Route::prefix('types')->group(function(){
	//Index
	Route::get('', 'App\Http\Controllers\TypeController@index')->name('type.index')->middleware('auth');
	//create
	 Route::get('create', 'App\Http\Controllers\TypeController@create')->name('type.create')->middleware('auth');
	 Route::post('store', 'App\Http\Controllers\TypeController@store')->name('type.store')->middleware('auth');
	//edit
	Route::get('edit/{type}', 'App\Http\Controllers\TypeController@edit')->name('type.edit')->middleware('auth');
	Route::post('update/{type}', 'App\Http\Controllers\TypeController@update')->name('type.update')->middleware('auth');
	//delete
	 Route::post('destroy/{type}', 'App\Http\Controllers\TypeController@destroy')->name('type.destroy')->middleware('auth');
	//show
	 Route::get('show/{type}', 'App\Http\Controllers\TypeController@show')->name('type.show')->middleware('auth');	
});