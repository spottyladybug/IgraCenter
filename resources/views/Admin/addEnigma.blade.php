<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Добавить загадку</title>
    <script src="http://code.jquery.com/jquery-1.10.2.js"></script>
    <script src="http://code.jquery.com/ui/1.11.0/jquery-ui.js"></script>
    <link rel="stylesheet" href="http://code.jquery.com/ui/1.11.0/themes/smoothness/jquery-ui.css">
</head>
<body>
<form method='post' action="/admin/addNewEnigma" enctype="multipart/form-data">
    <h3>
        <p>Текст загадки<Br>
            <textarea name="text_zag" rows="15"></textarea></p>
    </h3>
    <h3>
        <p><input type="file" name="img_zag">
    </h3>
    <input type='submit' name='send' value='ОТПРАВИТЬ'>
</form>
</body>
</html>