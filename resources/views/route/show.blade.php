<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Просмотр маршрута команды {{$team->name}}</title>
</head>
<body>
    <h1>Маршрут команды {{$team->name}}</h1>
    <table border="1">
        <thead>
            <th>Станция</th>
            <th>Порядок станции</th>
        </thead>
        <tbody>
            @foreach( $routes as $route )
                <tr>
                    <td>
                        @foreach ($stations as $station)
                            @if($station->id == $route->station_id)
                                {{$station->name}}
                            @endif
                        @endforeach
                    </td>
                    <td>
                        {{$route->station_order}}
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>