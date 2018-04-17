@extends('app')

@section('content')
<div id="home" class="container card">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">

                <div class="panel-body">
                    <ul>
                      <li><a href="{{route('travels')}}">Travels</a></li>
                    </ul>
                </div>

            </div>
        </div>
    </div>
</div>
<div class="inner-content container card">
  @yield('inner-content')
</div>
@endsection
