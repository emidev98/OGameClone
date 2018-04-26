@extends('app')

@section('content')
<div id="travels" class="container card">
  <div class="solar_system_selector_container">
    <p><b>Solar System:</b></p>
    <select class="solar_system_selector">
      <option value="" disabled selected>Select Solar System</option>
      @for ($i = 1; $i <= $maxSolarSystem; $i++)
        <option value="{{$i}}">{{$i}}</option>
      @endfor
    </select>
  </div>
  <table>
      <tr>
          <th>Name</th>
          <th>Position</th>
          <th>User Name</th>
      </tr>
      @foreach ($planets as $planet)
              <tr>
                  <td><a href="{{route('planet', $planet)}}">{{$planet->name}}</a></td>
                  <td><a href="{{route('planet', $planet)}}">{{$planet->solar_system}}</a></td>
                  <td><a href="{{route('planet', $planet)}}">{{$planet->position}}</a></td>
                  <td><a href="{{route('planet', $planet)}}">{{$planet->getNotNullUser()->name}}</a></td>
              </tr>
      @endforeach
  </table>
</div>
@endsection
