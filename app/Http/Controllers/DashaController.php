<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;

class DashaController extends Controller
{
    public function showTable()
    {
        $result = DB::select('SELECT commands.name_com, id_stat_com, time_sec, shtrafs.shtraf, status_zagadka, users.name_user FROM commands_stations INNER JOIN shtrafs ON commands_stations.id_shtraf=shtrafs.id_shtraf INNER JOIN commands ON id_com_stat=id_com INNER JOIN users ON users.id_user=id_kur_stat ORDER BY id_stat_com ASC');

        return view('table',['commands'=>$result]);
    }
}
