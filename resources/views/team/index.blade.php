<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Команды</title>
</head>
<body>
    <table border="1">
        @foreach ($teams as $team)
            <tr>
                <td>
                    {{ $team->name }}<br/>
                    Капитан:
                    
                </td>
                <td>
                    <ul>
                        @foreach($team_table as $player)
                            @if($player->team_id == $team->id)

                            @foreach($players as $p) 
                                @if( $player->player_id == $p->id )
                                    <li>{{ $p->name }}</li>
                                @endif
                            @endforeach

                            @endif
                        @endforeach
                    </ul>
                </td>
            </tr>
        @endforeach
    </table>
</body>
</html>