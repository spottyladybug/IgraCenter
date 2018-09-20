@include('parts/head')
    <div class="app">
        <main class="main">
            <div class="main__text">
                <span class="call-to-go">Прошло <i class="far fa-clock"></i></span>
            </div>
            <div class="time"><p id="timer">00:00:00.00</p></div>
            <div class="gagarin">
                <form method="POST" action="/moder/stopTimer">
                    {!! csrf_field() !!}
                    <input name='id' type='text' hidden value="{{$timer->id_timer}}">
                    <input name='avatar' type='text' hidden value="{{$avatar}}">
                    <input name='name' type='text' hidden value="{{$name}}">
                    <!-- <button type="button" class="gagarin__button">Старт / Стоп</button> -->
                    <button type="submit" class="gagarin__button_stop">Закончить</button>
                </form>
            </div>
        </main>
    </div><!-- end app -->
    <script language="JavaScript" type="text/javascript">
//объявляем переменные
var base = 60; 
var clocktimer,dateObj,dh,dm,ds,ms; 
var readout=''; 
var h=1,m=1,tm=1,s=0,ts=0,ms=0,init=0; 
//функция для очистки поля
function ClearСlock() { 
	clearTimeout(clocktimer); 
	h=1;m=1;tm=1;s=0;ts=0;ms=0; 
	init=0;
	readout='00:00:00.00'; 
	document.getElementById('timer').innerHTML=readout; 
} 
//функция для старта секундомера
function StartTIME() { 
	var cdateObj = new Date(); 
	var t = (cdateObj.getTime() - dateObj.getTime())-(s*1000); 
	if (t>999) { s++; } 
	if (s>=(m*base)) { 
		ts=0; 
		m++; 
	} else { 
		ts=parseInt((ms/100)+s); 
		if(ts>=base) { ts=ts-((m-1)*base); } 
	} 
	if (m>(h*base)) { 
		tm=1; 
		h++; 
	} else { 
		tm=parseInt((ms/100)+m); 
		if(tm>=base) { tm=tm-((h-1)*base); } 
	} 
	ms = Math.round(t/10); 
	if (ms>99) {ms=0;} 
	if (ms==0) {ms='00';} 
	if (ms>0&&ms<=9) { ms = '0'+ms; } 
	if (ts>0) { ds = ts; if (ts<10) { ds = '0'+ts; }} else { ds = '00'; } 
	dm=tm-1; 
	if (dm>0) { if (dm<10) { dm = '0'+dm; }} else { dm = '00'; } 
	dh=h-1; 
	if (dh>0) { if (dh<10) { dh = '0'+dh; }} else { dh = '00'; } 
	readout = dh + ':' + dm + ':' + ds + '.' + ms; 
	document.getElementById('timer').innerHTML = readout; 
	clocktimer = setTimeout("StartTIME()",1); 
} 
//Функция запуска и остановки
function StartStop() { 
	if (init==0){ 
		ClearСlock();
		dateObj = new Date(); 
		StartTIME(); 
		init=1; 
	} else { 
		clearTimeout(clocktimer);
		init=0;
	} 
} 

document.addEventListener("DOMContentLoaded", StartStop);
</script> 
@include('parts/foot')
