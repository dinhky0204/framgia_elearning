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
Route::get('/users/confirmation/{token}', 'Auth\RegisterController@confirmation')->name('confirmation');
Route::post('/login', 'Auth\LoginController@login')->name('login');
Route::get('/logout', 'Auth\LoginController@logout')->name('logout');
Route::get('/confirm/resetpass/{token}', 'Auth\ResetPasswordController@resetPasswordConfirm')->name('confirmresetpass');
Route::get('/passwordreset', 'Auth\ResetPasswordController@reset')->name('resetpassword');
Route::post('/passwordreset/sendmail', 'Auth\ResetPasswordController@sendmailToReset')->name('sendmailToReset');
Route::get('/profile', 'Auth\ProfileController@showProfile')->name('show_profile');
Route::get('/profile/edit', 'Auth\ProfileController@editProfile')->name('edit_profile');
Route::post('/profile/save', 'Auth\ProfileController@saveProfile')->name('profile-save');


Route::get('/admin/homepage', 'HomePageController@homepage')->name('admin_homepage');
Route::get('/admin/overview', 'OverViewController@overview')->name('admin_overview');
Route::get('/admin/homepage', 'HomePageController@homepage')->name('admin_homepage');
Route::get('/admin/overview', 'OverViewController@overview')->name('admin_overview');
Route::get('/admin/courses','CourseController@getCourses')->name('admin_courses');
Route::delete('/admin/courses/{id}','CourseController@deleteCourse')->name('admin_delete_course');
Route::get('/admin/users', 'UserController@getUsers')->name('admin_users');
Route::delete('/admin/users/{id}','UserController@deleteUser');
