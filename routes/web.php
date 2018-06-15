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
Route::get('/main', function () {
    return view('main');
});

// OAuth Routes
Route::get('login/vkontakte', 'Auth\LoginController@redirectToProvider');
Route::get('/', 'Auth\LoginController@handleProviderCallback');

//Timer
Route::post('/setTimer', 'ModersController@setTimer');
Route::post('/stopTimer', 'ModersController@stopTimer');

//Information about station
Route::post('/setInfo', 'ModersController@setInfo');

Route::post('/getEnigma', 'PlayersController@getEnigma');