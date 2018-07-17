<label>Текст загадки: </br>
    <textarea required name="text" cols="30" rows="10">@if(isset($riddle->id)){{ $riddle->text }}@endif</textarea>
</label>

<input type="hidden" name="img" value="@if(isset($riddle->img)){{$riddle->img}}@endif">
</br>
<button>Сохранить</button>