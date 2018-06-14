<!DOCTYPE html>
<html>
<head>
    <title>START</title>
    <script src="http://code.jquery.com/jquery-1.10.2.js"></script>
    <script src="http://code.jquery.com/ui/1.11.0/jquery-ui.js"></script>
    <link rel="stylesheet" href="http://code.jquery.com/ui/1.11.0/themes/smoothness/jquery-ui.css">
    <script language="JavaScript" type="text/javascript">
        function init()
        {
            sec = 0;
            setInterval(tick, 1000);
        }

        function tick()
        {
            sec++;
            document.getElementById("timer").
                childNodes[0].nodeValue = sec;
        }
    </script>
</head>
<body>
<form method="POST" action="/setTimer">
    {{ csrf_field() }}
    <input type="submit" name="startbyn" value="ПРИШЛА КОМАНДА!">
    <input name='start' type='text' hidden value="{{date("Y-m-d H:i:s", time())}}">
    <input name='id_st_timer' type='text' hidden value="{{1}}">
    <input name='id_moder_timer' type='text' hidden value="{{1}}">
</form>
Секундомер:
<div id="timer">0</div>
@yield('stopTimer')
</body>
</html>