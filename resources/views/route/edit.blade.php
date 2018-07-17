<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>Редактировать маршрут</h1>
    <form method="post" action="{{route('route.update', ['id'=>$team->id])}}">
        <input type="hidden" name="_method" value="put">
        Команда {{$team->name}}
        {{ csrf_field() }}    
        @include('route.form')
    </form>
</body>
</html>