<nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
    <div class="container">
        <a class="navbar-brand" href="{{ url('/home') }}">
            {{ config('app.name', 'Laravel') }}
        </a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->
            <ul class="navbar-nav me-auto">
                <li class="nav-item">
                    <a class="nav-link">
                        Home
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route ('jobEdit') }}">
                        Update Job
                    </a>
                </li>
                @if(Auth::check())
                @if(Auth::user()->role==1)
                <li class="nav-item">
                    <a class="nav-link" href="{{route('admin-dashboard', ['name'=>Auth::user()->name])}}">
                        Admin Dashboard
                    </a>
                </li>
                @elseif(Auth::user()->role==0)
                <li class="nav-item">
                    <a class="nav-link" href="{{route('doer-dashboard', ['id'=>Auth::user()->id])}}">
                        Your Dashboard
                    </a>
                </li>
                @endif
                @else
                <li class="nav-item">
                    <a class="nav-link" href="{{route('login')}}" disabled>
                        Dashboard
                    </a>
                </li>
                @endif
            </ul>
            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ms-auto">
                <!-- Authentication Links -->
                @guest
                @if (Route::has('login'))
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                </li>
                @endif

                @if (Route::has('register'))
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                </li>
                @endif
                @else
                <li class="nav-item dropdown">
                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        {{ Auth::user()->name }}
                    </a>

                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{ route('logout-route') }}" onclick="event.preventDefault();
                                            document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout-route') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </div>
                </li>
                @endguest
            </ul>
        </div>
    </div>
</nav>