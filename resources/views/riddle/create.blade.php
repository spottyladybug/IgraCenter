<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>Добавить загадку</h1>
    <form method="post" action="{{route('riddle.store')}}">
        {{ csrf_field() }}    
        @include('riddle.form')
    </form>
</body>
</html>