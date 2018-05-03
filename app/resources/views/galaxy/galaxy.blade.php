@extends('app')

@section('content')
<div id="travels" class="container card">
    <div id="table-container" class="data">
      <table>
          <tr>
              <th>Name</th>
              <th>Position</th>
              <th>User Name</th>
          </tr>
          @foreach ($planets as $planet)
          <tr>
              <td><a href="{{route('planet', $planet)}}">{{$planet->name}}</a></td>
              <td><a href="{{route('planet', $planet)}}">{{$planet->position}}</a></td>
              <td><a href="{{route('planet', $planet)}}">{{$planet->getNotNullUser()->name}}</a></td>
          </tr>
          @endforeach
      </table>
    </div>
</div>
@endsection
