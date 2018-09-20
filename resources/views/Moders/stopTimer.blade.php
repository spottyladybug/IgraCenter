@include('parts/head')
    <div class="app">
        <main class="main">
            <div class="main__text">
                <span class="call-to-go">Прошло <i class="far fa-clock"></i></span>
            </div>
            <div class="time"><p id="timer">0:00:00</p></div>
            <div class="gagarin">
                <form method="POST" action="/moder/stopTimer">
                    {!! csrf_field() !!}
                    <input name='id' type='text' hidden value="{{$timer->id_timer}}">
                    <input name='avatar' type='text' hidden value="{{$avatar}}">
                    <input name='name' type='text' hidden value="{{$name}}">
                    <button type="button" class="gagarin__button">Старт / Стоп</button>
                    <button type="submit" class="gagarin__button_stop">Закончить</button>
                </form>
            </div>
        </main>
    </div><!-- end app -->
@include('parts/foot')
