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


Route::prefix('profileimages')->group(function(){
	//Index
	Route::get('', 'App\Http\Controllers\ProfileImageController@index')->name('profileimage.index')->middleware('auth');
	//create
	 Route::get('create', 'App\Http\Controllers\ProfileImageController@create')->name('profileimage.create')->middleware('auth');
	 Route::post('store', 'App\Http\Controllers\ProfileImageController@store')->name('profileimage.store')->middleware('auth');
	//edit
	// Route::get('edit/{child}', 'App\Http\Controllers\ChildController@edit')->name('child.edit')->middleware('auth');
	// Route::post('update/{child}', 'App\Http\Controllers\ChildController@update')->name('child.update')->middleware('auth');
	//delete
	// Route::post('destroy/{child}', 'App\Http\Controllers\ChildController@destroy')->name('child.destroy')->middleware('auth');
	//show
	// Route::get('show/{child}', 'App\Http\Controllers\ChildController@show')->name('child.show')->middleware('auth');	
});