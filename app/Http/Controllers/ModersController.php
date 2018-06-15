<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use DB;
use DateTime;
use Illuminate\Support\Facades\Auth;

class ModersController extends Controller
{
    public function setTimer(Request $request)
    {
        $start = date("Y-m-d H:i:s", time());
        $id_st_timer = $request->input('id_st_timer');
        $id_moder_timer = $request->input('id_moder_timer');
        $timerId = DB::table('timer_station')
            ->insertGetId([
                'start' => $start,
                'id_st_timer' => $id_st_timer,
                'id_moder_timer' => $id_moder_timer]);
        return view('stopTimer', ['id' => $timerId, 'start' => $start]);
    }

    public function stopTimer(Request $request)
    {
        $id = $request->input('id');
        $start = $request->input('start');
        $end = date("Y-m-d H:i:s", time());
        DB::table('timer_station')->where('id_timer', $id)->update(['end' => $end]);

        $start = new DateTime($start);
        $end = new DateTime($end);
        $diff = $start->diff($end);
        $min = $diff->format('%i');
        $sec = $diff->format('%s');
        return view('station',['min'=>$min, 'sec'=>$sec]);
    }

    public function setInfo(Request $request)
    {
        $id_stat_com = Auth::id();
        $id_com_stat = $request->input('id_com_stat');
        $diff = $request->input('diff');
        $id_shtraf = $request->input('id_shtraf');
        $status_zagadka = $request->input('status_zagadka');
        $id_kur_stat = Auth::id();

        DB::table('commands_stations')
            ->insert([
                'id_stat_com' => $id_stat_com,
                'id_com_stat' => $id_com_stat,
                'time_sec' => $diff,
                'id_shtraf' => $id_shtraf,
                'status_zagadka' => ($status_zagadka)? 1 : 0,
                'id_kur_stat' => $id_kur_stat]);

        return response('Все записано и отправлено');
    }
}
