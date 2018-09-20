@include('parts/head')
  <div class="app">
    <main class="main-admin">
      @include('parts/admin/header') 
      <div class="gagarin">
        <a href="{{ route('admin.table') }}" class="gagarin__button">Таблица результатов</a>
        <a href="{{ route('admin.moderlist') }}" class="gagarin__button btn-moder">Таблица кураторов</a>
        <a href="{{ route('admin.teamlist') }}" class="gagarin__button btn-team">Таблица команд</a>
      </div>

    </main>


  </div><!-- end app -->
@include('parts/foot')