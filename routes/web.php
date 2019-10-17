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

//Auth::routes();

Route::get('/', 'TutorsController@index');

Route::get('/tutors/create', 'TutorsController@create');
Route::post('/tutors', 'TutorsController@store');
Route::get('/tutor'.'/{id}', 'TutorsController@show')->name('tutor');
Route::get('/tutors/search', 'TutorsController@search');

Route::get('/home', 'HomeController@index');

Route::get('/searchSubjects', 'SearchController@searchSubjects');

Route::get('/search', 'SearchController@users');

Route::resource('/users', 'UsersController', ['except' => ['index', 'create', 'store', 'destroy']]);
Route::get('/user-avatar/{id}/{size}', 'ImagesController@user_avatar');
Route::get('/users/{user}/friends', 'FriendsController@index');

Route::get('/students', 'StudentsController@index');
Route::get('/students/{id}', 'StudentsController@show');

Route::post('/friends/{friend}', 'FriendsController@add');
Route::patch('/friends/{friend}', 'FriendsController@accept');
Route::delete('/friends/{friend}', 'FriendsController@destroy');

Route::resource('/posts', 'PostsController', ['except' => ['index', 'create']]);

Route::get('/wall', 'WallsController@index');

Route::get('/films', 'FilmsController@index');
Route::get('/films/create', 'FilmsController@create');
Route::get('/films/{id}', 'FilmsController@show');
Route::post('/films/', 'FilmsController@store');

Route::resource('/comments', 'CommentsController', ['except' => ['index', 'create', 'show']]);

Route::post('/likes', 'LikesController@add');
Route::delete('/likes', 'LikesController@destroy');

Route::get('/notifications', 'NotificationsController@index');
Route::patch('/notifications/{notification}', 'NotificationsController@update');

Route::get('/specializations', 'SpecializationController@index');
Route::get('/specializations/create', 'SpecializationController@create');
Route::post('/specializations/', 'SpecializationController@store');
Route::post('/specializations/edit', 'SpecializationController@editStore');
//Route::post('/specializations_tutor', 'SpecializationController@specializations_tutor');

Route::get('/visits/create', 'VisitsController@create');
Route::post('/visits', 'VisitsController@store');

Route::get('/visits', 'VisitsController@index');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
