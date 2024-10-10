<header>
    <nav class="navbar navbar-expand-md navbar-dark bg-dark shadow-sm">
        <div class="container-fluid">
            <a class="navbar-brand d-flex align-items-center" href="{{ url('/') }}">
                <div class="logo">
                    <img src="{{ asset('img/github.jpg') }}" alt="Logo">
                </div>
            </a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="{{ __('Toggle navigation') }}">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Left Side Of Navbar -->
                <div id="sidebar" class="bg-dark p-3">
                    <ul class="navbar-nav me-auto text-white">
                        <li class="nav-item">
                            <a class="nav-link text-white" href="{{ url('/') }}">{{ __('Home') }}</a>
                        </li>
                    </ul> <!-- Aggiunta la chiusura ul qui -->
                </div>

                <!-- Right Side Of Navbar -->
                <ul class="navbar-nav ms-auto">
                    @guest
                        <li class="nav-item">
                            <a class="nav-link text-light" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                        @if (Route::has('register'))
                            <li class="nav-item">
                                <a class="nav-link text-light" href="{{ route('register') }}">{{ __('Register') }}</a>
                            </li>
                        @endif
                    @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle text-light" href="#" role="button"
                                data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }}
                            </a>

                            <div class="dropdown-menu dropdown-menu-end bg-dark" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item text-light"
                                    href="{{ route('admin.dashboard') }}">{{ __('Dashboard') }}</a>
                                <a class="dropdown-item text-light" href="{{ url('profile') }}">{{ __('Profile') }}</a>
                                <a class="dropdown-item text-light" href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    @endguest
                </ul>
            </div>
        </div>
    </nav>
</header>
