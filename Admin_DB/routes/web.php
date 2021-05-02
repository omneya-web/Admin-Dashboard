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
Auth::routes();
Route::post('/login', 'Auth\LoginController@loginAdmin')->name('loginAdmin');
Route::group(['middleware', 'Admin'], function () {

    Route::get('/dashboard/addUser', 'userController@addUserForm' );
    Route::post('/dashboard/addUser', 'userController@addUser')->name('addUser');
    Route::get('/dashboard/showUser', 'userController@showUser');
    Route::post('/dashboard/editUser', 'userController@updateUser')->name('updateUser');
    Route::get('/deleteAdmin/{id}', 'AdminController@deleteAdmin');
    Route::post('/addAdminUser', 'AdminController@addAdminUser')->name('addAdminUser');
    Route::get('/admins', 'AdminController@getAllAdmin');
    
    });


Route::get('/home', 'HomeController@index')->name('home');
Route::get('/', 'HomeController@index');
Route::get('/adminprofile', 'HomeController@profile');
Route::get('/primary', 'HomeController@primary');
Route::get('/users', 'userController@Users');





Route::get('/addUser', 'HomeController@addUser')->name('addUser');
Route::get('/addAdmin', 'AdminController@addAdmin');
Route::post('/addAdmin', 'AdminController@addAdminUser')->name('addAdmin');
Route::get('/userDetails', 'userController@userDetails');
Route::get('/medical', 'userController@showMedical');
Route::get('/adminDetails', 'AdminController@adminDetails');
Route::get('/feedback', 'HomeController@feedback');
Route::get('/places', 'HomeController@places');
Route::get('/message', 'HomeController@message');
Route::get('/reply', 'HomeController@reply');