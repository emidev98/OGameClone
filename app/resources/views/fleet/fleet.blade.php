@extends('app')

@section('content')
<div id="fleet" class="container card">
    @if (count($fleetLines) == 0)
        <p>You don't have ships on this planet!</p>
    @else
        @foreach ($fleetLines as $fleetLine)
            <div class="ships">
                <p>Ship type: {{$fleetLine->shipType->name}}</p>
                <p>Quantity: {{$fleetLine->quantity}}</p>
            </div>
        @endforeach

    @endif
</div>
@endsection
