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


//Index
Route::get('/', 'IndexController@show')->name('index');

//Registration
Route::get('/register', 'Auth\RegistrationController@show');
Route::post('/register', 'Auth\RegistrationController@store')->name('register');
Route::get('/verify/{token}', 'VerificationController@verify')->name('verify');

//Session
Route::get('/login', 'Auth\SessionController@show');
Route::post('/login', 'Auth\SessionController@store')->name('login');
Route::get('/logout', 'Auth\SessionController@destroy')->name('logout');

//Password Reset
Route::prefix('password')->group(function () {
    Route::get('reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
    Route::post('reset', 'Auth\ResetPasswordController@reset');
    Route::get('reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
    Route::post('email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
});

//Home
Route::get('/home', 'HomeController@index')->name('home');

//Users Search
Route::get('/search', 'SearchController@index')->name('users-search');

//Profile
Route::prefix('profile')->group(function () {
    Route::get('{user}', 'ProfileController@show')->name('profile-show');
    Route::get('{user}/edit', 'ProfileController@edit');
    Route::put('{user}/info', 'ProfileController@update')->name('profile-update')->middleware('can:editProfile,user');
    Route::put('{user}/image', 'ProfileController@updateImage')->name('profile-image-update')->middleware('can:editProfile,user');
    Route::get('{user}/friends', 'FriendController@index')->name('friends-index');
});

//Post
Route::prefix('post')->group(function () {
    Route::post('', 'PostController@store')->name('post-store');
    Route::get('{post}', 'PostController@show')->name('post-show');
    Route::put('{post}', 'PostController@update')->name('post-update')->middleware('can:updatePost,post');
    Route::delete('{post}', 'PostController@destroy')->name('post-destroy')->middleware('can:destroyPost,post');
    Route::get('{post}/edit', 'PostController@edit')->name('post-edit')->middleware('can:editPost,post');
});

//Comments
Route::prefix('comments')->group(function () {
    Route::post('', 'CommentController@store');
    Route::get('{comment}/edit', 'CommentController@edit');
    Route::put('{comment}', 'CommentController@update');
    Route::delete('{comment}', 'CommentController@destroy');
});

//Friends
Route::prefix('friends')->group(function () {
    Route::get('pendent', 'FriendController@pendent');
    Route::get('request', 'FriendController@request');
});

//Friendship
Route::prefix('friendship')->group(function () {
    Route::post('', 'FriendshipController@store')->name('friendship-store');
    Route::put('', 'FriendshipController@update')->name('friendship-update');
    Route::delete('', 'FriendshipController@destroy')->name('friendship-delete');
});

//API
Route::prefix('api')->group(function () {
    Route::get('notifications/friendship', 'ApiController@getFriendshipNotifications');
    Route::get('notifications/friendship/count', 'ApiController@getFriendshipNotificationsCount');
    Route::get('notifications/general', 'ApiController@getGeneralNotifications');
    Route::get('notifications/general/count', 'ApiController@getGeneralNotificationsCount');
    Route::post('like', 'ApiController@like')->name('post-like');
    Route::delete('like', 'ApiController@unlike')->name('post-unlike');
    Route::get('post/likes', 'ApiController@getPostLikes');
    Route::get('posts/home', 'ApiController@getHomePosts');
    Route::get('posts/profile', 'ApiController@getProfilePosts');
    Route::get('comments', 'ApiController@getPostComments');
});
