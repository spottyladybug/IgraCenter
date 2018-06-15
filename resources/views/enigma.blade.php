@extends('player')

@section('enigma')
    <h1>Загадка № {{$id}}</h1>
    <br><br>
    <h2><img height='400px' src='{{asset("images/$image")}}'><br>{{$text}}
    </h2>
    <br><br>
@endsection