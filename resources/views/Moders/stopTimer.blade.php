<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script language="JavaScript" type="text/javascript">
        function init() {
            sec = 0;
            setInterval(tick, 1000);
        }

        function tick() {
            sec++;
            document.getElementById("timer").childNodes[0].nodeValue = sec;
        }
    </script>
    <title>Document</title>
</head>
<body>
Секундомер:
<div id="timer">0</div>
<script>init();</script>
<form method="POST" action="/moder/stopTimer">
    {!! csrf_field() !!}
    <input type="submit" name="startbyn" value="Остановить таймер">
    <input name='start' type='text' hidden value="{{$start}}">
    <input name='id' type='text' hidden value="{{$id}}">
</form>
</body>
</html>
