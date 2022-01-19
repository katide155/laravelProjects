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


Route::prefix('clients')->group(function(){
	//Index
	Route::get('', 'App\Http\Controllers\ClientController@index')->name('client.index');
	//create
	Route::get('create', 'App\Http\Controllers\ClientController@create')->name('client.create');
	Route::post('store', 'App\Http\Controllers\ClientController@store')->name('client.store');
	//edit
	Route::get('edit/{client}', 'App\Http\Controllers\ClientController@edit')->name('client.edit');
	Route::post('update/{client}', 'App\Http\Controllers\ClientController@update')->name('client.update');
	//delete
	Route::post('destroy/{client}', 'App\Http\Controllers\ClientController@destroy')->name('client.destroy');
	//show
	Route::get('show/{client}', 'App\Http\Controllers\ClientController@show')->name('client.show');	
});

Route::prefix('documents')->group(function(){
	//Index
	Route::get('', 'App\Http\Controllers\DocumentController@index')->name('document.index');
	//create
	Route::get('create', 'App\Http\Controllers\DocumentController@create')->name('document.create');
	Route::post('store', 'App\Http\Controllers\DocumentController@store')->name('document.store');
	//edit
	Route::get('edit/{document}', 'App\Http\Controllers\DocumentController@edit')->name('document.edit');
	Route::post('update/{document}', 'App\Http\Controllers\DocumentController@update')->name('document.update');
	//delete
	Route::post('destroy/{document}', 'App\Http\Controllers\DocumentController@destroy')->name('document.destroy');
	//show
	Route::get('show/{document}', 'App\Http\Controllers\DocumentController@show')->name('document.show');	
});