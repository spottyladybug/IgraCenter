<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

Hello, {{\App\User::where('id_user', Auth::id())->value('name_user')}}! You're Player

<?php $commandId = \App\Players::where('id_user_player', Auth::id())->value('team_player') ?>

<h2> Ваша команда: {{\App\Commands::where('id_com',$commandId)->value('name_com')}}</h2>
<h2> Номер вашей команды: {{$commandId}}</h2>
<br>
<form method="POST" action="/getEnigma">
    {!! csrf_field() !!}
    <input type="submit" name="getEnigma" value="Получить загадку">
    <input type='text' name='command_id' hidden value={{$commandId}}>
</form>
@yield('enigma')
</body>
</html>