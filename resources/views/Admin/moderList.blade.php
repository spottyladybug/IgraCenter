<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>О кураторе</title>
    <script src="http://code.jquery.com/jquery-1.10.2.js"></script>
    <script src="http://code.jquery.com/ui/1.11.0/jquery-ui.js"></script>
    <link rel="stylesheet" href="http://code.jquery.com/ui/1.11.0/themes/smoothness/jquery-ui.css">
</head>
<body>
<table border="3">
    <thead style="text-align: center; font-size: 18px; color: white; background-color: #1e7e34;">
    <tr>
        <td>Имя куратора</td>
        <td>Название станции</td>
    </tr>
    <tbody style="text-align: center;">
    <?php $moders = \App\Moders::all() ?>
    @foreach( $moders as $moder)
        <tr>
            <td><a href="/admin/moderInfo/{{$moder->id_user_moder}}">{{\App\User::where('id_user', $moder->id_user_moder)->value('name_user')}}</a></td>
            <td>{{\App\Stations::where('id_station', $moder->id_station_moder)->value('name_station')}}</td>
        </tr>
    @endforeach
    </tbody>
</table>
</body>
</html>