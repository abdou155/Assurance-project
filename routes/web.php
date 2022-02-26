<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;


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
    return redirect('/login');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Auth::routes();

Route::get('/home', 'App\Http\Controllers\HomeController@index')->name('home')->middleware('auth');


Route::group(['middleware' => 'auth'], function () {
	Route::resource('user', 'App\Http\Controllers\UserController', ['except' => ['show']]);
	Route::get('profile', ['as' => 'profile.edit', 'uses' => 'App\Http\Controllers\ProfileController@edit']);
	Route::put('profile', ['as' => 'profile.update', 'uses' => 'App\Http\Controllers\ProfileController@update']);
	Route::put('profile/password', ['as' => 'profile.password', 'uses' => 'App\Http\Controllers\ProfileController@password']);
});

Route::prefix('agents')->group(function () {
    Route::get('list', 'App\Http\Controllers\AgentController@index')->name('agentIndex');
    Route::get('add', 'App\Http\Controllers\AgentController@create')->name('agentAddForm');
    Route::post('store', 'App\Http\Controllers\AgentController@Store')->name('agentStore');
    /* TODO */
    /* Route::get('edit/{id}', 'App\Http\Controllers\AgentController@edit')->name('agentUpdateForm');
    Route::post('update', 'App\Http\Controllers\AgentController@update')->name('agentUpdate'); */
    Route::delete('delete/{id}', 'App\Http\Controllers\AgentController@destroy')->name('agentDelete');
});

Route::prefix('agences')->group(function () {
    Route::get('list', 'App\Http\Controllers\AgenceController@index')->name('agenceIndex');
    Route::get('add', 'App\Http\Controllers\AgenceController@create')->name('agenceAddForm');
    Route::post('store', 'App\Http\Controllers\AgenceController@Store')->name('agenceStore');
    Route::get('edit/{id}', 'App\Http\Controllers\AgenceController@edit')->name('agenceUpdateForm');
    Route::post('update', 'App\Http\Controllers\AgenceController@update')->name('agenceUpdate');
    Route::delete('delete/{id}', 'App\Http\Controllers\AgenceController@destroy')->name('agenceDelete');
});

Route::prefix('categories')->group(function () {
    Route::get('list', 'App\Http\Controllers\CategorieController@index')->name('categorieIndex');
    Route::get('add', 'App\Http\Controllers\CategorieController@create')->name('categorieAddForm');
    Route::post('store', 'App\Http\Controllers\CategorieController@Store')->name('categorieStore');
    Route::get('edit/{id}', 'App\Http\Controllers\CategorieController@edit')->name('categorieUpdateForm');
    Route::post('update', 'App\Http\Controllers\CategorieController@update')->name('categorieUpdate');
    Route::delete('delete/{id}', 'App\Http\Controllers\CategorieController@destroy')->name('categorieDelete');
});

Route::prefix('services')->group(function () {
    Route::get('list', 'App\Http\Controllers\ServiceController@index')->name('serviceIndex');
    Route::get('show/{id}', 'App\Http\Controllers\ServiceController@show')->name('serviceShow');
    Route::get('add', 'App\Http\Controllers\ServiceController@create')->name('serviceAddForm');
    Route::post('store', 'App\Http\Controllers\ServiceController@Store')->name('serviceStore');
    Route::get('edit/{id}', 'App\Http\Controllers\ServiceController@edit')->name('serviceUpdateForm');
    Route::post('update', 'App\Http\Controllers\ServiceController@update')->name('serviceUpdate');
    Route::delete('delete/{id}', 'App\Http\Controllers\ServiceController@destroy')->name('serviceDelete');
});


Route::prefix('contacts')->group(function () {
    Route::get('show/{id}', 'App\Http\Controllers\HomeController@showContact')->name('contactShow');
});
