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

Route::get('/signup', function () {
    return view('auth.signup');
})->name('signup');

Route::get('/login',function ()
{
   return view('auth.login');
})->name('login');
Route::post('/login','LoginController@login')->name('log-in');


Route::get('/dashboard', function () {
    return view('dashboard');
});

Route::post('/profile','SignupController@signup')->name('sign-up');


Route::post('/logout','LoginController@logout');


Route::resource('patient','PatientController');
Route::get('online','EmergencyController@emergency');
Route::get('emergency','EmergencyController@requestshow');
Route::post('emergency/{id}','EmergencyController@requestaccept');
Route::post('online','EmergencyController@request')->name('add-emergency');

Route::post('patient','PatientController@store')->name('add-patient');

Route::resource('doctor','DoctorController');
Route::post('doctor','DoctorController@store')->name('add-doctor');

Route::resource('report','ReportController');
Route::post('report','ReportController@store')->name('add-report');

Route::get('/alldoctors','DoctorController@adminshowall');
Route::get('/alldoctors/{id}','DoctorController@adminshowone');
Route::get('/allpatients','PatientController@adminshowall');
Route::get('/allpatients/{id}','PatientController@adminshowone');

Route::resource('work','WorkController');
Route::post('work','WorkController@store')->name('add-work');

Route::resource('appointment','AppointmentController');
Route::post('appointment','AppointmentController@store')->name('add-appointment');
Route::get('myappointment','AppointmentController@showall');
Route::post('myappointment/{id}','AppointmentController@accept');
//Route::post('myappointment-r/{id}','AppointmentController@reject');

Route::get('/ajax/{id}', 'AjaxController@ajax');

//
Route::resource('field','FieldController');
Route::post('field','FieldController@store')->name('add-field');


Route::resource('approved','ApprovedController');


