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
	Route::get('', 'App\Http\Controllers\ChildController@index')->name('children.index');
	Route::get('create', 'App\Http\Controllers\ChildController@create')->name('children.create');
	Route::post('store', 'App\Http\Controllers\ChildController@store')->name('children.store');
	Route::get('edit', 'App\Http\Controllers\ChildController@edit')->name('children.edit');
});


