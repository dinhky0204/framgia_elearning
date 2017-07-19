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
