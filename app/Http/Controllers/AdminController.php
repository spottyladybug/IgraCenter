<?php

namespace App\Http\Controllers;

use App\Check_users;
use App\Commands;
use App\CommandsStations;
use App\Players;
use App\Settings;
use App\Shtraf;
use App\Stations;
use App\Zagadki;
use DB;
use App\User;
use App\Moders;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function showTable()
    {
        $result = CommandsStations::all();

        foreach ($result as $value) {
            $value->shtraf = Shtraf::where('id_shtraf', $value->id_shtraf)->value('shtraf');
            $value->sum = $value->time_sec + $value->shtraf - 5 * $value->status_zagadka;
            $value->moder = User::where('id_user', $value->id_kur_stat)->value('name_user');
        }

        // array_pop($result);

        return view('admin.table', ['commands' => $result]);
    }

    public function editTable($id) {
        $result = CommandsStations::all()->where('id_com_stat', $id);

        foreach ($result as $value) {
            $value->shtraf = Shtraf::where('id_shtraf', $value->id_shtraf)->value('shtraf');
            $value->sum = $value->time_sec + $value->shtraf - 5 * $value->status_zagadka;
            $value->moder = User::where('id_user', $value->id_kur_stat)->value('name_user');
        }

        // var_dump($result);

        return view('admin.edittable', ['commands' => $result, 'team_id' => $id]);
    }

    public function updateTable(Request $request, $id) {
        $comstat = CommandsStations::all()->where('id_com_stat', $id);
        $edittable = $request->get('edittable');
        foreach($edittable as $station => $table) {
            $statcom = CommandsStations::all()->where('id_stat_com', $station)->first();
            $time = explode( ':', $table['time_sec'] );
            $statcom->time_sec = (int)$time[0] * 60 + (int)$time[1];
            $statcom->id_shtraf = $table['id_shtraf'];
            $statcom->status_zagadka = $table['status_zagadka'];
            $statcom->save();
        }

        return redirect()->route('admin.table');
    }

    public function addNewModer(Request $request)
    {
        if (User::where('vk_id_user', $request->input('id'))->first()) {
            return response('Такой пользователь уже существует. Запись невозможна');
        }
        $user = new User;
        $user->name_user = $request->input('name');
        $user->vk_id_user = $request->input('id');
        $user->group_user = 1;
        $user->save();
        $check_user = new Check_users;
        $check_user->id_check_user = $user->id_user;
        $check_user->save();
        $moder = new Moders;
        $moder->id_user_moder = $user->id_user;
        $moder->id_station_moder = $request->input('id_station');
        $moder->save();
        return response('Новый куратор успешно добавлен');
    }

    public function addNewStation(Request $request)
    {
        $station = new Stations;
        $station->name_station = $request->input('name');
        $station->id_zag_st = $request->input('id_enigma');
        $station->save();
        return response('Новая станция успешно добавлена');
    }

    public function addNewTeam(Request $request)
    {
        if (User::where('vk_id_user', $request->input('id'))->first()) {
            return response('Такой пользователь уже существует. Запись невозможна');
        }
        //регистрация капитана
        $user = new User;
        $user->name_user = $request->input('cap_com');
        $user->vk_id_user = $request->input('id');
        $user->group_user = 2;
        $user->save();
        $check_user = new Check_users;
        $check_user->id_check_user = $user->id_user;
        $check_user->save();
        $team = new Commands;
        $team->name_com = $request->input('name');
        $team->cap_com = $user->id_user;
        $team->save();
        $player = new Players();
        $player->id_user_player = $user->id_user;
        $player->team_player = $team->id_com;
        $player->status_player = 1;
        $player->save();
        return response('Новая команда успешно создана');
    }

    public function addNewEnigma(Request $request)
    {
        $enigma = new Zagadki;
        $enigma->text_zag = $request->input('text_zag');

        if ($request->hasFile('img_zag')) {
            $img = $request->file('img_zag');
            $num = Zagadki::all()->count() + 1;
            $img->move(public_path() . '/images','enigma'.$num.'.jpg');
            $enigma->img_zag = 'enigma'.$num.'.jpg';
        }
        $enigma->save();
        return response('Загадка успешно создана');
    }

    public function addNewShtrafs(Request $request)
    {
        $shtraf = new Shtraf;
        $shtraf->shtraf = $request->input('shtraf');
        $shtraf->save();
        return response('Штраф успешно добавлен');
    }

    public function stopGame()
    {
        $stop = Settings::all()->first();
        $stop->name = 'stop';
        $stop->save();
        return response('Игра остановлена');
    }

    public function startGame()
    {
        $start = Settings::all()->first();
        $start->name = 'start';
        $start->save();
        return redirect()->route('admin.home');
    }

//    public function editTable(Request $request)
//    {
//        list($m, $s) = explode(':', $request->input('time'));
//        CommandsStations::where([['id_stat_com', $request->input('id_stat')], ['id_com_stat', $request->input('id_com')]])
//            ->update(['time_sec' => ($m * 60) + $s],
//                ['id_shtraf' => Shtraf::where('shtraf', $request->input('fine'))->value('id_shtraf')],
//                ['id_status_zagadka' => $request->input('enigma')]);
//        return response('Изменения сохранены');
//    }

    public function getModerInfo($id)
    {
        $moder = Moders::where('id_user_moder', $id)->first();
        $commands = CommandsStations::where('id_kur_stat', $id)->get();
        return view('admin.moderInfo', ['moder' => $moder, 'commands' => $commands]);
    }

    public function changeComment(Request $request)
    {
        Moders::where('id_user_moder', $request->input('id'))
            ->update(['comment' => $request->input('comment')]);

        return response('Комментарий изменен');
    }
}
