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

//Profile
Route::get('/profile/{user}', 'ProfileController@show')->name('profile-show');

// Post
Route::get('/post/{post}', 'PostController@show')->name('post-show');
Route::post('/post', 'PostController@store')->name('post-store');
Route::get('/post/{post}/edit', 'PostController@edit')->name('post-edit')->middleware('can:edit,post');
Route::put('/post/{post}', 'PostController@update')->name('post-update')->middleware('can:update,post');
Route::delete('/post/{post}', 'PostController@destroy')->name('post-destroy')->middleware('can:destroy,post');

//Friends
Route::get('/friends', 'FriendshipController@show')->name('friends');
Route::get('/friends/pendent', 'FriendshipController@pendent');
Route::get('/friends/request', 'FriendshipController@request');
Route::get('/friends/search/{query}', 'FriendshipController@search');

//Friendship
Route::post('/friendship', 'FriendshipController@store');
Route::patch('/friendship', 'FriendshipController@update');
Route::delete('/friendship', 'FriendshipController@destroy');
