<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

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
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

require __DIR__.'/auth.php';


Route::prefix('accounts-plan')->group(function(){
	//Index
	Route::get('', 'App\Http\Controllers\PlanAccountController@index')->name('accountplan.index')->middleware('auth');
	// Route::get('indexAjax', 'App\Http\Controllers\ArticleController@indexAjax')->name('article.indexAjax')->middleware('auth');
	//create
	 // Route::get('create', 'App\Http\Controllers\ArticleController@create')->name('article.create')->middleware('auth');
	 // Route::post('store', 'App\Http\Controllers\ArticleController@store')->name('article.store')->middleware('auth');
	 // Route::post('storeAjax', 'App\Http\Controllers\ArticleController@storeAjax')->name('article.storeAjax')->middleware('auth');
	//edit
	// Route::get('edit/{article}', 'App\Http\Controllers\ArticleController@edit')->name('article.edit')->middleware('auth');
	// Route::post('update/{article}', 'App\Http\Controllers\ArticleController@update')->name('article.update')->middleware('auth');
	// Route::post('updateAjax/{article}', 'App\Http\Controllers\ArticleController@updateAjax')->name('article.updateAjax')->middleware('auth');
	//delete
	 // Route::post('destroy/{article}', 'App\Http\Controllers\ArticleController@destroy')->name('article.destroy')->middleware('auth');
	 // Route::post('destroyAjax/{article}', 'App\Http\Controllers\ArticleController@destroyAjax')->name('article.destroyAjax')->middleware('auth');
	 // Route::post('destroyAjaxMany', 'App\Http\Controllers\ArticleController@destroyAjaxMany')->name('article.destroyAjaxMany')->middleware('auth');
	//show
	 // Route::get('show/{article}', 'App\Http\Controllers\ArticleController@show')->name('article.show')->middleware('auth');	
	 // Route::get('showAjax/{article}', 'App\Http\Controllers\ArticleController@showAjax')->name('article.showAjax')->middleware('auth');
	 // Route::get('searchAjax', 'App\Http\Controllers\ArticleController@searchAjax')->name('article.searchAjax')->middleware('auth');
});