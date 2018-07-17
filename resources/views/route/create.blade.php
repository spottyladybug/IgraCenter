<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Создание маршрута</title>
</head>
<body>
    <h1>Создание маршрута</h1>
    <form method="post" action="{{route('route.store')}}">
        {{ csrf_field() }}    
        <select name="team_id">
            @foreach($teams as $team)
                <option value="{{$team->id}}">{{$team->name}}</option>
            @endforeach
        </select>
        @include('route.form')
    </form>
</body>
</html>