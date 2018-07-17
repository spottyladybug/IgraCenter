<?php

namespace App\Http\Controllers;

use App\User;
use App\Station;
use App\Team;
use App\Riddle;
use App\Route;
use DateTime;
use Illuminate\Http\Request;

class ModeratorController extends Controller
{
    public function index() {
        $station = Station::where('moderator', 35)->first();
        $riddle = Riddle::find( $station->id );
        $teams = Team::all();
        return view('moder.index')->with([
            'riddle' => $riddle,
            'station' => $station,
            'teams' => $teams,
        ]);
    }

    public function setArrival( Request $request, $station_id ) {
        $team_id = $request->get('team_id');
        $route = Route::all()->where('station_id', $station_id)->first();

        $route->arrival_time = new DateTime();
        $route->save();

        return redirect()->route('moder.setdeparture');
    }

    public function setDeparture() {
        $team_id = $request->get('team_id');
        $route = Route::all()->where('station_id', $station_id)->first();

        $route->departure_time = new DateTime();
        $route->save();

        return redirect()->route('moder.index');
    }
}
