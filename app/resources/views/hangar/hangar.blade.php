@extends('app')

@section('content')
<div id="hangar" class="container card">
  @if (!$planet->has_hangar)

    <div id="create-hangar-section">
        <small>*If you create an hangar you will be able to build your fleet. Then you can make travels to attack, spy, transport, colonize or deploy people on other planets.</small>
        <a class="btn btn-primary" href="{{route('create-hangar', $planet)}}">Create Hangar</a>
    </div>

  @else
    <div class="create-ships-section">
        <h4>Hangar</h4>
        <div class="data">
            @foreach ($shipTypes as $shipType)
            <div class="ships">
                <h5>Type: {{$shipType->name}}</h5>
                <div>HP: {{$shipType->hp}}</div>
                <div>Armor: {{$shipType->armor}}</div>
                <div>Attack Points: {{$shipType->attack_points}}</div>
                <div>Speed: {{$shipType->speed}}</div>
                <div>Capacity: {{$shipType->capacity}}</div>
                <div>Construct Time: {{$shipType->construct_time}}</div>
                <form class="form-horizontal" method="GET" action="{{route('create-ship', [$planet, $shipType])}}">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label for="quantity" class="control-label">Quantity</label>
                        <input id="quantity" type="number" min="1" class="form-control" name="quantity" value="1" required autofocus>
                        <button type="submit" class="btn btn-primary light-blue darken-3">Create Ship</button>
                    </div>
                </form>
            </div>
            @endforeach
        </div>
        <small>*You can create ships, this will we added automatically to the fleet of the planet, then in Fleet section you can add this ships to your own fleet in order to make travels.</small>
    </div>
  @endif
</div>
@endsection
