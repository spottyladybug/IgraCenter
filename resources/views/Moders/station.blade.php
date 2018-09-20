@include('parts/head')
<div class="app">
    <main class="main">
      <form method='post' action="/moder/setInfo" class="main__text">
      <?php $station_id = \App\Moders::where('id_user_moder', Auth::id())->value('id_station_moder'); ?>
        <div class="form-part">
          <label for="">Станция</label>
          <input type="text" name="station" value="{{\App\Stations::where('id_station',$station_id)->value('name_station')}}" disabled>
        </div>
        <div class="form-part">
          <label for="">Куратор</label>
          <input type="text" name="kurator" value="{{\App\User::where('id_user',Auth::id())->value('name_user')}}" disabled>
        </div>
        <div class="form-part">
          <label for="">Команда</label>
          <?php $commands = \App\Commands::all() ?>
          <select name='id_com_stat'>
            @foreach( $commands as $command)
                <option value="{{$command->id_com}}">{{$command->name_com}}</option>
            @endforeach
          </select>
        </div>
        <div class="form-part">
          <label for="">Минут</label>
          <input type='text' name='min' value="{{$min}}">
        </div>
        <div class="form-part">
          <label for="">Секунд</label>
          <input type='text' name='sec' value="{{$sec}}">
        </div>
        <div class="form-part">
          <label>Загадка отгадана?<input type='checkbox' name='status_zagadka'></label>
        </div>
        <div class="form-part">
          <label for="">Штраф</label>
          <?php $shtrafs = \App\Shtraf::all() ?>
          <select name='id_shtraf'>
            @foreach( $shtrafs as $shtraf)
                <option value="{{$shtraf->id_shtraf}}">{{$shtraf->shtraf}}</option>
            @endforeach
          </select>
        </div>
        <div class="gagarin">
            <button style="margin-top: 24px;" class="gagarin__button">Отправить</button>
        </div>
      </div>

    </form>


  </div><!-- end app -->
@include('parts/foot')