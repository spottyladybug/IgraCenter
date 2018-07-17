<?php

namespace App\Http\Controllers;

use App\Route;
use App\Team;
use App\Station;
use Illuminate\Http\Request;

class RouteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $teams = Team::all();
        $teams_ids = array();
        foreach( $teams as $team ) {
            $count = count(Route::all()->where('team_id', $team->id));
            if( $count != 0) {
                $teams_ids[] = $team->id;
            }
        }

        // var_dump($teams_ids);

        if( count($teams_ids) != 0 ) {
            $teams = Team::find($teams_ids);
        } else {
            $teams = [];
        }

        return view('route.index')->with([
            'teams' => $teams,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('route.create')->with([
            'teams' => Team::all(),
            'stations' => Station::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $stations_order = $request->get('route');
        foreach($stations_order as $station => $order) {
            $route['team_id'] = $request->get('team_id');
            $route['station_id'] = $station;
            $route['station_order'] = $order;
            $route['status'] = null;
            $route['arrival_time'] = null;
            $route['departute_time'] = null;

            Route::create($route);
        }
        // var_dump( $request->all() );
        return redirect()->route('route.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Route  $route
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $routes = Route::all()->where('team_id', $id);
        $stations = Station::all();
        $team = Team::find($id);

        return view('route.show')->with([
            'routes' => $routes,
            'stations' => $stations,
            'team' => $team
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Route  $route
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $route = Route::all()->where('team_id', $id);
        $stations = Station::all();

        return view( 'route.edit' )->with([
            'routes' => $route,
            'stations' => $stations,
            'team' => Team::find($id)
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Route  $route
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $routes = Route::all()->where('team_id', $id);
        
        $stations_order = $request->get('route');
        foreach( $routes as $route ) {
            foreach($stations_order as $station => $order) {
                if( $route->station_id == $station ) {
                    $upd_route['station_id'] = $station;
                    $upd_route['station_order'] = $order;
        
                    $route->station_order = $order;
                    $route->save(); 
                }
            }
        }

        return redirect()->route('route.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Route  $route
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $routes = Route::all()->where('team_id', $id);
        foreach( $routes as $route ) {
            $route->delete();
        }

        return redirect()->route('route.index');
    }

    public function routesLog($team_id = null)
    {
        switch($team_id) {
            case null :
                $teams = Team::all();
                $stations = Station::all();
                $routes = Route::all();

                return view('routes_log')->with([
                    'routes' => $routes,
                    'teams' => $teams,
                    'stations' => $stations
                ]);
                
                break;
            
            default:

        }
    }
}
