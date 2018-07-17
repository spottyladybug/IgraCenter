<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Создание станции</title>
</head>
<body>
    <h1>Создание станции</h1>
    <form method="post" action="{{route('station.store')}}">
        {{ csrf_field() }}    
        @include('station.form')
    </form>
</body>
</html>