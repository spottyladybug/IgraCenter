@extends('Players.player')

@section('Players.enigma')
    <h1>Загадка № {{$id}}</h1>
    <br><br>
    <h2>
        @if( {{asset("images/riddles/$image")}} )
            <img height='400px' src='{{asset("images/riddles/$image")}}'>
        @else
            <img height='400px' src='{{asset("images/no-img.png")}}'>
        @endif
        <br>
        {{$text}}
    </h2>
    <br><br>
@endsection