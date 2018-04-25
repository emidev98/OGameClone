<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    {!! MaterializeCSS::include_full() !!}

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'UGame') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav class="light-blue darken-3">
            <div class="nav-wrapper">
                <a class="brand-logo" href="{{ url('/') }}">
                    {{ config('app.name', 'UGame') }}
                </a>
                @auth
                    <div class="brand-logo center materials">
                        <div class="metal">
                            <div class="description">
                                <span class="name">Metal</span>
                                <span class="status">(No Data)</span>
                            </div>
                            <img src="{{ asset('img/minerals/metal.png') }}">
                        </div>
                        <div class="deuterium">
                            <div class="description">
                                <span class="name">Deuterium</span>
                                <span class="status">(No Data)</span>
                            </div>
                            <img src="{{ asset('img/minerals/deuterium.png') }}">
                        </div>
                        <div class="crystal">
                            <div class="description">
                                <span class="name">Crystal</span>
                                <span class="status">(No Data)</span>
                            </div>
                            <img src="{{ asset('img/minerals/crystal.png') }}">
                        </div>
                    </div>
                @endauth

                <ul id="nav-mobile" class="right hide-on-med-and-down">
                    @guest
                        <li><a href="{{ route('login') }}">Login</a></li>
                        <li><a href="{{ route('register') }}">Register</a></li>
                    @else
                        <li>
                            <a class="logout"
                                href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">
                                    {{ Auth::user()->name }} Logout <i class="material-icons">redo</i>
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                {{ csrf_field() }}
                            </form>
                        </li>
                    @endguest
                </ul>
            </div>
        </nav>
        <ul class="sidenav" id="mobile-demo">
            <li><a href="{{ route('travels')}}">Travels</a></li>
            <li><a href="{{ route('hangar')}}">Hangar</a></li>
            <li><a href="{{ route('fleets')}}">Fleet</a></li>
            <li><a href="{{ route('resources')}}">Resources</a></li>
        </ul>
        @yield('content')
    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
