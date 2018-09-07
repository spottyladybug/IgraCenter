<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Список кураторов</title>
    <script src="http://code.jquery.com/jquery-1.10.2.js"></script>
    <script src="http://code.jquery.com/ui/1.11.0/jquery-ui.js"></script>
    <link rel="stylesheet" href="http://code.jquery.com/ui/1.11.0/themes/smoothness/jquery-ui.css">
</head>
<body>
<?php $moders = \App\Moders::all() ?>
@foreach( $moders as $moder)
    <h3>{{\App\User::where('id_user', $moder->id_user_moder)->value('name_user')}} - {{\App\Stations::where('id_station', $moder->id_station_moder)->value('name_station')}}</h3>
@endforeach
</body>
</html>