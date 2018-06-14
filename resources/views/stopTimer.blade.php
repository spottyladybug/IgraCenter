@extends('timer')

@section('stopTimer')
<form method="POST" action="/stopTimer">
    {!! csrf_field() !!}
    <input type="submit" name="startbyn" value="Остановить таймер">
    <input name='stop' type='text' hidden value="{{date("Y-m-d H:i:s", time())}}">
    <input name='id' type='text' hidden value="{{$id}}">
</form>
    @endsection