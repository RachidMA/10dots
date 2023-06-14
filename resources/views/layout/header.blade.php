<nav class="navbar navbar-expand-md">
    <a class="logo navbar-brand" href="{{ url('/home') }}">
        <!-- <span class="material-symbols-outlined">grain</span> -->
        <div class="logo-image">
            <img src="/icons/logo-last.png" alt="Site Logo">
        </div>
    </a>

    @if(auth()->check())
    @if(auth()->user()->role==1)
    <li class="nav-item">
        <a href="{{route('admin-dashboard', ['name'=>auth()->user()->name])}}" class="nav-link pfimg">
            <img src="/images/{{Auth()->user()->profile_image ? Auth()->user()->profile_image : 'default.jpg'}}" alt="" class="image-profile">
        </a>
    </li>
    @elseif(auth()->user()->role==0)
    <li class="nav-item">
        <a href="{{route('doer-dashboard', ['id'=>auth()->user()->id])}}" class="nav-link pfimg">
            <img src="/images/{{Auth()->user()->profile_image ? Auth()->user()->profile_image : 'default.jpg'}}" alt="" class="image-profile">
        </a>
    </li>
    @endif
    @endif

    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
        <span class="material-symbols-outlined">menu</span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">

        <ul class="navbar-nav me-auto">

        </ul>

        <ul class="navbar-nav ms-auto">

            @if(Auth::check())
            <li class="nav-item">
                <a class="nav-link" href="{{ route('create-job')}}" style="font-weight: 700;">

                    Create Job
                </a>
            </li>
            @else
            <li class="nav-item">
                <a class="nav-link dash" href="{{ route('login', ['redirect' => route('create-job') ])}}">
                    Become A Doer
                </a>
            </li>
            @endif

            @if(Auth::check())
            @if(Auth::user()->role==1)
            <li class="nav-item">
                <a class="nav-link dash" href="{{route('admin-dashboard', ['name'=>Auth::user()->name])}}">
                    Admin Dashboard
                </a>
            </li>
            @elseif(Auth::user()->role==0)
            <li class="nav-item">
                <a class="nav-link dash" href="{{route('doer-dashboard', ['id'=>Auth::user()->id])}}">
                    Dashboard
                </a>
            </li>
            @endif
            @endif

            <!-- <li class="nav-item">
                <a class="nav-link dash" href="{{route('about-us')}}">
                    About Us
                </a>
            </li> -->

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
</nav>