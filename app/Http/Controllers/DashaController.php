<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;

class DashaController extends Controller
{
    public function showTable()
    {
        $result = DB::select('SELECT commands.name_com, id_stat_com, time_sec, shtrafs.shtraf, status_zagadka, id_kur_stat AS sum FROM commands_stations INNER JOIN shtrafs ON commands_stations.id_shtraf=shtrafs.id_shtraf INNER JOIN commands ON id_com_stat=id_com ORDER BY id_stat_com ASC');

        foreach($result as $value){
            $value->sum = $value->time_sec+$value->shtraf-5*$value->status_zagadka;
        }

        return view('Dasha.table',['commands'=>$result]);
    }
}
