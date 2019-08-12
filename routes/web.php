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
Route::get('/category/{category}', 'HomeController@category')->name('category');
Route::get('/courses', 'HomeController@courses')->name('courses');
Route::get('/course/{course}', 'HomeController@course')->name('course');
Route::get('/me/{author}', 'HomeController@me')->name('me');

Auth::routes();

Route::get('/home', 'HomeController@index');
