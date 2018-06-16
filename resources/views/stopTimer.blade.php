@extends('moder')

@section('stopTimer')
    Секундомер:
    <div id="timer">0</div>
    <script>init();</script>
<form method="POST" action="/stopTimer">
    {!! csrf_field() !!}
    <input type="submit" name="startbyn" value="Остановить таймер">
    <input name='start' type='text' hidden value="{{$start}}">
    <input name='id' type='text' hidden value="{{$id}}">
</form>
    @endsection