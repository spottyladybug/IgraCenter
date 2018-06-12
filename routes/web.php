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

// OAuth Routes for Moders
Route::get('login/vkontakte/moder', 'Auth\LoginModersController@redirectToProvider');
Route::get('login/vkontakte/callback/moder', 'Auth\LoginModersController@handleProviderCallback');

// OAuth Routes for Players
Route::get('login/vkontakte/players', 'Auth\LoginPlayersController@redirectToProvider');
Route::get('login/vkontakte/callback/players', 'Auth\LoginPlayersController@handleProviderCallback');