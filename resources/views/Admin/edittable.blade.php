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
                    <td colspan="1">Название команды</td>
                    <?php $com = \App\Commands::find( $team_id );?>
                    <td colspan="3">{{$com->name_com}}</td>
                </tr>
            </thead>
            <tbody>
                <?php $stations = \App\Stations::all(); ?>
                @for($numb=1;$numb<=$stations->count()-1;$numb++)
                <tr>
                    <td colspan="1" rowspan="3">Станция <?= \App\Stations::all()->where('id_station', $numb)->first()->name_station; ?></td>
                    <td colspan="1"><img src="/img/time.png" alt=""></td>
                    <td colspan="1"><img src="/img/help.png" alt=""></td>
                    <td colspan="1"><img src="/img/stop.png" alt=""></td>
                </tr>
                <tr>
                    <?php $sum = 0; $kur = array(); $stCount=0 ?>
                    @foreach($commands as $command)
                        @if( $command->id_stat_com == $numb)
                            @component('admin.editcomRow',
                            [ 'time' => $command->time_sec,
                            'enigma' => $command->status_zagadka,
                            'fine'=>$command->shtraf,
                            'station_id'=> $numb])
                            @endcomponent
                            <?php $sum += $command->sum; $stCount++; $kur[] = $command->moder?>
                        @endif
                    @endforeach
                </tr>
                <tr>
                    @foreach($kur as $moder)
                        <td colspan="3">Куратор: {{$moder}}</td>
                    @endforeach
                </tr>
                @endfor
            </tbody>
          </table>

          <input type='submit' name='send' value='Сохранить изменения'>
        </form>
    </main>


  </div><!-- end app -->

@include('parts/foot')