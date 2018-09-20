@include('parts/head')
  <div class="app">
    <header class="header">
      <img src="images/logo_ic.png">
    </header>

    <main class="main">
      <div class="main__text">
        <span class="best-phrase">Самое масштабное мероприятие для первокурсников</span>
        <span class="call-to-action">Будь с нами!</span>
        <span class="call-to-action">Будь в центре!</span>
      </div>
      <div class="gagarin">
        <a href="{{route('app.login')}}" class="gagarin__button">Поехали!</a>
      </div>
    </main>

    <footer class="footer">
      <img src="images/logo_spb.png">
    </footer>

  </div><!-- end app -->
  @include('parts/foot')