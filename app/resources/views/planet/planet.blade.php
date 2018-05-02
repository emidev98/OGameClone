@extends('app')
@section('content')
<div id="planet" class="container card">
    <form class="planet-header" method="GET" action="{{route('change-planet-name', $planet)}}">
        {{ csrf_field() }}
        <div class="form-group">
            <h5>Planet:</h5>
            <input id="planetName" type="text" class="form-control" name="planetName" value="{{$planet->name}}" required autofocus>
            <button type="submit" class="btn btn-primary light-blue darken-3">Change planet name</button>
        </div>
    </form>

    <p>Solar System: {{$planet->solar_system}}</p>
    <p>Position: {{$planet->position}}</p>
    <p>Planet Fleet:
        @foreach ($planet->fleet->fleetLines as $fleetLine)
            <div class="fleet-lines">
                <p>Ship type: {{$fleetLine->shipType->name}}</p>
                <p>Quantity: {{$fleetLine->quantity}}</p>
            </div>
        @endforeach
    </p>
</div>
@endsection
