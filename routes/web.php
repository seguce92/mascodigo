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
Auth::routes();


Route::get('/', 'HomeController@index')->name('home');
Route::get('/skill/{skill}', 'HomeController@skill')->name('skill');
Route::get('/courses', 'HomeController@courses')->name('courses');
Route::get('/course/{course}', 'HomeController@course')->name('course');
Route::get('/course/{course}/lesson/{order}', 'HomeController@lesson')->name('lesson');
Route::get('/me/{author}', 'HomeController@me')->name('me');

Route::get('/blog', 'HomeController@blog')->name('blog');

Route::get('/category/{slug}', 'HomeController@category')->name('category');


Route::get('/forums', 'ForumController@index')->name('forums.index');
Route::get('/discussion/{slug}', 'ForumController@discussion')->name('forums.discussion');


Route::get('sergiocruzes.com', function () {
  abort(404);
});

Route::group(['middleware' => 'auth'], function () {
  Route::get('/home', 'HomeController@home')->name('home');
});

Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function () {

  Route::resource('users', 'Core\UserController')->except(['destroy']);
  Route::resource('roles', 'Core\RoleController');
  Route::resource('skills', 'Learn\SkillController');
  Route::resource('courses', 'Learn\CourseController');
  Route::resource('lessons', 'Learn\LessonController')->except(['create', 'edit']);

  Route::group(['prefix' => 'academic', 'namespace' => 'Learn'], function () {
    Route::get('/', 'AcademicController@index')->name('academic.index');
    Route::get('/courses', 'AcademicController@courses')->name('academic.courses');
    Route::get('/advance', 'AcademicController@advance')->name('academic.advance');
    Route::get('/favorites', 'AcademicController@favorites')->name('academic.favorite');
    Route::get('/completed', 'AcademicController@completed')->name('academic.completed');
    Route::get('/history', 'AcademicController@history')->name('academic.history');

    Route::get('/load/favorite/{id}', 'AcademicController@loadFavorite')->name('academic.load.favorite');
    Route::post('/store/favorite', 'AcademicController@storeFavorite')->name('academic.store.favorite');
    
    Route::get('/load/liked', 'AcademicController@loadLiked')->name('academic.load.liked');

    Route::post('/completed/store', 'AcademicController@storeCompleted')->name('academic.store.completed');
    Route::post('/history/store', 'AcademicController@storeHistory')->name('academic.store.completed');
  });

  Route::get('profile', 'Core\ProfileController@index')->name('profile');
  Route::post('profile/{user}', 'Core\ProfileController@store')->name('profile.store');
  Route::get('profile/password', 'Core\ProfileController@passwordIndex')->name('password.index');
  Route::post('profile/password/store', 'Core\ProfileController@passwordStore')->name('password.store');

  Route::group(['prefix' => 'media'], function () {
    Route::post('icon/course', 'Media\FileController@iconCourse')->name('file.icon');
    Route::post('icon/post', 'Media\FileController@coverPost')->name('file.post');
    Route::post('icon/user', 'Media\FileController@photoProfile')->name('file.user');
  });

  Route::resource('categories', 'Blog\CategoryController');
  Route::resource('posts', 'Blog\PostController');

});

Route::group(['prefix' => 'api/data'], function () {
  
  Route::post('search', 'Api\DataController@searchGlobal')->name('search');
  Route::post('search/post', 'Api\DataController@searchGlobalPost')->name('search.post');

});

Route::get('/{slug}', 'HomeController@post')->name('post');