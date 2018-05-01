@extends('app')

@section('content')
<div id="hangar" class="container card">
  @if (!$planet->has_hangar)

    <div id="create-hangar-section">
      <p id="create-hangar-text"><b>If you create an hangar you will be able to build your fleet. Then you can make travels to attack, spy, transport, colonize or deploy people on other planets.</b></p>
      <div id="create-hangar-button">
        <a href="{{route('create-hangar', $planet)}}">Create Hangar</a>
      </div>
    </div>

  @else
    <div class="create-ships-section">
      <p>Now you can create your ships. They will we added automatically to the fleet of the planet, then in Fleet section you can add this ships to your own fleet in order to make travels.</p>

      @foreach ($shipTypes as $shipType)
        <div class="ships">
          <h5 class="ship_type">Type: {{$shipType->name}}</h5>
          <p>HP: {{$shipType->hp}}</p>
          <p>Armor: {{$shipType->armor}}</p>
          <p>Attack Points: {{$shipType->attack_points}}</p>
          <p>Speed: {{$shipType->speed}}</p>
          <p>Capacity: {{$shipType->capacity}}</p>
          <p>Construct Time: {{$shipType->construct_time}}</p>
          <form class="form-horizontal" method="GET" action="{{route('create-ship', [$planet, $shipType])}}">
            {{ csrf_field() }}
            <div class="form-group">
                <label for="quantity" class="col-md-4 control-label">E-Mail Address</label>

                <div class="col-md-6">
                    <input id="quantity" type="quantity" min="1" class="form-control" name="quantity" value="1" required autofocus>

                </div>
                <button type="submit" class="btn btn-primary light-blue darken-3">
                    Create Ship
                </button>
            </div>
          </form>
        </div>
      @endforeach

    </div>
  @endif
</div>
@endsection
