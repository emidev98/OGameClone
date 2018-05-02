@extends('app')
@section('content')
<div id="planet" class="container card">
    <p>Planet: {{$planet->name}}</p>
    <form class="form-horizontal" method="GET" action="{{route('change-planet-name', $planet)}}">
        {{ csrf_field() }}
        <div class="form-group">
            <input id="planetName" type="text" class="form-control" name="planetName" value="" required autofocus>
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
