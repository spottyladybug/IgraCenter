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
Hello, {{\App\User::where('id_user', Auth::id())->value('name_user')}}! You're admin
<h3><form method='post' action="/showTable">
    {!! csrf_field() !!}
    <input type="submit" name="showTable" value="Таблица результатов">
</form>
</h3>
<h3><form method='get' action="/addEnigma">
        {!! csrf_field() !!}
        <input type="submit" name="addEnigma" value="Добавить загадку">
    </form>
</h3>
<h3><form method='get' action="/addShtrafs">
        {!! csrf_field() !!}
        <input type="submit" name="moderList" value="Добавить штрафы">
    </form>
</h3>
<h3><form method='get' action="/addStation">
        {!! csrf_field() !!}
        <input type="submit" name="addStation" value="Создать станцию">
    </form>
</h3>
<h3><form method='get' action="/addModer">
        {!! csrf_field() !!}
        <input type="submit" name="addModer" value="Добавить куратора">
    </form>
</h3>
<h3><form method='get' action="/addTeam">
        {!! csrf_field() !!}
        <input type="submit" name="addTeam" value="Добавить команду">
    </form>
</h3>
<h3><form method='get' action="/teamList">
        {!! csrf_field() !!}
        <input type="submit" name="teamList" value="Список команд">
    </form>
</h3>
<h3><form method='get' action="/moderList">
        {!! csrf_field() !!}
        <input type="submit" name="moderList" value="Список кураторов">
    </form>
</h3>
</body>
</html>