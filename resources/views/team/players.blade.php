<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Таблица игроков</title>
</head>
<body>
    <table>
        <tbody>
            @foreach ($players as $player)
                <tr>
                    <td>{{ $player["name"] }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>