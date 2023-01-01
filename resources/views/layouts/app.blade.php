<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <title>Hotel Ligne</title>
</head>
<style scoped>
.app .navbar-brand span:first-child{
    font-weight: bold;
    font-size: 30px;
    color: red;

}
.app .navbar-brand span:last-child{
    font-size: 30px;
    color: white;
}
.app .nav-item .nav-link{
    background-color: tomato;
    border-radius: 0.25em;
    margin: 1px;

}
a{
    color: white;
}
.app .bg-blue{
    background-color: blue;
}

</style>
<body>
    <div class="app">
        <nav class="navbar navbar-expand-md  shadow-sm bg-blue  ">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    <span>Hotel</span>
                    <span>Ligne</span>
                </a>

                            <!-- Right Side Of Navbar -->
                            <ul class="navbar-nav ml-auto">
                                <!-- Authentication Links -->
                                @guest
                                    <li class="nav-item">
                                        <a class="nav-link  " href="{{ route('login') }}">{{ __('Login') }}</a>
                                    </li>
                                    @if (Route::has('register'))
                                        <li class="nav-item">
                                            <a class="nav-link  " href="{{ route('register') }}">{{ __('Register') }}</a>
                                        </li>
                                    @endif
                                @else
                                    <li class="nav-item dropdown">
                                        <a id="navbarDropdown" class="nav-link dropdown-toggle " href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                            <i class="fas fa-user"></i>{{ Auth::user()->name }}
                                        </a>

                                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                            <a class="dropdown-item" href="{{ route('logout') }}"
                                                onclick="event.preventDefault();
                                                        document.getElementById('logout-form').submit();">
                                                <i class="fas fa-sign-out-alt"></i>{{ __('Logout') }}
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
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>
        <script src="{{ asset('js/jquery.min.js') }}"></script>
        <script src="{{ asset('js/popper.min.js') }}"></script>
        <script src="{{ asset('js/bootstrap.min.js') }}"></script>

</html>
