@extends('app')

@section('content')
  <div id="home" class="container card">
    <div class="row">
      <h5 class="col l12 center-align">Select a planet to manage it!</h5>
    </div>
    <div class="planet-properties-title">
      <p>Name</p>
      <p>Solar System</p>
      <p>Position</p>
    </div>
    <ul>
      @foreach ($userPlanets as $planet)
        <li>
          <a href="{{route('home-view', $planet)}}">
            <div class="planet-properties">
              <span class="planet-property">{{$planet->name}}</span>
              <span class="planet-property">{{$planet->solar_system}}</span>
              <span class="planet-property">{{$planet->position}}</span>
            </div>
          </a>
        </li>
      @endforeach
    </ul>
  </div>
@endsection
