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
Route::get('/welcome','HomeController@welcome')->name('welcome');
Route::get('pages','HomeController@callpicker')->name('callpicker');


Route::prefix('admin')->group(function(){
	Route::get('/login','Auth\AdminLoginController@showLoginForm')->name('adminform');
	Route::post('/login','Auth\AdminLoginController@login')->name('adminlogin');
	Route::get('/','AdminController@index')->name('admin');
});
