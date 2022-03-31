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
	Route::get('', 'App\Http\Controllers\PlanAccountController@index')->name('accountplan.index')->middleware('auth');
	Route::get('indexAjax', 'App\Http\Controllers\PlanAccountController@indexAjax')->name('accountplan.indexAjax')->middleware('auth');
	//create
	 Route::get('create', 'App\Http\Controllers\PlanAccountController@create')->name('accountplan.create')->middleware('auth');
	 Route::post('store', 'App\Http\Controllers\PlanAccountController@store')->name('accountplan.store')->middleware('auth');
	 Route::post('storeAjax', 'App\Http\Controllers\PlanAccountController@storeAjax')->name('accountplan.storeAjax')->middleware('auth');
	//edit
	Route::get('edit/{article}', 'App\Http\Controllers\PlanAccountController@edit')->name('accountplan.edit')->middleware('auth');
	Route::post('update/{article}', 'App\Http\Controllers\PlanAccountController@update')->name('accountplan.update')->middleware('auth');
	Route::post('updateAjax/{article}', 'App\Http\Controllers\PlanAccountController@updateAjax')->name('accountplan.updateAjax')->middleware('auth');
	//delete
	 Route::post('destroy/{article}', 'App\Http\Controllers\PlanAccountController@destroy')->name('accountplan.destroy')->middleware('auth');
	 Route::post('destroyAjax/{article}', 'App\Http\Controllers\PlanAccountController@destroyAjax')->name('accountplan.destroyAjax')->middleware('auth');
	 Route::post('destroyAjaxMany', 'App\Http\Controllers\PlanAccountController@destroyAjaxMany')->name('accountplan.destroyAjaxMany')->middleware('auth');
	//show
	 Route::get('show/{article}', 'App\Http\Controllers\PlanAccountController@show')->name('accountplan.show')->middleware('auth');	
	 Route::get('showAjax/{article}', 'App\Http\Controllers\PlanAccountController@showAjax')->name('accountplan.showAjax')->middleware('auth');
	 Route::get('searchAjax', 'App\Http\Controllers\PlanAccountController@searchAjax')->name('accountplan.searchAjax')->middleware('auth');
});