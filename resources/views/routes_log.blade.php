<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Маршруты</title>
</head>
<body>
    <table border="1">
        <thead>
            <th>Команда</th>
            <th>Станция</th>
            <th>Статус</th>
            <th>Время на станции</th>
            <th>Время прибытия</th>
            <th>Время отправления</th>
        </thead>
        <tbody>
            @forelse( $routes as $route )
            <tr>
                <td>
                    @foreach ($teams as $team)
                        @if($team->id == $route->team_id)
                            {{$team->name}}
                        @endif
                    @endforeach
                </td>
                <td>
                    @foreach ($stations as $station)
                        @if( $station->id == $route->station_id )
                            {{$station->name}}
                        @endif
                    @endforeach
                </td>
                <td>
                    {{$route->station_order}}
                </td>
                <td>
                    
                </td>
                <td>
                    {{$route->arrival_time}}
                </td>
                <td>
                    {{$route->departure_time}}
                </td>
            </tr>
            @empty
            <tr colspan="4">
                <td>Маршрутов не построено</td>
            </tr>
            @endforelse
        </tbody>
    </table>

</body>
</html>