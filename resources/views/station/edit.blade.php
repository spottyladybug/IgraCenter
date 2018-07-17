<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>Редактировать станцию</h1>
    <form method="post" action="{{route('station.update', ['id'=>$station->id])}}">
        <input type="hidden" name="_method" value="put">
        {{ csrf_field() }}    
        @include('station.form')
    </form>
</body>
</html>