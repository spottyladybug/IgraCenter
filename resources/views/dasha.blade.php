<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
Hello, {{$name_user}}! You're Dasha
<form method='post' action="/showTable">
    {!! csrf_field() !!}
    <input type="submit" name="showTable" value="Таблица результатов">
</form>
</body>
</html>