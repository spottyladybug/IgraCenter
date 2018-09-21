@include('parts/head')
<?php $commandId = \App\Players::where('id_user_player', Auth::id())->value('team_player') ?>
  <div class="app">
    <main class="main">
      <div class="main__text">
        <span class="hello">Привет, {{\App\User::where('id_user', Auth::id())->value('name_user')}}</span>
        <span class="player-status">Вы - игрок</span>
        <span class="player-status">Ваша команда: {{\App\Commands::where('id_com',$commandId)->value('name_com')}}</span>
        <span class="player-status">Номер вашей команды: {{$commandId}}</span>
      </div>
      <div class="puzzle" id="puzzle">
      @yield('Players.enigma')
      </div>
      <form method="POST" action="/player/getEnigma" class="gagarin">
        {!! csrf_field() !!}
        <input type='text' name='command_id' hidden value={{$commandId}}>
        <button class="gagarin__button">Получить загадку</button>
      </form>
    </main>


  </div><!-- end app -->
@include('parts/foot')