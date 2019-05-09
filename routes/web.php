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

Auth::routes(['verify' => true]);

Route::get('/', function () {
    return view('welcome');
});

// Route::get('/map', function () {
//     return view('events.testmap');
// });

// Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});

// Auth::routes();


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

Route::post('notification/get', 'NotificationController@get');

Route::resource('comments', 'blogCommentController');

Route::resource('friends', 'friendController');

Route::get('/chat/{id}', 'ChatController@show')->middleware('auth')->name('chat.show');

Route::get('/chat', 'ChatController@index')->middleware('auth')->name('chat.index');

Route::post('/chat/getChat/{id}', 'ChatController@getChat')->middleware('auth');

Route::post('/chat/sendChat', 'ChatController@sendChat')->middleware('auth');


Route::resource('jobs', 'JobsController');

Route::resource('news-feed', 'NewsFeedController');

Route::resource('eventcomments', 'EventCommentController');

Route::resource('register-user', 'RegController');

Route::get('/verification/{token}' , 'RegController@verification');


