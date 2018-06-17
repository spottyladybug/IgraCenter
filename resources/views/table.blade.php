<h1>Табличка участников</h1>
<table border="3">
    <thead style="text-align: center; font-size: 18px;">
    <tr>
        <td rowspan='2'>
            Название команды
        </td>
        <?php $stations = \App\Stations::all(); ?>
        @foreach($stations as $station)
            <td colspan="3">Станция: {{$station->name_station}}
                <br> Куратор: {{\App\Moders::join('users', 'users.id_user', '=', 'users_moders.id_user_moder')
            ->where('id_station_moder',$station->id_station)
            ->value('name_user')}}</td>
        @endforeach
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

    <?php $num = \App\Commands::count(); $count = \App\Stations::count(); ?>
    @for($com=0;$com!==$num;$com++)
        <tr style='text-align: center; font-size: 16px;'>
            <td rowspan='2'>
                {{$commands[$com]->name_com}}
            </td>
        </tr>
        @for($stat=0;$stat!==$count;$stat++)
            @component('comRow',
            [ 'time' => $commands[$com+$stat]->time_sec,
            'enigma' => $commands[$com+$stat]->status_zagadka,
            'fine'=>$commands[$com+$stat]->shtraf])
            @endcomponent
        @endfor
        <td>{{$commands[$com]->sum}}</td>
    @endfor
</table>
