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

Route::get('/', 'HomeController@index')->name('home');
Route::get('/skill/{skill}', 'HomeController@skill')->name('skill');
Route::get('/courses', 'HomeController@courses')->name('courses');
Route::get('/course/{course}', 'HomeController@course')->name('course');
Route::get('/course/{course}/lesson/{order}', 'HomeController@lesson')->name('lesson');
Route::get('/me/{author}', 'HomeController@me')->name('me');

Auth::routes();

Route::get('/home', 'HomeController@home')->name('home');

Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function () {

  Route::resource('users', 'Core\UserController');
  Route::resource('skills', 'Learn\SkillController');
  Route::resource('courses', 'Learn\CourseController');
  Route::resource('lessons', 'Learn\LessonController')->except(['create', 'edit']);

  Route::group(['prefix' => 'media'], function () {
    Route::post('icon/course', 'Media\FileController@iconCourse')->name('file.icon');
    Route::post('icon/post', 'Media\FileController@coverPost')->name('file.icon');
  });
});

Route::group(['prefix' => 'api/data'], function () {
  Route::post('search', 'Api\DataController@searchGlobal')->name('search');
});