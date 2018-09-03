<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Добавить куратора</title>
    <script src="http://code.jquery.com/jquery-1.10.2.js"></script>
    <script src="http://code.jquery.com/ui/1.11.0/jquery-ui.js"></script>
    <link rel="stylesheet" href="http://code.jquery.com/ui/1.11.0/themes/smoothness/jquery-ui.css">
</head>
<body>
<form method='post' action="/addModer">
    <h3>
        Станция
        <?php $stations = \App\Stations::all() ?>
        <select name='id_station'>
            @foreach( $stations as $station)
                <option value="{{$station->id_station}}">{{$station->name_station}}</option>
            @endforeach
        </select>
    </h3>
    <h3>
        Фамилия Имя куратора
        <input type="text" name="name"><br>
    </h3>
    <h3>
        Vk id куратора
        <input type="text" name="id"><br>
    </h3>
        <input type='submit' name='send' value='ОТПРАВИТЬ'>
</form>
</body>
</html>