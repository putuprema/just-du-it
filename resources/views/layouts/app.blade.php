<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Just Du It!') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
<div id="app">
    <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm sticky-top">
        <div class="container">
            <a class="navbar-brand just-du-it-logo" href="{{ url('/') }}">
                {{ config('app.name', 'Just Du It!') }}
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="{{ __('Toggle navigation') }}">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Left Side Of Navbar -->
                <ul class="navbar-nav mr-auto">

                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="navbar-nav ml-auto">
                    <form class="form-inline my-3 my-md-0 mr-md-5" method="GET" action="/">
                        <div class="input-group">
                            <input type="text" placeholder="Search our collection..." class="form-control" name="search"
                                   value="{{ old("search") }}">
                            <div class="input-group-append">
                                <button class="btn btn-outline-primary" type="submit">Search</button>
                            </div>
                        </div>
                    </form>

                    <!-- Sidebar menu (only shown on navbar when on small screen) -->
                    <div class="sidebar-menu-on-navbar">
                        <a class="nav-item nav-link" href="{{ route("home") }}">View All Shoes</a>
                        @can("isMember")
                            <a class="nav-item nav-link" href="{{ route("cart.index") }}">View Cart</a>
                            <a class="nav-item nav-link" href="{{ route("user-transactions") }}">View Transactions</a>
                        @endcan
                        @can("isAdmin")
                            <a class="nav-item nav-link" href="{{ route('all-transactions') }}">View All
                                Transactions</a>
                            <a class="nav-item nav-link" href="{{ route("shoes.create") }}">Add Shoes</a>
                        @endcan
                    </div>

                    <!-- Authentication Links -->
                    @guest
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                        @if (Route::has('register'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                            </li>
                        @endif
                    @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                               data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->username }}
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}"
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

    <main>
        <div class="Sidebar">
            <a class="Sidebar__item" href="{{ route("home") }}">View All Shoes</a>
            @can("isMember")
                <a class="Sidebar__item" href="{{ route("cart.index") }}">View Cart</a>
                <a class="Sidebar__item" href="{{ route("user-transactions") }}">View Transactions</a>
            @endcan
            @can("isAdmin")
                <a class="Sidebar__item" href="{{ route('all-transactions') }}">View All Transactions</a>
                <a class="Sidebar__item" href="{{ route("shoes.create") }}">Add Shoes</a>
            @endcan
        </div>
        <div class="pt-5 pb-4 container">
            @yield('content')
        </div>
    </main>
</div>
</body>
</html>
