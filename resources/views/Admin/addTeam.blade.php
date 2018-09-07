<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Добавить команду</title>
    <script src="http://code.jquery.com/jquery-1.10.2.js"></script>
    <script src="http://code.jquery.com/ui/1.11.0/jquery-ui.js"></script>
    <link rel="stylesheet" href="http://code.jquery.com/ui/1.11.0/themes/smoothness/jquery-ui.css">
</head>
<body>
<form method='post' action="/admin/addNewTeam">
    <h3>
        Название команды
        <input type="text" name="name"><br>
    </h3>
    <h3>
        Имя Фамилия капитана команды
        <input type="text" name="cap_com"><br>
    </h3>
    <h3>
        Vk id капитана команды
        <input type="text" name="id"><br>
    </h3>
    <input type='submit' name='send' value='ОТПРАВИТЬ'>
</form>
</body>
</html>