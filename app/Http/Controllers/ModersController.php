<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use DB;

class ModersController extends Controller
{


    public function setTimer(Request $request)
    {
        $start = $request->input('start');
        $id_st_timer = $request->input('id_st_timer');
        $id_moder_timer = $request->input('id_moder_timer');
        $timerId = DB::table('timer_station')
            ->insertGetId([
                'start' => $start,
                'id_st_timer' => $id_st_timer,
                'id_moder_timer' => $id_moder_timer]);
        return view('stopTimer', ['id' => $timerId]);
    }

    public function stopTimer(Request $request)
    {
        $id = $request->input('id');
        DB::table('timer_station')->where('id_timer', $id)->update(['end' => date("Y-m-d H:i:s", time())]);
        return view('timer');
    }
}
