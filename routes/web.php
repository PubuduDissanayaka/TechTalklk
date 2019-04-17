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


Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});

Auth::routes();

Route::get('/dashboard', function () {
    return view('dashboard');
});

Route::get('/profile', function () {
    return view('users.profile');
});

Route::resource('blog-posts', 'BlogPostController');

Route::resource('cources', 'CourcesController');

Route::resource('catagories', 'CatagoryController');

Route::resource('events', 'EventController');

Route::resource('comments', 'blogCommentController');

Route::resource('friends', 'friendController');

Route::resource('messages', 'messageController');
