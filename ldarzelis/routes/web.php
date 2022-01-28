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
	Route::get('', 'App\Http\Controllers\ChildController@index')->name('child.index')->middleware('auth');
	//create
	Route::get('create', 'App\Http\Controllers\ChildController@create')->name('child.create')->middleware('auth');
	Route::post('store', 'App\Http\Controllers\ChildController@store')->name('child.store')->middleware('auth');
	//edit
	Route::get('edit/{child}', 'App\Http\Controllers\ChildController@edit')->name('child.edit')->middleware('auth');
	Route::post('update/{child}', 'App\Http\Controllers\ChildController@update')->name('child.update')->middleware('auth');
	//delete
	Route::post('destroy/{child}', 'App\Http\Controllers\ChildController@destroy')->name('child.destroy')->middleware('auth');
	//show
	Route::get('show/{child}', 'App\Http\Controllers\ChildController@show')->name('child.show')->middleware('auth');	
});

Route::prefix('groups')->group(function(){
	//Index
	Route::get('', 'App\Http\Controllers\GroupController@index')->name('group.index')->middleware('auth');
	//create
	Route::get('create', 'App\Http\Controllers\GroupController@create')->name('group.create')->middleware('auth');
	Route::post('store/{group}', 'App\Http\Controllers\GroupController@store')->name('group.store')->middleware('auth');
	Route::post('store', 'App\Http\Controllers\GroupController@store')->name('group.store')->middleware('auth');
	//edit
	Route::get('edit/{group}', 'App\Http\Controllers\GroupController@edit')->name('group.edit')->middleware('auth');
	Route::post('update/{group}', 'App\Http\Controllers\GroupController@update')->name('group.update')->middleware('auth');
	//delete
	Route::post('destroy/{group}/{page?}', 'App\Http\Controllers\GroupController@destroy')->name('group.destroy')->middleware('auth');
	//show
	Route::get('show/{group}', 'App\Http\Controllers\GroupController@show')->name('group.show')->middleware('auth');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
