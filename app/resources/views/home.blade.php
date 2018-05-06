@extends('app')

@section('content')
    <div id="home" class="container card">
        <h4>Attack Notifications</h4>
        @if (count($notifies) > 0)
            @foreach ($notifies as $notify)
                <p>{{$notify->desc}}</p>
                <a class="delete-notify" href="{{route('delete-notify', [$notify])}}">Delete Notify</a>
            @endforeach
        @else
            <p>Your planets haven't been attacked</p>
        @endif
        <h4>Select planet to manage...</h4>
        <div id="table-container" class="data">
            <table>
                <tr>
                    <th>Name</th>
                    <th>Solar System</th>
                    <th>Position</th>
                </tr>
                @foreach ($userPlanets as $planet)
                        <tr>
                            <td><a href="{{route('planet', $planet)}}">{{$planet->name}}</a></td>
                            <td><a href="{{route('planet', $planet)}}">{{$planet->solar_system}}</a></td>
                            <td><a href="{{route('planet', $planet)}}">{{$planet->position}}</a></td>
                        </tr>
                @endforeach
            </table>
        </div>
    </div>
@endsection
