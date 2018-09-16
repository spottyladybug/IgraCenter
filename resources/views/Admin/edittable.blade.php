<h1>Редактирование</h1>
<form method='post' action="{{route('admin.updatetable', ['id'=>$team_id])}}">
    {{ csrf_field() }}    
    <input type="hidden" name="_method" value="patch">
    <table border="3">
        <thead style="text-align: center; font-size: 18px;  color: white; background-color: #0056b3;">
        <tr>
            <td rowspan='2'>
                Название команды
            </td>
            <?php $stations = \App\Stations::all(); ?>
            @for($numb=1;$numb<=$stations->count();$numb++)
                <td colspan="3">Станция № {{$numb}}</td>
            @endfor
            <td rowspan="2">Общая сумма</td>
        </tr>
        <tr>
            @foreach($stations as $station)
                <td>Time</td>
                <td>Загадка</td>
                <td>Штраф</td>
            @endforeach
        </tr>
        </thead>

        <?php $com = \App\Commands::find( $team_id );?>
            <?php $sum = 0; $kur = array();?>
            <tr id='{{$com->id_com}}' style='text-align: center; font-size: 16px;'>
                <td rowspan="2">
                    {{$com->name_com}}
                </td>
                <?php $stCount=0 ?>
                @foreach($commands as $command)
                    @if ($command->id_com_stat == $com->id_com)
                        @component('Admin.editcomRow',
                        [ 'time' => $command->time_sec,
                        'enigma' => $command->status_zagadka,
                        'fine'=>$command->shtraf])
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
                <td rowspan="2">{{$sum}}</td>
            </tr>
            <tr style="text-align: center; font-size: 16px;">
                @foreach($kur as $moder)
                    <td colspan="3">Куратор: {{$moder}}</td>
                @endforeach
                @if ($stCount < $statCount)
                    @for($c = $stCount; $c!== $statCount; $c++)
                        <td colspan="3"></td>
                    @endfor
                @endif
            </tr>
    </table>
    <h3>
        <input type='submit' name='send' value='Сохранить изменения'>
    </h3>
</form>