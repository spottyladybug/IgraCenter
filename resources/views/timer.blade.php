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
<form method="POST" action="/setTimer">
    {!! csrf_field() !!}
    <input type="submit" name="startbyn" value="ПРИШЛА КОМАНДА!">
    <input name='id_st_timer' type='text' hidden value="{{Auth::id()}}">
    <input name='id_moder_timer' type='text' hidden value="{{Auth::id()}}">
</form>
Секундомер:
<div id="timer">0</div>
<script>init();</script>
@yield('stopTimer')