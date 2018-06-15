@extends('timer')

@section('stopTimer')
<form method="POST" action="/stopTimer">
    {!! csrf_field() !!}
    <input type="submit" name="startbyn" value="Остановить таймер">
    <input name='start' type='text' hidden value="{{$start}}">
    <input name='id' type='text' hidden value="{{$id}}">
</form>
    @endsection