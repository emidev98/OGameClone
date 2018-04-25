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
    <div class="nav-content light-blue darken-3">
        <div class="center">
            <div><a href="{{ route('travels')}}">Travels</a></div>
            <div><a href="{{ route('hangar')}}">Hangar</a></div>
            <div><a href="{{ route('fleet')}}">Fleet</a></div>
            <div><a href="{{ route('resources')}}">Resources</a></div>
        </div>
    </div>
</nav>
