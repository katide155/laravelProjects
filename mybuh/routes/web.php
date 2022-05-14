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

Route::prefix('accounts-plan')->group(function(){
	//Index
	Route::get('', 'App\Http\Controllers\PlanAccountController@index')->name('accountplan.index')->middleware('auth');//p
	Route::get('indexAjax', 'App\Http\Controllers\PlanAccountController@indexAjax')->name('accountplan.indexAjax')->middleware('auth');//p
	
	Route::post('importData', 'App\Http\Controllers\PlanAccountController@importData')->name('accountplan.importData')->middleware('auth');//p
	//create
	 Route::get('create', 'App\Http\Controllers\PlanAccountController@create')->name('accountplan.create')->middleware('auth');
	 Route::post('store', 'App\Http\Controllers\PlanAccountController@store')->name('accountplan.store')->middleware('auth');
	 Route::post('storeAjax', 'App\Http\Controllers\PlanAccountController@storeAjax')->name('accountplan.storeAjax')->middleware('auth');
	//edit
	Route::get('edit/{planAccount}', 'App\Http\Controllers\PlanAccountController@edit')->name('accountplan.edit')->middleware('auth');
	Route::post('update/{planAccount}', 'App\Http\Controllers\PlanAccountController@update')->name('accountplan.update')->middleware('auth');
	Route::post('updateItem/{planAccount}', 'App\Http\Controllers\PlanAccountController@updateItem')->name('accountplan.updateItem')->middleware('auth');
	//delete
	 Route::post('destroy/{planAccount}', 'App\Http\Controllers\PlanAccountController@destroy')->name('accountplan.destroy')->middleware('auth');//p
	 Route::post('destroyMany', 'App\Http\Controllers\PlanAccountController@destroyMany')->name('accountplan.destroyMany')->middleware('auth');//p
	//show
	 Route::post('show', 'App\Http\Controllers\PlanAccountController@show')->name('accountplan.show')->middleware('auth');	
	 Route::get('showItem/{planAccount}', 'App\Http\Controllers\PlanAccountController@showItem')->name('accountplan.showItem')->middleware('auth');
	 Route::get('searchAccount', 'App\Http\Controllers\PlanAccountController@searchAccount')->name('accountplan.searchAccount')->middleware('auth');//p
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