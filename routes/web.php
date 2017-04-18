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

Route::get('/home', 'HomeController@index');
//Route::get('/home', 'HomeController@payment');
Route::get('/registerform', 'RegistrationController@registerform')->name('register-user');
Route::post('/registerform', 'RegistrationController@register_user')->name('register-new');


// call to Account Setting controller 
Route::get('/change-password', 'AccountSettingController@index')->name('change-password');
Route::post('/change-password', 'AccountSettingController@change_password')->name('change-password-setting');


