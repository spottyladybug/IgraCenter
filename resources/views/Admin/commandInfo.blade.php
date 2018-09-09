<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>О команде</title>
    <script src="http://code.jquery.com/jquery-1.10.2.js"></script>
    <script src="http://code.jquery.com/ui/1.11.0/jquery-ui.js"></script>
    <link rel="stylesheet" href="http://code.jquery.com/ui/1.11.0/themes/smoothness/jquery-ui.css">
    <style>
        li {
            color: #cc2255; /* Цвет маркеров */
        }

        li span {
            color: black; /* Цвет текста */
        }
    </style>
</head>
<body>
<?php $command = \App\Commands::where('id_com', $id)->first(); ?>
<h3>Команда: {{$command->name_com}}</h3>
<h3>Капитан команды: {{\App\User::where('id_user', $command->cap_com)->value('name_user')}}</h3>
<h3>Игроки: </h3>
<ul>
    <?php $players = \App\Players::all() ?>
    @foreach( $players as $player)
        @if($player->team_player == $command->id_com)
            <li><span>{{\App\User::where('id_user', $player->id_user_player)->value('name_user')}}</span></li>
        @endif
    @endforeach
</ul>
<h3>Прошедшие станции: </h3>
<table border="3">
    <thead style="text-align: center; font-size: 18px; color: white; background-color: #cc2255;">
    <tr>
        <td>Название станции</td>
        <td>Куратор</td>
        <td>Время на станции</td>
        <td>Штраф</td>
        <td>Загадка</td>
    </tr>
    <tbody style="text-align: center;">
    <?php $stations = \App\CommandsStations::where('id_com_stat', $id)->get(); ?>
    @foreach( $stations as $station)
        <tr>
            <td>{{\App\Stations::where('id_station', $station->id_stat_com)->value('name_station')}}</td>
            <td>{{\App\User::where('id_user', $station->id_kur_stat)->value('name_user')}}</td>
            <td>{{date("i:s", $station->time_sec)}}</td>
            <td>{{\App\Shtraf::where('id_shtraf', $station->id_shtraf)->value('shtraf')}}</td>
            <td>{{$station->status_zagadka}}</td>
        </tr>
    @endforeach
    </tbody>
</table>
</body>
</html>