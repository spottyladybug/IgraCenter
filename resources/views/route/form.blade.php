<ul>
    @foreach( $stations as $station )

    @if( isset($routes) )
        @foreach( $routes as $route )

        @if( $station->id == $route->station_id )
        <li>
            <label>Станция {{$station->name}}
                <input name="route[{{$station->id}}]" value="@if($route->station_id == $station->id && isset($route->station_order)){{$route->station_order}}@endif" type="text">
            </label>
        </li>
        @endif

        @endforeach
    @else

        <li>
            <label>Станция {{$station->name}}
                <input name="route[{{$station->id}}]" type="text">
            </label>
        </li>

    @endif

    @endforeach
</ul>

<button>Сохранить</button>