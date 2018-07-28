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
// Route::get('/', function ( Request $request ) {
//     if( request( 'code' ) ) {
//         // return request( 'code' );
//         Route::get('/', 'Auth\LoginController@handleProviderCallback');
//     } else {
//         return view('main');
//     }
// });

// OAuth Routes
// Route::get('/', 'Auth\LoginController@handleProviderCallback');
// Route::get('login/vkontakte', 'Auth\LoginController@redirectToProvider');
Route::get('/', 'Auth\LoginController@handleProviderCallback');
Route::get('login/vkontakte', 'Auth\LoginController@redirectToProvider');

//Timer
Route::post('/setTimer', 'ModersController@setTimer');
Route::post('/stopTimer', 'ModersController@stopTimer');

//Information about station
Route::post('/setInfo', 'ModersController@setInfo');
Route::post('/getEnigma', 'PlayersController@getEnigma');
Route::post('/showTable','AdminController@showTable');

// Public routes
// Route::get('/players', 'TeamController@viewPlayers');
Route::get('/teams', 'TeamController@index');
Route::get('/routes_log', 'RouteController@routesLog');
Route::get('/routes_log/{team_id}', 'RouteController@routesLog');

// Admin routes
Route::group(['prefix'=>'admin', 'middleware' => ['auth', 'admin']], function() {
    
    Route::get('/', function() {
        var_dump( Auth::user()->user_group == 0 );
        // echo Auth::user()->isModer;
        return 'admin main';
    });

    Route::resource('/route', 'RouteController');
    Route::resource('/team', 'TeamController');
    Route::resource('/riddle', 'RiddleController');
    Route::resource('/station', 'StationController');
});

// Moder routes
Route::group(['prefix'=>'moder', 'middleware' => ['auth', 'moder']], function() {
    Route::get('/', 'ModeratorController@index')->name('moder.index');
    Route::patch('/setArrival/{station_id}', 'ModeratorController@setArrival')->name('moder.setarrival');
    Route::patch('/setDeparture/{team}', 'ModeratorController@setDeparture')->name('moder.setdeparture');
});

// Teams routes