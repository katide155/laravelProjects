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


Route::get('/clients', function () {
    return view('client.index');
});

Route::get('/images', function () {
    return view('image.index');
});

Route::prefix('clie')->group(function(){
	Route::get('', 'App\Http\Controllers\ClientController@index')->name('client.index');
});

Route::prefix('clientscurl')->group(function(){
	Route::get('', 'App\Http\Controllers\ClientController@index')->name('client.index');
	Route::get('create', 'App\Http\Controllers\ClientController@create')->name('client.create');
	Route::post('store', 'App\Http\Controllers\ClientController@store')->name('client.store');
	Route::get('edit/{id}', 'App\Http\Controllers\ClientController@edit')->name('client.edit');
	Route::post('update/{id}', 'App\Http\Controllers\ClientController@update')->name('client.update');
	Route::get('show/{id}', 'App\Http\Controllers\ClientController@show')->name('client.show');
	Route::post('delete/{id}', 'App\Http\Controllers\ClientController@destroy')->name('client.delete');
});