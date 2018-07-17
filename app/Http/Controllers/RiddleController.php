<?php

namespace App\Http\Controllers;

use App\Riddle;
use Illuminate\Http\Request;

class RiddleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('riddle.index')->with('riddles', Riddle::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('riddle.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Riddle::create($request->all());

        return redirect()->route('riddle.index');
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
        $riddle = Riddle::find($id);
        return view( 'riddle.edit' )->with('riddle', $riddle);
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
        $riddle = Riddle::find($id);
        $riddle->text = $request->get('text');
        $riddle->img = $request->get('img');
        $riddle->save();

        return redirect()->route('riddle.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $riddle = Riddle::find($id);
        $riddle->delete();
        return redirect()->route('riddle.index');
    }
}
