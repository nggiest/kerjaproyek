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
    return redirect()->route('lab.index');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::resource('/user', 'UserController');
Route::get('/user/cp/{id}', 'UserController@changepassword')->name('user.change');
Route::match(['put', 'patch'], '/user/cp/{id}', 'UserController@gantipwd')->name('user.ganti');
Route::resource('/lab','JadwallabController');
Route::resource('/inventaris','InventarisController');
Route::resource('/aslab','JadwalAslabController');
Route::resource('/report','ReportController');
Route::resource('/daily','ReportDailyController');