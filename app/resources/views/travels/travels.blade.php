@extends('home')

@section('inner-content')
<ul>
@foreach ($planets as $planet)
    <!--<li><a href="{{route('travels-show', $planet)}}">{{$planet}}</a></li>-->
    <li><a href="{{route('make-travel', $planet)}}">{{$planet}}</a></li>
@endforeach
</ul>

@endsection
