@extends('Players.player')

@section('Players.enigma')
    <h1>Загадка № {{$id}}</h1>
    <br><br>
    <h2>
        <?php if( $image != '' && file_exists( public_path() . '/images/riddles/' . $image ) ) : ?>
            <img height='400px' src='{{asset("images/riddles/$image")}}'>
        <?php else : ?>
            <img height='400px' src='{{asset("images/no-img.png")}}'>
        <?php endif; ?>
        <br>
        {{$text}}
    </h2>
    <br><br>
@endsection