@include('parts/head')
  <div class="app">
    <main class="main-admin">
      @include('parts/admin/header') 
      <div class="gagarin">
        <a href="{{ route('admin.table') }}" class="gagarin__button">Таблица результатов</a>
        <a href="{{ route('admin.moderlist') }}" class="gagarin__button btn-moder">Таблица кураторов</a>
        <a href="{{ route('admin.teamlist') }}" class="gagarin__button btn-team">Таблица команд</a>
        @if (\App\Settings::where('name', 'start')->exists())
          <a href="{{ route('admin.stopgame') }}" class="gagarin__button btn-team">Стоп игра</a>
        @else
          <a href="{{ route('admin.startgame') }}" class="gagarin__button btn-team">Старт игра</a>
        @endif
      </div>

    </main>


  </div><!-- end app -->
@include('parts/foot')