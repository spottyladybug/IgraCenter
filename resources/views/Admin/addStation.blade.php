<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Добавить станцию</title>
    <script src="http://code.jquery.com/jquery-1.10.2.js"></script>
    <script src="http://code.jquery.com/ui/1.11.0/jquery-ui.js"></script>
    <link rel="stylesheet" href="http://code.jquery.com/ui/1.11.0/themes/smoothness/jquery-ui.css">
</head>
<body>
<form method='post' action="/addStation">
    <h3>
        Название станции
        <input type="text" name="name"><br>
    </h3>
    <h3>
        Загадка
        <?php $enigmas = \App\Zagadki::all() ?>
        <select name='id_enigma'>
            @foreach( $enigmas as $enigma)
                <option value="{{$enigma->id_zag}}">{{$enigma->text_zag}}</option>
            @endforeach
        </select>
    </h3>
    <input type='submit' name='send' value='ОТПРАВИТЬ'>
</form>
</body>
</html>