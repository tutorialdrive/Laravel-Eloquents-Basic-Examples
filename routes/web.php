<?php
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

Route::get('/home', 'HomeController@index')->name('home');

// List all records
Route::get('/studentboard', 'StudentboardController@index');

// Remove record
Route::delete('/studentboard/delete/{id}', 'StudentboardController@destroy')->name('studentRecord.destroy');

// Add new record
Route::get('/studentboard/add', 'StudentboardController@create');
Route::post('/studentboard/add', 'StudentboardController@store');

// View record
Route::get('/studentboard/view/{id}', 'StudentboardController@show');
