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
    Route::get('/getAdminDetails/{id}', 'AdminController@getAdminDetails');
    Route::get('/adminprofile/{id}', 'AdminController@getAdminDetails');
    Route::post('/updateAdmin/{id}', 'AdminController@updateAdminUser');
    Route::post('/addAdminUser', 'AdminController@addAdminUser')->name('addAdminUser');
    Route::get('/admins', 'AdminController@getAllAdmin');
    
    });


Route::get('/home', 'HomeController@index')->name('home');
Route::get('/', 'HomeController@index');
Route::get('/primary', 'HomeController@primary');
Route::get('/users', 'AdminController@getAllUsers');





Route::get('/addUser', 'HomeController@addUser')->name('addUser');
Route::get('/addAdmin', 'AdminController@addAdmin');
Route::post('/addAdmin', 'AdminController@addAdminUser')->name('addAdmin');
//-----------------------------------USER--Routes-----------------------------//
Route::get('/userDetails/{id}', 'AdminController@getUserDetails');
Route::get('/deleteUser/{id}', 'AdminController@deleteUser');
Route::get('/medical/{id}', 'AdminController@getUserMedicalRecord');
Route::get('/userMedicalRecordDetails/{id}', 'AdminController@getUserMedicalRecordDetails');
Route::get('/deleteUserMedicalRecord/{id}', 'AdminController@deleteUserMedicalRecord');
//-----------------------------------places--Routes-----------------------------//
Route::get('/places', 'AdminController@getAllPlaces')->name('places');
Route::get('/deletePlace/{id}', 'AdminController@deletePlace');
Route::get('/viewPlace/{id}', 'AdminController@getPlace');
Route::post('/updatePlaces/{id}', 'AdminController@updatePlaces');
Route::post('/addPlace', 'AdminController@addPlace');
//-----------------------------------Feedback--Routes-----------------------------//
Route::get('/feedback', 'AdminController@getAllFeedback');
Route::get('/deleteFeedback/{id}', 'AdminController@deleteFeedback');
Route::post('/replyonFeedback/{email}', 'AdminController@replyonFeedback');
Route::get('/reply/{email}', 'AdminController@reply');
Route::get('/message/{id}', 'AdminController@readFeedback');