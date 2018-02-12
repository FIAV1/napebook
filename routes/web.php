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

// Registration
Route::get('/register', 'Auth\RegistrationController@show');
Route::post('/register', 'Auth\RegistrationController@store')->name('register');
Route::get('/verify/{token}', 'VerificationController@verify')->name('verify');

// Session
Route::get('/login', 'Auth\SessionController@show');
Route::post('/login', 'Auth\SessionController@store')->name('login');
Route::get('/logout', 'Auth\SessionController@destroy')->name('logout');

// Password Reset
Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
Route::post('password/reset', 'Auth\ResetPasswordController@reset');

// Index
Route::get('/', 'IndexController@show')->name('index');

// Home
Route::get('/home', 'HomeController@index')->name('home');

Route::get('/api/posts/home/load', 'HomeController@loadHomePosts');
Route::get('/api/posts/profile/load', 'ProfileController@loadProfilePosts');

//Like API
Route::get('/post/likes', 'PostController@postLikes');
Route::post('/like', 'PostController@like')->name('post-like');
Route::delete('/like', 'PostController@unlike')->name('post-unlike');

// Post
Route::get('/post/{post}', 'PostController@show')->name('post-show');
Route::get('/post/{post}/edit', 'PostController@edit')->name('post-edit')->middleware('can:editPost,post');
Route::post('/post', 'PostController@store')->name('post-store');
Route::put('/post/{post}', 'PostController@update')->name('post-update')->middleware('can:updatePost,post');
Route::delete('/post/{post}', 'PostController@destroy')->name('post-destroy')->middleware('can:destroyPost,post');

// Friends
Route::get('/friends/pendent', 'FriendController@pendent');
Route::get('/friends/request', 'FriendController@request');
Route::get('/friends/search/{query}', 'FriendController@search')->name('friends-search');

// Friendship
Route::post('/friendship', 'FriendshipController@store')->name('friendship-store');
Route::put('/friendship', 'FriendshipController@update')->name('friendship-update');
Route::delete('/friendship', 'FriendshipController@destroy')->name('friendship-delete');

// Profile
Route::get('/profile/{user}', 'ProfileController@show')->name('profile-show');
Route::get('/profile/{user}/edit', 'ProfileController@edit');
Route::put('/profile/{user}/info', 'ProfileController@update')->name('profile-update')->middleware('can:editProfile,user');
Route::put('/profile/{user}/image', 'ProfileController@updateImage')->name('profile-image-update')->middleware('can:editProfile,user');
Route::get('/profile/{user}/friends', 'FriendController@index')->name('friends-index');

<<<<<<< HEAD
//Users Search
Route::get('/search', 'SearchController@index')->name('users-search');

// Comment
Route::post('/comments', 'CommentController@store');
Route::get('/comments/{comment}/edit', 'CommentController@edit');
Route::put('/comments/{comment}', 'CommentController@update');
Route::delete('/comments/{comment}', 'CommentController@destroy');
=======
//API
Route::get('/api/notifications/friendship', 'ApiController@friendshipNotifications');
Route::get('/api/notifications/friendship/count', 'ApiController@friendshipNotificationsCount');
Route::get('/api/notifications/general', 'ApiController@generalNotifications');
Route::get('/api/notifications/general/count', 'ApiController@generalNotificationsCount');
>>>>>>> Implementate le notifiche su una base di test. Andranno integrate quando tutto il complesso sarà pronto.
