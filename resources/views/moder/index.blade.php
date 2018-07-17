<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Страница модератора</title>
</head>
<body>
    <h1>
        {{ $station->name }}
    </h1>
    </hr>
    <h3>Загадка станции</h3>
    <p>
        {{ $riddle->text }}
    </p>
    <form id="setArrival" method="post" action="{{route('moder.setarrival', ['station_id'=>$station->id])}}">
        <input type="hidden" name="_method" value="patch">
        {{ csrf_field() }}
        <select name="team_id">
            @foreach($teams as $team)
            <option value="{{$team->id}}">{{$team->name}}</option>
            @endforeach
        </select>
        <button>Отправить</button>
    </form>
</body>
</html>