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
    return view('homepage');
});

Route::get('/about', function () {
    return view('about');
});

Route::get('/contact', function () {
    return view('contact');
});

Route::prefix('children')->group(function(){
	//Index
	Route::get('', 'App\Http\Controllers\ChildController@index')->name('child.index');
	//create
	Route::get('create', 'App\Http\Controllers\ChildController@create')->name('child.create');
	Route::post('store', 'App\Http\Controllers\ChildController@store')->name('child.store');
	//edit
	Route::get('edit/{child}', 'App\Http\Controllers\ChildController@edit')->name('child.edit');
	Route::post('update/{child}', 'App\Http\Controllers\ChildController@update')->name('child.update');
	//delete
	Route::post('destroy/{child}', 'App\Http\Controllers\ChildController@destroy')->name('child.destroy');
	//show
	Route::get('show/{child}', 'App\Http\Controllers\ChildController@show')->name('child.show');	
});

Route::prefix('groups')->group(function(){
	//index
	Route::get('', 'App\Http\Controllers\GroupController@index')->name('group.index');
	//create
	Route::get('create', 'App\Http\Controllers\GroupController@create')->name('group.create');
	Route::post('store', 'App\Http\Controllers\GroupController@store')->name('group.store');
	//edit
	Route::get('edit/{group}', 'App\Http\Controllers\GroupController@edit')->name('group.edit');
});
