@include('parts/head')
  <div class="app">
    <main class="main">
      <div class="main__text">
          <div class="img-moder">
            <img class="avatar" src={{$avatar}}>
          </div>
      </div>
        <span class="moder-status">Куратор станции {{$station_name}}</span>
        <span class="moder-name">{{$name}}!</span>

      <div class="gagarin">
        <form method="POST" action="/moder/setTimer">
            {!! csrf_field() !!}
            <input class="gagarin__button_moder" type="submit" name="startbyn" value="START!">
        </form>
      </div>

    </main>


  </div><!-- end app -->
@include('parts/foot')