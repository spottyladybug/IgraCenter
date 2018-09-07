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
});

    Route::group(['prefix'=>'player'], function() {
    Route::post('/getEnigma', 'PlayersController@getEnigma');
});

Route::group(['prefix'=>'admin', 'middleware' => ['auth']], function() {
    //Admin routes
    Route::post('/showTable','AdminController@showTable');
    Route::post('/addModer',function () {
        return view('Admin.addModer');
    });
    Route::post('/addNewModer','AdminController@addModer');
    Route::post('/addStation',function () {
        return view('Admin.addStation');
    });
    Route::post('/addNewStation','AdminController@addStation');
    Route::post('/addTeam',function () {
        return view('Admin.addTeam');
    });
    Route::post('/addNewTeam','AdminController@addTeam');
    Route::post('/moderList',function () {
        return view('Admin.moderList');
    });
    Route::post('/teamList',function () {
        return view('Admin.teamList');
    });
    Route::post('/addNewEnigma', 'AdminController@addEnigma');
    Route::post('/addEnigma',function () {
        return view('Admin.addEnigma');
    });
    Route::post('/addNewShtrafs', 'AdminController@addShtrafs');
    Route::post('/addShtrafs',function () {
        return view('Admin.addShtrafs');
    });
});