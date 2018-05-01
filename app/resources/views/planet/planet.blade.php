@extends('app')
@section('content')
<div id="planet" class="container card">
    <div class="nav">
        <div><a href="{{route('hangar', $planet)}}">Hangar</a></div>
        <div><a href="{{route('fleet', $planet)}}">Fleet</a></div>
    </div>

    {{$planet}}
</div>
@endsection
