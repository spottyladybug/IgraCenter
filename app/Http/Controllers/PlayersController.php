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
        $past_stations = DB::table('commands_stations')->count('id_com_stat', $command_id);

        $curst = $past_stations + 2;

        $current_station = DB::table('table_raz')->
        select('COL '.$curst)->
        where('team_id',$command_id)->get()[0];

        $id_enigma = Stations::where('id_station', current($current_station))->value('id_zag_st');
        $enigma = Zagadki::where('id_zag', $id_enigma)->get()[0];

        return view('enigma',['id'=>$id_enigma, 'text'=>$enigma->text_zag, 'image'=>$enigma->img_zag]);
    }
}
