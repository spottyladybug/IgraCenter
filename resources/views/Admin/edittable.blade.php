@include('parts/head')
<div class="app">
    <main class="main-admin">
      @include('parts/admin/header') 
      <div class="table-ttl">Таблица участников</div>
      <form class="edit-form" method='post' action="{{route('admin.updatetable', ['id'=>$team_id])}}">
        {{ csrf_field() }}    
        <input type="hidden" name="_method" value="patch">
          <table>
              <thead>
                  <tr>
                      <td rowspan="2">Название команды</td>
                      <?php $stations = \App\Stations::all(); ?>
                      @for($numb=1;$numb<=$stations->count();$numb++)
                        <td colspan="3">Станция № {{$numb}}</td>
                      @endfor
                      <td>Сумма</td>
                  </tr>
                  <tr>
                    @foreach($stations as $station)
                      <td><img src="/img/time.png" alt=""></td>
                      <td><img src="/img/help.png" alt=""></td>
                      <td><img src="/img/stop.png" alt=""></td>
                    @endforeach
                  </tr>
                  <tr>
                      <td colspan="100%" class="table-bg"></td>
                  </tr>
              </thead>
              <tbody>
                  <?php $com = \App\Commands::find( $team_id );?>
                  <?php $sum = 0; $kur = array();?>
                  <tr>
                      <td rowspan="2"><a href="{{route('admin.edittable', ['id' => $com->id_com])}}">{{$com->name_com}}</a></td>
                      <?php $stCount=0 ?>
                      @foreach($commands as $command)
                        @if ($command->id_com_stat == $com->id_com)
                            @component('admin.editcomRow',
                            [ 'time' => $command->time_sec,
                            'enigma' => $command->status_zagadka,
                            'fine'=>$command->shtraf,
                            'station_id'=> $command->id_com_stat])
                            @endcomponent
                            <?php $sum += $command->sum; $stCount++; $kur[] = $command->moder?>
                        @endif
                      @endforeach
                      <?php $statCount = \App\Stations::count(); ?>
                      @if ($stCount < $statCount)
                        @for($c = $stCount; $c!== $statCount; $c++)
                            <td></td>
                            <td></td>
                            <td></td>
                        @endfor
                      @endif
                      <td>{{$sum}}</td>
                  </tr>
                  <tr>
                    @foreach($kur as $moder)
                        <td colspan="3">Куратор: {{$moder}}</td>
                    @endforeach
                    @if ($stCount < $statCount)
                        @for($c = $stCount; $c!== $statCount; $c++)
                        <td colspan="3"></td>
                        @endfor
                    @endif
                  </tr>
              </tbody>
          </table>
          <input type='submit' name='send' value='Сохранить изменения'>
        </form>
    </main>


  </div><!-- end app -->

@include('parts/foot')