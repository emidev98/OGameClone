@extends('app')
@section('content')
<div id="travel" class="container card">
    @if ($selectPlanet)
        <table>
            <tr>
                <th>Name</th>
                <th>Position</th>
                <th>User Name</th>
            </tr>
            @foreach ($planets as $planetItem)
                @if (($travel->type == 'attack' && ($planetItem->user != null && $planetItem->user->id != Auth::user()->id)) || ($travel->type == 'colonize' && $planetItem->getNotNullUser()->id != Auth::user()->id) || ($travel->type == 'transport' && ($planetItem->getNotNullUser()->id == Auth::user()->id && $planetItem->id != $travel->originPlanet->id)))
                    <tr>
                        <td><a href="{{route('planet', $planetItem)}}">{{$planetItem->name}}</a></td>
                        <td><a href="{{route('planet', $planetItem)}}">{{$planetItem->position}}</a></td>
                        <td><a href="{{route('planet', $planetItem)}}">{{$planetItem->getNotNullUser()->name}}</a></td>
                    </tr>
                @endif
            @endforeach
        </table>
    @else

    @endif
</div>
@endsection
