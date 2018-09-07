<?php

namespace App\Http\Controllers;

use App\Stations;
use App\Zagadki;
use DB;
use Illuminate\Http\Request;

class PlayersController extends Controller
{
    public function getEnigma(Request $request)
    {
        $command_id = $request->input('command_id');
        $past_stations = DB::table('commands_stations')->where('id_com_stat', $command_id)->count();

        $curst = $past_stations + 2;

        if(($curst-1)>Stations::count()){
            $current_station = DB::table('table_raz')->
            select('COL '.($curst-1))->
            where('team_id',$command_id)->get()[0];
        }else {
            $current_station = DB::table('table_raz')->
            select('COL '.$curst)->
            where('team_id',$command_id)->get()[0];
        }

        $id_enigma = Stations::where('id_station', current($current_station))->value('id_zag_st');
        $enigma = Zagadki::where('id_zag', $id_enigma)->get()[0];

        return view('Players.enigma',['id'=>$id_enigma, 'text'=>$enigma->text_zag, 'image'=>$enigma->img_zag]);
    }
}
