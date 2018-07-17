<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>Загадки</h1>
    <a href="{{route('riddle.create')}}">Добавить загадку</a>
    </br>
    <table border="1">
        <thead>
            <th>Текст загадки</th>
            <th>Изображение загадки</th>
            <th>Действие</th>
        </thead>
        @forelse ($riddles as $riddle)
            <tr>
                <td>{{$riddle->text}}</td>
                <td>{{$riddle->img}}</td>
                <td>
                    <a href="{{route('riddle.edit', ['id'=>$riddle->id])}}">Редактировать</a>
                    <form onsubmit="if(confirm('Удалить?')){return true}else{return false}" action="{{route('riddle.destroy', ['id'=>$riddle->id])}}" method="post">
                        <input type="hidden" name="_method" value="DELETE">
                        {{ csrf_field() }}
                        <button>Удалить</button>
                    </form>
                </td>
            </tr>
        @empty
            <tr colspan="3">
                <td>Загадок не создано</td>
            </tr>
        @endforelse
    </table>
</body>
</html>