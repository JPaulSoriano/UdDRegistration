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

Auth::routes(['register' => false]);

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/fyear', 'HomeController@fyear')->name('fyear');
Route::get('/rtoday', 'HomeController@rtoday')->name('rtoday');
Route::get('/total', 'HomeController@total')->name('total');
Route::get('/verified', 'HomeController@verified')->name('verified');
Route::get('/admission', 'HomeController@admission')->name('admission');
Route::get('/enrollment', 'HomeController@enrollment')->name('enrollment');
Route::get('/screenshot', 'HomeController@screenshot')->name('screenshot');

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

Route::put('/update-or/{registration}', 'RegistrationController@updateOrNo')->name('registrations.update.or');
Route::put('/update-stud-no/{registration}', 'RegistrationController@updateStudentNo')->name('registrations.student.no');
Route::put('/temp-stud-no/{registration}', 'RegistrationController@tempStudentNo')->name('registrations.tempstudent.no');

Route::resource('registrations','RegistrationController');



Route::get('/view-attach', function(){
    return response()->file(public_path('attachments/attachment.pdf'));
});

Route::get('/status', 'StatusController@status')->name('status');
