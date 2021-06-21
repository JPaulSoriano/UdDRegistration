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

Route::get('/process', function () {
    return view('process');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware' => ['auth']], function() {
    Route::resource('roles','RoleController');
    Route::resource('users','UserController');
    Route::resource('departments','DepartmentController');
    Route::resource('courses','CourseController');
});

Route::delete('/unverify/{registration}', 'RegistrationController@unverify')->name('registrations.unverify');
Route::get('/verify/{registration}', 'RegistrationController@verify')->name('registrations.verify');

Route::delete('/unadmit/{registration}', 'RegistrationController@unadmit')->name('registrations.unadmit');
Route::get('/admit/{registration}', 'RegistrationController@admit')->name('registrations.admit');

Route::delete('/unenroll/{registration}', 'RegistrationController@unenroll')->name('registrations.unenroll');
Route::get('/enroll/{registration}', 'RegistrationController@enroll')->name('registrations.enroll');

Route::resource('registrations','RegistrationController');



Route::get('/status', 'StatusController@status')->name('status');
