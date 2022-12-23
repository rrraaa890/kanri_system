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
Route::resource('/managements', 'ManagementController');
Route::get('/managements/export', 'ManagementController@export')->name('managements.export');
Route::resource('/coils', 'CoilController');
Route::resource('/levelers', 'LevelerController');
Route::resource('/trimmings', 'TrimmingController');
Route::resource('/press', 'PressController');