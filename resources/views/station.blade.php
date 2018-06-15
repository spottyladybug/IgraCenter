<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>STATION</title>
    <script src="http://code.jquery.com/jquery-1.10.2.js"></script>
    <script src="http://code.jquery.com/ui/1.11.0/jquery-ui.js"></script>
    <link rel="stylesheet" href="http://code.jquery.com/ui/1.11.0/themes/smoothness/jquery-ui.css">
</head>
<body>
<form method='post' action="/setInfo">
    <h3>
        Станция
        <input type="text" name="station"
               value="{{\App\Stations::where('id_station',Auth::id())->value('name_station')}}" disabled><br>
        Куратор
        <input type="text" name="kurator" value="{{\App\User::where('id_user',Auth::id())->value('name_user')}}"
               disabled><br>
        Команда
        <?php $commands = \App\Commands::all() ?>
        <select name='id_com_stat'>
            @foreach( $commands as $command)
                @component('commands',
                [ 'id' => $command->id_com,
                'name' => $command->name_com])
                @endcomponent
            @endforeach
        </select>
        <input type='text' name='diff' hidden value="{{$min*60 + $sec}}">
        <br>Минут:<input type='text' name='min' value="{{$min}}"><br>
        Секунд:<input type='text' name='sec' value="{{$sec}}"><br>
        <input type='checkbox' name='status_zagadka'> Загадка отгадана?<br>
        Штраф
        <?php $shtrafs = \App\Shtraf::all() ?>
        <select name='id_shtraf'>
            @foreach( $shtrafs as $shtraf)
                @component('shtraf',
                [ 'id' => $shtraf->id_shtraf,
                'name' => $shtraf->shtraf])
                @endcomponent
            @endforeach
        </select><br>
        <input type='submit' name='send' value='ОТПРАВИТЬ'>
    </h3>
</form>
</body>
</html>