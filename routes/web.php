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
    return redirect('/login');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Auth::routes();

Route::get('/home', 'App\Http\Controllers\HomeController@index')->name('home')->middleware('auth');

Route::group(['middleware' => 'auth'], function () {
	Route::get('table-list', function () {
		return view('pages.table_list');
	})->name('table');

	Route::get('typography', function () {
		return view('pages.typography');
	})->name('typography');

	Route::get('icons', function () {
		return view('pages.icons');
	})->name('icons');

	Route::get('map', function () {
		return view('pages.map');
	})->name('map');

	Route::get('notifications', function () {
		return view('pages.notifications');
	})->name('notifications');

	Route::get('rtl-support', function () {
		return view('pages.language');
	})->name('language');

	Route::get('upgrade', function () {
		return view('pages.upgrade');
	})->name('upgrade');
});

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
