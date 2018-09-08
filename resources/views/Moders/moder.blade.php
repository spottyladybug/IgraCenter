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
<img class="avatar" src={{$avatar}}>
Hello, {{$name}}! You're Moder
<form method="POST" action="/moder/setTimer">
    {!! csrf_field() !!}
    <input type="submit" name="startbyn" value="ПРИШЛА КОМАНДА!">
    <input name='id_st_timer' type='text' hidden value="{{\App\Moders::where('id_user_moder',Auth::id())->value('id_station_moder')}}">
    <input name='id_moder_timer' type='text' hidden value="{{Auth::id()}}">
</form>
</body>
</html>