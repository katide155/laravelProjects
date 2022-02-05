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


Route::prefix('products')->group(function(){
	//Index
	Route::get('', 'App\Http\Controllers\ProductController@index')->name('product.index')->middleware('auth');
	//create
	 Route::get('create', 'App\Http\Controllers\ProductController@create')->name('product.create')->middleware('auth');
	 Route::post('store', 'App\Http\Controllers\ProductController@store')->name('product.store')->middleware('auth');
	//edit
	Route::get('edit/{product}', 'App\Http\Controllers\ProductController@edit')->name('product.edit')->middleware('auth');
	Route::post('update/{product}', 'App\Http\Controllers\ProductController@update')->name('product.update')->middleware('auth');
	//delete
	 Route::post('destroy/{product}', 'App\Http\Controllers\ProductController@destroy')->name('product.destroy')->middleware('auth');
	//show
	 Route::get('show/{product}', 'App\Http\Controllers\ProductController@show')->name('product.show')->middleware('auth');
	//search
	 Route::get('filter', 'App\Http\Controllers\ProductController@filter')->name('product.filter')->middleware('auth');
});

Route::prefix('categories')->group(function(){
	//Index
	Route::get('', 'App\Http\Controllers\ProductCategoryController@index')->name('category.index')->middleware('auth');
	//create
	 Route::get('create', 'App\Http\Controllers\ProductCategoryController@create')->name('category.create')->middleware('auth');
	 Route::post('store', 'App\Http\Controllers\ProductCategoryController@store')->name('category.store')->middleware('auth');
	//edit
	Route::get('edit/{productCategory}', 'App\Http\Controllers\ProductCategoryController@edit')->name('category.edit')->middleware('auth');
	Route::post('update/{productCategory}', 'App\Http\Controllers\ProductCategoryController@update')->name('category.update')->middleware('auth');
	//delete
	 Route::post('destroy/{productCategory}', 'App\Http\Controllers\ProductCategoryController@destroy')->name('category.destroy')->middleware('auth');
	//show
	 Route::get('show/{productCategory}', 'App\Http\Controllers\ProductCategoryController@show')->name('category.show')->middleware('auth');
	//search
	 Route::get('search', 'App\Http\Controllers\ProductCategoryController@search')->name('category.search')->middleware('auth');
});