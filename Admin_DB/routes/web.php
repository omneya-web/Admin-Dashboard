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

Route::get('/home','HomeController@index')->name('home');

<<<<<<< Updated upstream
=======

Route::get('/profile', 'HomeController@profile');

Route::get('/feedback','HomeController@feedback');

Route::get('/places','HomeController@places');

Route::get('/primaryexamination','HomeController@primaryexamination');

Route::get('/message','HomeController@message');

Route::get('/reply','HomeController@reply');



>>>>>>> Stashed changes
