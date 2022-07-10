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
Auth::routes();

Route::get('/home', 'App\Http\Controllers\HomeController@index')->name('home');

Route::group(['middleware' => 'auth'], function () {
	Route::resource('user', 'App\Http\Controllers\UserController', ['except' => ['show']]);
	Route::get('profile', ['as' => 'profile.edit', 'uses' => 'App\Http\Controllers\ProfileController@edit']);
	Route::put('profile', ['as' => 'profile.update', 'uses' => 'App\Http\Controllers\ProfileController@update']);
	Route::get('upgrade', function () {return view('pages.upgrade');})->name('upgrade');
	 Route::get('map', function () {return view('pages.maps');})->name('map');
     Route::get('prospects', 'App\Http\Controllers\ProspectController@index')->name('prospects.index');
    Route::get('prospects/create', 'App\Http\Controllers\ProspectController@create')->name('prospects.create');
    Route::post('prospects/store', 'App\Http\Controllers\ProspectController@store')->name('prospects.store');
    Route::get('prospects/{prospect_id}', 'App\Http\Controllers\ProspectController@show')->name('prospects.show');
     Route::get('complaints', 'App\Http\Controllers\ComplaintController@index')->name('complaints.index');
    Route::get('complaints/create', 'App\Http\Controllers\ComplaintController@create')->name('complaints.create');
    Route::post('complaints/store', 'App\Http\Controllers\ComplaintController@store')->name('complaints.store');
    Route::get('complaints/{complaint_id}', 'App\Http\Controllers\ComplaintController@show')->name('complaints.show');
     Route::get('suggestions', 'App\Http\Controllers\SuggestionController@index')->name('suggestions.index');
    Route::get('suggestions/create', 'App\Http\Controllers\SuggestionController@create')->name('suggestions.create');
    Route::post('suggestions/store', 'App\Http\Controllers\SuggestionController@store')->name('suggestions.store');
    Route::get('suggestions/{suggestion_id}', 'App\Http\Controllers\SuggestionController@show')->name('suggestions.show');
	 Route::get('icons', function () {return view('pages.icons');})->name('icons');
	 Route::get('table-list', function () {return view('pages.tables');})->name('table');
	Route::put('profile/password', ['as' => 'profile.password', 'uses' => 'App\Http\Controllers\ProfileController@password']);
});

Route::middleware('role:admin')->group( function () {
    Route::get('/private', function () {
        return 'Hello super admin !';
    });
});

