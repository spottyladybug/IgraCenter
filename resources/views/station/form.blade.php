<input type="text" name="name" value="@if(isset($station->name)){{$station->name}} @endif"></br>
<select name="moderator">
    @foreach ($moders as $moder)
        <option @if(isset($station->moderator) && $station->moderator == $moder->id) selected @endif value="{{$moder->id}}">{{$moder->name}}</option>
    @endforeach
</select></br>
<select name="riddle">
    @foreach($riddles as $riddle)
        <option @if(isset($station->riddle) && $station->moderator == $riddle->id) selected @endif value="{{$riddle->id}}">{{$riddle->id}}</option>
    @endforeach
</select></br>
<button>Сохранить</button>