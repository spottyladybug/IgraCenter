<?php

namespace App\Http\Controllers;

use App\Station;
use App\Riddle;
use App\User;
use Illuminate\Http\Request;

class StationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $stations = Station::all();
        $moders = User::all()->where('user_group', 1);
        $riddles = Riddle::all();

        return view('station.index')->with([
            'stations' => $stations,
            'moders' => $moders,
            'riddles' => $riddles
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $moders = User::all()->where('user_group', 1);
        $riddles = Riddle::all();

        return view('station.create')->with([
            'moders' => $moders,
            'riddles' => $riddles
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
        Station::create($request->all());

        return redirect()->route('station.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $station = Station::find($id);
        $moders = User::all()->where('user_group', 1);
        $riddles = Riddle::all();

        return view('station.edit')->with([
            'station' => $station,
            'moders' => $moders,
            'riddles' => $riddles,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $station = Station::find($id);
        $station->name = $request->get('name');
        $station->moderator = $request->get('moderator');
        $station->riddle = $request->get('riddle');
        $station->save();

        return redirect()->route('station.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $station = Station::find($id);
        $station->delete();

        return redirect()->route('station.index');
    }
}
