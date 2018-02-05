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

// Index
Route::get('/', 'IndexController@show')->name('index');

// Registration
Route::get('/register', 'Auth\RegistrationController@show');
Route::post('/register', 'Auth\RegistrationController@store')->name('register');
Route::get('/verify', 'VerificationController@verify')->name('verify');

// Session
Route::get('/login', 'Auth\SessionController@show');
Route::post('/login', 'Auth\SessionController@store')->name('login');
Route::get('/logout', 'Auth\SessionController@destroy')->name('logout');

// Home
Route::get('/home', 'HomeController@index')->name('home');

// Post
Route::get('/post/{post}', 'PostController@show')->name('post-show');

Route::post('/post', 'PostController@store')->name('post-store');

Route::get('/post/{post}/edit', 'PostController@edit')->name('post-edit')->middleware('can:edit,post');
Route::put('/post/{post}', 'PostController@update')->name('post-update')->middleware('can:update,post');

Route::delete('/post/{post}', 'PostController@destroy')->name('post-destroy')->middleware('can:destroy,post');
