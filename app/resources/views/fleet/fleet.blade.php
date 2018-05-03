@extends('app')

@section('content')
<div id="fleet" class="container card">
    @if (count($fleetLines) == 0)
        <p>You don't have ships on this planet!</p>
    @else
        <form class="form-horizontal" method="POST" action="{{route('travel-chose-planet', $planet)}}">
            {{ csrf_field() }}
            @foreach ($fleetLines as $fleetLine)
                <div class="fleet-lines">
                    <p>Ship type: {{$fleetLine->shipType->name}}</p>
                    <p>Quantity: {{$fleetLine->quantity}}</p>
                    <input id="shipsQuantity" type="number" class="form-control" max="{{$fleetLine->quantity}}" name="shipsQuantity{{$fleetLine->shipType->id}}" value="0" required autofocus>
                </div>
            @endforeach
            <button type="submit" class="btn btn-primary light-blue darken-3">Create Travel</button>
        </form>
    @endif
</div>
@endsection
