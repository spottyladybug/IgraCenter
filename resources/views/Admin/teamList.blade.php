<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Список команд</title>
    <script src="http://code.jquery.com/jquery-1.10.2.js"></script>
    <script src="http://code.jquery.com/ui/1.11.0/jquery-ui.js"></script>
    <link rel="stylesheet" href="http://code.jquery.com/ui/1.11.0/themes/smoothness/jquery-ui.css">
</head>
<body>
<table border="3">
    <thead style="text-align: center; font-size: 18px; color: white; background-color: #cc2255;">
    <tr>
        <td>Название команды</td>
        <td>Капитан команды</td>
    </tr>
    <tbody style="text-align: center;">
    <?php $teams = \App\Commands::all() ?>
    @foreach( $teams as $team)
        <tr>
            <td>{{$team->name_com}}</td>
            <td>{{\App\User::where('id_user', $team->cap_com)->value('name_user')}}</td>
        </tr>
    @endforeach
    </tbody>
</table>
</body>
</html>