<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>Все маршруты</h1>
    <a href="{{route('route.create')}}">Создать маршруты</a>
    <table border="1">
        <thead>
            <th>Маршрут команды</th>
            <th>Действие</th>
        </thead>
        <tbody>
            @forelse ($teams as $team) 
                <tr>
                    <td>
                        <a href="{{route('route.show', ['id'=>$team->id])}}">{{$team->name}}</a>
                    </td>
                    <td>
                        <a href="{{route('route.edit', ['id'=>$team->id])}}">Редактировать</a>
                        <form onsubmit="if(confirm('Удалить?')){return true}else{return false}" action="{{route('route.destroy', ['id'=>$team->id])}}" method="post">
                            <input type="hidden" name="_method" value="DELETE">
                            {{ csrf_field() }}
                            <button>Удалить</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="7">Маршрутов не построено</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</body>
</html>