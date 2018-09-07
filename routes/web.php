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

Route::group(['prefix'=>'moder'], function() {
    //Timer
    Route::post('/setTimer', 'ModersController@setTimer');
    Route::post('/stopTimer', 'ModersController@stopTimer');

    //Information about station
    Route::post('/setInfo', 'ModersController@setInfo');

    Route::post('/getEnigma', 'PlayersController@getEnigma');
});

Route::group(['prefix'=>'admin', 'middleware' => ['auth', 'admin']], function() {
    //Admin routes
    Route::post('/showTable','AdminController@showTable');
    Route::get('/addModer',function () {
        return view('Admin.addModer');
    });
    Route::post('/addModer','AdminController@addModer');
    Route::get('/addStation',function () {
        return view('Admin.addStation');
    });
    Route::post('/addStation','AdminController@addStation');
    Route::get('/addTeam',function () {
        return view('Admin.addTeam');
    });
    Route::post('/addTeam','AdminController@addTeam');
    Route::get('/moderList',function () {
        return view('Admin.moderList');
    });
    Route::get('/teamList',function () {
        return view('Admin.teamList');
    });
    Route::post('/addEnigma', 'AdminController@addEnigma');
    Route::get('/addEnigma',function () {
        return view('Admin.addEnigma');
    });
    Route::post('/addShtrafs', 'AdminController@addShtrafs');
    Route::get('/addShtrafs',function () {
        return view('Admin.addShtrafs');
    });
});