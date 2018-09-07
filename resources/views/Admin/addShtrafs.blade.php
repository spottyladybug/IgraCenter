<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Добавить штрафы</title>
    <script src="http://code.jquery.com/jquery-1.10.2.js"></script>
    <script src="http://code.jquery.com/ui/1.11.0/jquery-ui.js"></script>
    <link rel="stylesheet" href="http://code.jquery.com/ui/1.11.0/themes/smoothness/jquery-ui.css">
</head>
<body>
<?php $shtrafs = \App\Shtraf::all() ?>
@foreach( $shtrafs as $shtraf)
    <h3>{{$shtraf->id_shtraf}} - {{$shtraf->shtraf}}</h3>
@endforeach
<form method='post' action="/admin/addNewShtrafs">
    <h3>
        Количество вычитаемых баллов за штраф
        <input type="text" name="shtraf"><br>
    </h3>
    <input type='submit' name='send' value='ОТПРАВИТЬ'>
</form>
</body>
</html>