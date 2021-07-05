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

//-----------------------------------ADMIN--Routes-----------------------------//

Auth::routes();
Route::post('/login', 'Auth\LoginController@loginAdmin')->name('loginAdmin');
Route::group(['middleware', 'Admin'], function () {

    Route::get('/deleteAdmin/{id}', 'AdminController@deleteAdmin');
    Route::get('/getAdminDetails/{id}', 'AdminController@getAdminDetails');
    Route::get('/adminprofile/{id}', 'AdminController@getAdminDetails');
    Route::post('/updateAdmin/{id}', 'AdminController@updateAdminUser');
    Route::post('/addAdminUser', 'AdminController@addAdminUser')->name('addAdminUser');
    Route::get('/admins', 'AdminController@getAllAdmin');
    
    });
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/', 'HomeController@index');
Route::get('/addAdmin', 'AdminController@addAdmin');
Route::post('/addAdmin', 'AdminController@addAdminUser')->name('addAdmin');

//-----------------------------------USER--Routes-----------------------------//

Route::get('/users', 'userController@getAllUsers');
Route::get('/userDetails/{id}', 'userController@getUserDetails');
Route::get('/disableEnableUser/{id}', 'userController@disableEnableUser');
Route::get('/deleteUser/{id}', 'userController@deleteUser');
Route::get('/medicalRays/{id}/{check}', 'userController@getUserMedicalRecord');
Route::get('/userMedicalRaysDetails/{id}/{check}', 'userController@getUserMedicalRecordDetails');
Route::get('/medicalReports/{id}/{check}', 'userController@getUserMedicalRecord');
Route::get('/userMedicalReportsDetails/{id}/{check}', 'userController@getUserMedicalRecordDetails');
Route::get('/deleteUserMedicalRecord/{id}/{check}', 'userController@deleteUserMedicalRecord');

//-----------------------------------places--Routes-----------------------------//

Route::get('/places', 'placesController@getAllPlaces')->name('places');
Route::get('/deletePlace/{id}', 'placesController@deletePlace');
Route::get('/viewPlace/{id}', 'placesController@getPlace');
Route::post('/updatePlaces/{id}', 'placesController@updatePlaces');
Route::post('/addPlace', 'placesController@addPlace');

//-----------------------------------Feedback--Routes-----------------------------//

Route::get('/feedback', 'feedbackController@getAllFeedback');
Route::get('/deleteFeedback/{id}', 'feedbackController@deleteFeedback');
Route::post('/replyonFeedback/{email}', 'feedbackController@replyonFeedback');
Route::get('/reply/{email}', 'feedbackController@reply');
Route::get('/message/{id}', 'feedbackController@readFeedback');