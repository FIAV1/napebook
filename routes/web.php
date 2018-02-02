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

Route::get('/', 'IndexController@show')->name('index');

//Auth::routes();
Route::get('/register', 'Auth\RegistrationController@show');
Route::post('/register', 'Auth\RegistrationController@store')->name('register');

Route::get('/login', 'Auth\SessionController@show');
Route::post('/login', 'Auth\SessionController@create')->name('login');
Route::get('/logout', 'Auth\SessionController@destroy')->name('logout');

Route::get('/home', 'HomeController@show')->name('home');

Route::get('/verify', 'VerificationController@verify')->name('verify');

