<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Добавить куратора</title>
    <script src="http://code.jquery.com/jquery-1.10.2.js"></script>
    <script src="http://code.jquery.com/ui/1.11.0/jquery-ui.js"></script>
    <link rel="stylesheet" href="http://code.jquery.com/ui/1.11.0/themes/smoothness/jquery-ui.css">
</head>
<body>
<h3>Имя Фамилия куратора: {{\App\User::where('id_user',$moder->id_user_moder)->value('name_user')}}</h3>
<h3>Станция: {{\App\Stations::where('id_station',$moder->id_station_moder)->value('name_station')}}</h3>
<form method='post' action="/admin/changeComment">
    <h3>Комментарий: <input type="text" name="comment" value="{{$moder->comment}}"></h3>
    <input type="text" name="id" hidden value="{{$moder->id_user_moder}}">
    <input type='submit' name='send' value='Сохранить изменения'>
</form>
<h3>Прошедшие команды: </h3>
<table border="3">
    <thead style="text-align: center; font-size: 18px; color: white; background-color: #cc2255;">
    <tr>
        <td>Название команды</td>
        <td>Капитан команды</td>
        <td>Время на станции</td>
        <td>Штраф</td>
        <td>Загадка</td>
    </tr>
    <tbody style="text-align: center;">
    @foreach( $commands as $command)
        @if($command->id_kur_stat = $moder->id_user_moder)
        <tr>
            <td>{{\App\Commands::where('id_com', $command->id_com_stat)->value('name_com')}}</td>
            <td>{{\App\User::where('id_user', \App\Commands::where('id_com', $command->id_com_stat)->value('cap_com'))->value('name_user')}}</td>
            <td>{{date("i:s", $command->time_sec)}}</td>
            <td>{{\App\Shtraf::where('id_shtraf', $command->id_shtraf)->value('shtraf')}}</td>
            <td>{{$command->status_zagadka}}</td>
        </tr>
        @endif
    @endforeach
    </tbody>
</table>
</body>
</html>