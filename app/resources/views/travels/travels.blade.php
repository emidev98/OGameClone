@extends('app')
@section('content')
<div id="travel" class="container card">
    <form class="form-horizontal" method="POST" action="{{route('create-travel', $planet)}}">
        {{ csrf_field() }}
        @foreach ($planet->fleet->fleetLines as $fleetLine)
            <div class="fleet-lines">
                <p>Ship type: {{$fleetLine->shipType->name}}</p>
                <input id="shipsQuantity" type="number" class="form-control" min="1" max="{{$fleetLine->quantity}}" name="shipsQuantity{{$fleetLine->shipType->id}}" value="{{$quantity[$fleetLine->shipType->id - 1]}}" required autofocus>
            </div>
        @endforeach
        <label>Solar System</label>
        <input id="shipsQuantity" type="number" class="form-control" name="solarSystem" min="1" max="{{$maxSolarSystem}}" value="" required autofocus>
        <label>Planet Position</label>
        <input id="shipsQuantity" type="number" class="form-control" name="planetPos" min="1" max="15" value="" required autofocus>
        <button type="submit" class="btn btn-primary light-blue darken-3">Create Travel</button>
    </form>
</div>
@endsection
