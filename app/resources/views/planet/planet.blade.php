@extends('app')
@section('content')
<div id="planet" class="container card">
    <form class="planet-header" method="GET" action="{{route('change-planet-name', $planet)}}">
        {{ csrf_field() }}
        <div class="form-group">
            <h5>Planet:</h5>
            <input id="planetName" type="text" class="form-control" name="planetName" value="{{$planet->name}}" required autofocus>
            <button type="submit" class="btn btn-primary light-blue darken-3">
                <span>Change planet name</span>
            </button>
        </div>
    </form>
    <div class="info">
        <div>Solar System: {{$planet->solar_system}}</div>
        <div>Position: {{$planet->position}}</div>
    </div>
    <h5 class="fleet-header">Planet Fleet</h5>
    <div class="fleet">
        @foreach ($planet->fleet->fleetLines as $fleetLine)
            <div class="fleet-line">
                <div>Ship type: {{$fleetLine->shipType->name}}</div>
                <div>Quantity: {{$fleetLine->quantity}}</div>
            </div>
        @endforeach
    </div>
</div>
@endsection
