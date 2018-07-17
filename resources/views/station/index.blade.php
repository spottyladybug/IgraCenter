<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>Станции</h1>
    <a href="{{route('station.create')}}">Добавить станцию</a>
    <table border="1">
        <thead>
            <th>Название</th>
            <th>Модератор</th>
            <th>Загадка</th>
            <th>Действие</th>
        </thead>
        <tbody>
            @forelse($stations as $station)
                <tr>
                    <td>{{$station->name}}</td>
                    <td>
                        @foreach($moders as $moder)
                            @if( $station->moderator == $moder->id ){{$moder->name}}@endif
                        @endforeach
                    </td>
                    <td>
                        @foreach($riddles as $riddle)
                            @if( $station->riddle == $riddle->id ){{$riddle->text}}@endif
                        @endforeach
                    </td>
                    <td>
                        <a href="{{route('station.edit', ['id'=>$station->id])}}">Редактировать</a>
                        <form onsubmit="if(confirm('Удалить?')){return true}else{return false}" action="{{route('station.destroy', ['id'=>$station->id])}}" method="post">
                            <input type="hidden" name="_method" value="DELETE">
                            {{ csrf_field() }}
                            <button>Удалить</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td clspan="4">Станций не создано</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</body>
</html>