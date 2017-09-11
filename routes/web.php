<?php

use App\Events\MessageSent;

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Auth::routes();

Route::post('/home', 'HomeController@notification');
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/users/confirmation/{token}', 'Auth\RegisterController@confirmation')->name('confirmation');
Route::post('/login', 'Auth\LoginController@login')->name('login');
Route::get('/logout', 'Auth\LoginController@logout')->name('logout');
Route::get('/confirm/resetpass/{token}', 'Auth\ResetPasswordController@resetPasswordConfirm')->name('confirmresetpass');
Route::get('/passwordreset', 'Auth\ResetPasswordController@index')->name('resetpassword');
Route::post('/passwordreset/sendmail', 'Auth\ResetPasswordController@sendmailToReset')->name('sendmailToReset');
Route::get('/profile', 'Auth\ProfileController@showProfile')->name('show_profile');
Route::get('/profile/edit', 'Auth\ProfileController@editProfile')->name('edit_profile');
Route::post('/profile/save', 'Auth\ProfileController@saveProfile')->name('profile-save');
Route::get('/user/{user_id}', 'Auth\ProfileController@showUser')->name('show-user');
Route::post('/user/{user_id}', 'Auth\ProfileController@followUser');
Route::delete('/user/{user_id}', 'Auth\ProfileController@unfollowUser');
Route::get('/post/{post_id}', 'Auth\PostController@showPost')->name('user_show_post');

Route::get('/admin/homepage', 'Admin\HomePageController@homepage')->name('admin_homepage');
Route::get('/admin/overview', 'Admin\OverViewController@overview')->name('admin_overview');

Route::get('/admin/subjects','Admin\SubjectController@getSubjects')->name('admin_subjects');
Route::put('/admin/subjects', 'Admin\SubjectController@editSubject')->name('admin_edit_subject');
Route::delete('/admin/subjects/{id}','Admin\SubjectController@deleteSubject')->name('admin_delete_subject');
Route::post('/admin/subjects', 'Admin\SubjectController@createSubject')->name('admin_create_subject');

Route::get('/admin/courses','Admin\CourseController@getCourses')->name('admin_courses');
Route::delete('/admin/courses/{id}','Admin\CourseController@deleteCourse')->name('admin_delete_course');
Route::get('/admin/course/{course_id}', 'Admin\CourseController@viewCourse')->name('admin_show_course');
Route::put('/admin/courses', 'Admin\CourseController@editCourse')->name('admin_edit_course');
Route::post('/admin/courses', 'Admin\CourseController@createCourse')->name('admin_create_course');

Route::get('/admin/users', 'Admin\UserController@getUsers')->name('admin_users');
Route::delete('/admin/users/{id}','Admin\UserController@deleteUser');
Route::get('/course/{course_id}', 'Auth\CourseController@showCourse')->name('course_user');
Route::get('/follow_course', 'Auth\CourseController@listfollowCourses')->name('list_follow_course');
Route::post('/course/{course_id}/test', 'Auth\CourseController@testCourse');
Route::get('/course/{course_id}/learn', 'Auth\CourseController@learnCourse')->name('learn_course');
Route::get('/course/{course_id}/test', 'Auth\CourseController@testCourse')->name('test_course');
Route::get('list_course/{subject_id}', 'Auth\CourseController@listCourse')->name('list_course');
Route::post('list_course/{subject_id}/follow', 'Auth\CourseController@followCourse')->name('follow_course');
Route::post('list_course/{subject_id}', 'Auth\CourseController@unfollowCourse')->name('unfollow_course');

Route::get('/admin/questions', 'Admin\QuestionController@index')->name('admin_questions');
Route::get('/admin/questions/{question_id}', 'Admin\QuestionController@editQuestion')->name('admin_edit_question');
Route::delete('/admin/questions/{question_id}','Admin\QuestionController@deleteQuestion')->name('admin_delete_Question');
Route::post('/admin/question/{question_id}/edit', 'Admin\QuestionController@checkeditQuestion')->name('admin_edit_question_check');
Route::post('/admin/question/{question_id}', 'Admin\QuestionController@createAnswer')->name('admin_create_answer');
Route::get('/admin/create_questions', 'Admin\QuestionController@createQuestion')->name('admin_create_question');
Route::post('/admin/create_questions', 'Admin\QuestionController@checkCreateQuestion')->name('check_create_question');

Route::get('/admin/show_post', 'Admin\PostController@index')->name('admin_show_posts');
Route::get('/admin/create_post', 'Admin\PostController@createPost')->name('admin_create_posts');
Route::post('/admin/create_post/save', 'Admin\PostController@savePost')->name('admin_save_posts');

Route::get('/admin/login', 'Admin\LoginController@index');
Route::post('/admin/login', 'Admin\LoginController@login')->name('admin_login');
Route::get('/admin/logout', 'Admin\LoginController@adminLogout')->name('admin_logout');

Route::post('/createComments/{post_id}', 'Auth\CommentController@store');
Route::get('/comment/{comment_id}', 'Auth\CommentController@getComment');
Route::post('/editComment/{comment_id}', 'Auth\CommentController@editComment');
Route::delete('/deleteComment/{comment_id}', 'Auth\CommentController@deleteComment');
Route::get('/getcomments/{post_id}', 'Auth\CommentController@index');
Route::get('/list_post/{course_id}', 'Auth\PostController@postOfCourse')->name('posts_of_course');
Route::get('/post/{post_id}', 'Auth\PostController@showPost');