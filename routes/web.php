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

// Home
Route::get('/home', 'HomeController@index')->name('home');

// Registration
Route::get('/register', 'Auth\RegistrationController@show');
Route::post('/register', 'Auth\RegistrationController@store')->name('register');
Route::get('/verify', 'VerificationController@verify')->name('verify');

// Session
Route::get('/login', 'Auth\SessionController@show');
Route::post('/login', 'Auth\SessionController@create')->name('login');
Route::get('/logout', 'Auth\SessionController@destroy')->name('logout');

// Post
Route::post('/post', 'PostController@store');
Route::get('/post', 'HomeController@index');
Route::get('/post/{id}', 'PostController@show')->name('post');
Route::patch('/post/{id}/modify', 'PostController@update');
