<?php

namespace App\Http\Controllers;

use App\CommandsStations;
use App\Settings;
use App\Stations;
use App\TableRaz;
use App\Zagadki;
use DB;
use Illuminate\Http\Request;

class PlayersController extends Controller
{
    public function getEnigma(Request $request)
    {
        if( \App\Settings::where('name', 'stop')->exists() ) {
            return view('error', ['error' => 'Игра остановлена или еще не началась']);
        }
        $command_id = $request->input('command_id');
        $past_stations = CommandsStations::where('id_com_stat', $command_id)->count();

        $curst = $past_stations + 1;

        if($curst > Stations::count()){
            $current_station = TableRaz::where('team_id',$command_id)->value('COL '.($curst-1));
            // return view('gameover');
        }else {
            $current_station = TableRaz::where('team_id',$command_id)->value('COL '.$curst);
        }

        $id_enigma = Stations::where('id_station', $current_station)->value('id_zag_st');
        $enigma = Zagadki::where('id_zag', $id_enigma)->get()[0];

        return view('Players.enigma',['id'=>$id_enigma, 'text'=>$enigma->text_zag, 'image'=>$enigma->img_zag]);
    }
}
