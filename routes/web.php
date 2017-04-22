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
//redirecting to payment page
Route::get('/payment', 'PaymentController@index')->name('payment');

Route::get('/home', 'HomeController@index');
//Route::get('/home', 'HomeController@payment');
Route::get('/registerform', 'RegistrationController@registerform')->name('register-user');
Route::post('/registerform', 'RegistrationController@register_user')->name('register-new');


// call to Account Setting controller 
Route::get('/change-password', 'AccountSettingController@index')->name('change-password');
Route::post('/change-password', 'AccountSettingController@change_password')->name('change-password-setting');

//candidate controller
Route::get('/all-users', 'CandidateManagementController@all_users')->name('all-users');
//Route::get('/add-candidate', 'CandidateManagementController@addCandidateView')->name('add-candidate');

// add candidate controller
Route::get('/add-candidate', 'CandidateManagementController@listCandidate')->name('add-candidate');
Route::post('/add-candidate', 'CandidateManagementController@addCandidate')->name('add-candidate-new');

// delete candidate controller 
Route::get('/del-candidate/{id}','CandidateManagementController@delCandidate')->name('del-candidate');

//Route::get('/add-candidate/{id}','CandidateManagementController@editCandidate')->name('edit-candidate');

//edit controller 
Route::get('/edit-candidate/{id}','CandidateManagementController@showCandidate')->name('edit-candidate');
Route::post('/edit-candidate/{id}','CandidateManagementController@updateCandidate')->name('edit-candidate-new');












