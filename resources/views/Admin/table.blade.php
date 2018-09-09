<h1>Табличка участников</h1>
{{--<form method='post' action="/admin/editTable">--}}
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

        <?php $coms = \App\Commands::all();?>
        @foreach ($coms as $com)
            <?php $sum = 0; $kur = array();?>
            <tr id='{{$com->id_com}}' style='text-align: center; font-size: 16px;'>
                <td rowspan="2">
                    {{$com->name_com}}
                </td>
                <?php $count = \App\CommandsStations::count(); $stCount = 0;?>
                @for($num = 0; $num !== $count; $num++)
                    @if ($commands[$num]->id_com_stat == $com->id_com)
                        @component('Admin.comRow',
                        [ 'time' => $commands[$num]->time_sec,
                        'enigma' => $commands[$num]->status_zagadka,
                        'fine'=>$commands[$num]->shtraf])
                        @endcomponent
                        <?php $sum += $commands[$num]->sum; $stCount++; $kur[] = $commands[$num]->id_kur_stat?>
                    @endif
                @endfor
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
                    <td colspan="3">Куратор: {{\App\User::where('id_user', $moder)->value('name_user')}}</td>
                @endforeach
                @if ($stCount < $statCount)
                    @for($c = $stCount; $c!== $statCount; $c++)
                        <td colspan="3"></td>
                    @endfor
                @endif
            </tr>
        @endforeach
    </table>
    {{--<h3>--}}
        {{--<input type='submit' name='send' value='Сохранить изменения'>--}}
    {{--</h3>--}}
{{--</form>--}}