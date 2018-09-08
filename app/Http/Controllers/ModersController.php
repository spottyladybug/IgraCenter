<?php

namespace App\Http\Controllers;

use App\Moders;
use App\Settings;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use DB;
use DateTime;
use Illuminate\Support\Facades\Auth;

class ModersController extends Controller
{
    public function setTimer(Request $request)
    {
        if (Settings::where('name', 'stop')->exists()){
            return response('Игра окончена');
        }
        $start = date("Y-m-d H:i:s", time());
        $id_st_timer = $request->input('id_st_timer');
        $id_moder_timer = $request->input('id_moder_timer');
        $timerId = DB::table('timer_station')
            ->insertGetId([
                'start' => $start,
                'id_st_timer' => $id_st_timer,
                'id_moder_timer' => $id_moder_timer]);
        return view('Moders.stopTimer', ['id' => $timerId, 'start' => $start]);
    }

    public function stopTimer(Request $request)
    {
        if (Settings::where('name', 'stop')->exists()){
            return response('Игра окончена');
        }
        $id = $request->input('id');
        $start = $request->input('start');
        $end = date("Y-m-d H:i:s", time());
        DB::table('timer_station')->where('id_timer', $id)->update(['end' => $end]);

        $start = new DateTime($start);
        $end = new DateTime($end);
        $diff = $start->diff($end);
        $min = $diff->format('%i');
        $sec = $diff->format('%s');
        return view('Moders.station', ['min' => $min, 'sec' => $sec]);
    }

    public function setInfo(Request $request)
    {
        if (Settings::where('name', 'stop')->exists()){
            return response('Игра окончена');
        }
        $id_stat_com = Moders::where('id_user_moder', Auth::id())->value('id_station_moder');
        $id_com_stat = $request->input('id_com_stat');
        $diff = $request->input('min')*60 + $request->input('sec');
        $id_shtraf = $request->input('id_shtraf');
        $status_zagadka = $request->input('status_zagadka');
        $id_kur_stat = Auth::id();

        $primary = DB::table('commands_stations')->where([['id_stat_com', $id_stat_com], ['id_com_stat', $id_com_stat]])->first();
        if ($primary){
            return response('Данная команда уже прошла эту станцию');
        }

        DB::table('commands_stations')
            ->insert([
                'id_stat_com' => $id_stat_com,
                'id_com_stat' => $id_com_stat,
                'time_sec' => $diff,
                'id_shtraf' => $id_shtraf,
                'status_zagadka' => ($status_zagadka) ? 1 : 0,
                'id_kur_stat' => $id_kur_stat]);

        return view('Moders.moder');
    }
}
