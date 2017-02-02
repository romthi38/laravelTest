<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', 'PagesController@getHome')->name('home');

Route::get('/home', 'PagesController@getHome');
Route::get('user/add_link', 'UserAdminController@getAddLink')->name('link_add');
Route::post('user/add_link', 'UserAdminController@postAddLink')->name('link_add_post');

Route::get('user/add_game', 'UserAdminController@getAddGame')->name('game_add');
Route::post('user/add_game', 'UserAdminController@postAddGame')->name('game_add_post');

Route::get('/user/{user}', 'UserController@getProfile')->name('user_profile');

//Auth::routes();


// Authentication Routes...
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::get('logout', 'Auth\LoginController@logout')->name('logout');

// Registration Routes...
Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
Route::post('register', 'Auth\RegisterController@register');

// Password Reset Routes...
Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm');
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail');
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm');
Route::post('password/reset', 'Auth\ResetPasswordController@reset');

Route::get('/admin', 'AdminController@getHome')->name('admin');

Route::get('/add_new_game', 'GameAdminController@getAddGame')->name('game_add_new');
Route::post('/add_new_game', 'GameAdminController@postAddGame')->name('game_add_new_post');

Route::get('/games_list', 'PagesController@gamesList')->name('games_list');