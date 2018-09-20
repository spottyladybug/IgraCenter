<?php

namespace App\Http\Controllers;

use App\CommandsStations;
use App\Moders;
use App\Stations;
use App\Settings;
use App\Timer;
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
        $timer = Timer::firstOrCreate([
                'start' => date("Y-m-d H:i:s"),
                'id_st_timer' => Moders::where('id_user_moder',Auth::id())->value('id_station_moder'),
                'id_moder_timer' => Auth::id()]);

        return view('Moders.stopTimer', ['timer' => $timer, 'name' => $request->input('name'), 'avatar' => $request->input('avatar')]);
    }

    public function moderHome( \App\User $user ) {
        $moder = Moders::all()->where('id_user_moder', $user->id_user)->first();
        if( isset($moder->id_station_moder) && $moder->id_station_moder != null ) {
            $station = Stations::find( $moder->id_station_moder);
            $station_name = $station->name_station;
        } else {
            $station_name = null;            
        }
        return view('Moders.moder', ['avatar'=>$user->avatar, 'name'=>$user->name_user, 'station_name' => $station_name]);
    }

    public function stopTimer(Request $request)
    {
        if (Settings::where('name', 'stop')->exists()){
            return response('Игра окончена');
        }
        $id = $request->input('id');
        Timer::where('id_timer', $id)->update(['end' => date("Y-m-d H:i:s")]);
        $timer = Timer::where('id_timer', $id)->first();
        $start = new DateTime($timer->start);
        $end = new DateTime($timer->end);
        $diff = $start->diff($end);
        $min = $diff->format('%i');
        $sec = $diff->format('%s');
        return view('Moders.station', ['min' => $min, 'sec' => $sec,'name' => $request->input('name'), 'avatar' => $request->input('avatar')]);
    }

    public function setInfo(Request $request)
    {
        if (Settings::where('name', 'stop')->exists()){
            return response('Игра окончена');
        }
        $id_stat_com = Moders::where('id_user_moder', Auth::id())->value('id_station_moder');
        $id_com_stat = $request->input('id_com_stat');

        $primary = CommandsStations::where([['id_stat_com', $id_stat_com], ['id_com_stat', $id_com_stat]])->first();
        if ($primary){
            return response('Данная команда уже прошла эту станцию');
        }

        $comStat = new CommandsStations();
        $comStat->id_stat_com = $id_stat_com;
        $comStat->id_com_stat = $id_com_stat;
        $comStat->time_sec = $request->input('min')*60 + $request->input('sec');
        $comStat->id_shtraf = $request->input('id_shtraf');
        $comStat->status_zagadka = $request->input('status_zagadka') ? 1 : 0;
        $comStat->id_kur_stat = Auth::id();
        $comStat->save();

        return view('Moders.moder', ['name' => $request->input('name'), 'avatar' => $request->input('avatar')]);
    }
}
