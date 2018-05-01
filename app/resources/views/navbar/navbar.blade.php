<nav class="nav-extended light-blue darken-3">
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

        <ul class="right hide-on-med-and-down">
            @guest
                <li><a href="{{ route('login') }}">Login</a></li>
                <li><a href="{{ route('register') }}">Register</a></li>
            @else
                <li>
                    <a class="logout"
                        href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">
                            {{ Auth::user()->name }} Logout <i class="material-icons">clear</i>
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        {{ csrf_field() }}
                    </form>
                </li>
            @endguest
        </ul>
    </div>

    @auth
        <div class="nav-content light-blue darken-3">
            <div class="nav-items">
                <div><a href="{{route('app')}}">Home</a></div>
                <div><a href="{{route('galaxy')}}">Galaxy</a></div>
                <div><a href="{{route('hangar', $planet)}}">Hangar</a></div>
                <div><a href="{{route('fleet', $planet)}}">Fleet</a></div>
                <div><a href="{{route('resources', $planet)}}">Resources</a></div>
            </div>
        </div>
    @endauth

</nav>
