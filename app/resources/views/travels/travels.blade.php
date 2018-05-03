@extends('app')
@section('content')
<div id="travel" class="container card">
    <form class="form-horizontal" method="POST" action="{{route('travel-chose-planet', $planet)}}">
        @foreach ($planet->fleet->fleetLines as $fleetLine)
            <div class="fleet-lines">
                <p>Ship type: {{$fleetLine->shipType->name}}</p>
                <p>Quantity: {{$fleetLine->quantity}}</p>
                <input id="shipsQuantity" type="number" class="form-control" min="1" max="{{$fleetLine->quantity}}" name="shipsQuantity{{$fleetLine->shipType->id}}" value="{{$quantity[$fleetLine->shipType->id - 1]}}" required autofocus>
            </div>
        @endforeach
        <p>Select the planet where you want to go!</p>
        <label>Solar System</label>
        <input id="shipsQuantity" type="number" class="form-control" name="solarSystem" min="1" max="{{$maxSolarSystem}}" value="" required autofocus>
        <label>Planet Position</label>
        <input id="shipsQuantity" type="number" class="form-control" name="planetPos" min="1" max="15" value="" required autofocus>
        <p>Create Travel?</p>
        <button type="submit" class="btn btn-primary light-blue darken-3">Create Travel</button>
        <div class="cancel-button"><a href="{{route('fleet', $planet)}}">CANCEL TRAVEL</a></div>
    </form>
</div>
@endsection
