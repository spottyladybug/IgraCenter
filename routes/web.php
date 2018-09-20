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
Route::get('login/vkontakte', 'Auth\LoginController@redirectToProvider')->name('app.login');
Route::get('/', 'Auth\LoginController@handleProviderCallback')->name('app.main');

Route::group(['prefix'=>'player', 'middleware' => ['auth', 'Player']], function() {
    Route::get('/', function() {
        return view('Players.player');
    })->name('players.home');
});

Route::group(['prefix'=>'moder', 'middleware' => ['auth', 'Moder']], function() {
    Route::get('/{user}', 'ModersController@moderHome')->name('moder.home');
    //Timer
    Route::post('/setTimer', 'ModersController@setTimer')->name('moder.settimer');
    Route::post('/stopTimer', 'ModersController@stopTimer')->name('moder.stoptimer');

    //Information about station
    Route::post('/setInfo', 'ModersController@setInfo');
});

    Route::group(['prefix'=>'player'], function() {
    Route::post('/getEnigma', 'PlayersController@getEnigma');
});

Route::group(['prefix'=>'admin', 'middleware' => ['auth', 'Admin']], function() {
    //Admin routes
    Route::get('/', function() {
        return view('admin.admin');
    })->name('admin.home');
    Route::get('/showTable','AdminController@showTable')->name('admin.table');
    Route::get('/editTable/{id}','AdminController@editTable')->name('admin.edittable');
    Route::patch('/updateTable/{id}','AdminController@updateTable')->name('admin.updatetable');
    Route::get('/addModer',function () {
        return view('admin.addModer');
    })->name('admin.addmoder');
    Route::post('/addNewModer','AdminController@addModer')->name('admin.addnewmoder');
    Route::get('/addStation',function () {
        return view('admin.addStation');
    })->name('admin.addstation');
    Route::post('/addNewStation','AdminController@addStation')->name('admin.addnewstation');
    Route::get('/addTeam',function () {
        return view('admin.addTeam');
    })->name('admin.addteam');
    Route::post('/addNewTeam','AdminController@addTeam')->name('admin.addnewteam');
    Route::get('/moderList',function () {
        return view('admin.moderList');
    })->name('admin.moderlist');
    Route::get('/teamList',function () {
        return view('admin.teamList');
    })->name('admin.teamlist');
    Route::post('/addNewEnigma', 'AdminController@addEnigma')->name('admin.addnewenigma');
    Route::get('/addEnigma',function () {
        return view('admin.addEnigma');
    })->name('admin.addenigma');
    Route::post('/addNewShtrafs', 'AdminController@addShtrafs')->name('admin.addnewshtrafs');
    Route::get('/addShtrafs',function () {
        return view('admin.addShtrafs');
    })->name('admin.addshtrafs');
    Route::get('/startGame', 'AdminController@startGame')->name('admin.startgame');
    Route::get('/stopGame', 'AdminController@stopGame')->name('admin.stopgame');
//    Route::post('/editTable', 'AdminController@editTable');
    Route::get('/moderInfo/{id}', 'AdminController@getModerInfo')->name('admin.moderinfo');
    Route::post('/changeComment', 'AdminController@changeComment')->name('admin.changecomment');
    Route::get('/commandInfo/{id}',function ($id) {
        return view('Admin.commandInfo', ['id' => $id]);
    })->name('admin.commandinfo');
});