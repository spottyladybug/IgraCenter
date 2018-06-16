<h1>Табличка участников</h1>
<table border="3">
    <thead style="text-align: center; font-size: 18px;">
    <tr>
        <td rowspan='2'>
            Название команды
        </td>
        <?php $stations = \App\Stations::all(); ?>
        @foreach($stations as $station)
            <td colspan="3">{{$station->name_station}}</td>
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

    <?php $num = \App\Commands::count(); ?>
    @for($com=0;$com!==$num;$com++)
        <tr style='text-align: center; font-size: 16px;'>
            <td rowspan='2'>
                {{$commands[$com]->name_com}}
            </td>
        </tr>
        @foreach($stations as $station)
            @component('comRow',
            [ 'time' => $commands[$com]->time_sec,
            'enigma' => $commands[$com]->status_zagadka,
            'fine'=>$commands[$com]->shtraf])
            @endcomponent
        @endforeach
    @endfor
</table>
