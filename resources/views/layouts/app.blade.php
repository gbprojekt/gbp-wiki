<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body class="bg-gray-200">
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-dark bg-dark shadow-sm">
            <div class="container">
                @guest
                    <a class="navbar-brand" href="{{ url('/') }}">
                        {{ config('app.name', 'GBP Wiki') }}
                    </a>
                @else
                    <a class="navbar-brand" href="{{ url('/home') }}">
                        {{ config('app.name', 'GBP Wiki') }}
                    </a>
                @endguest

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">

                        @guest
                            <li class="mx-1">
                                <a href="{{ url('/') }}" class="btn btn-light btn-outline-secondary">Home</a>
                            </li>
                        @else
                            <li class="mx-1">
                                <a href="{{ url('/home') }}" class="btn btn-light btn-outline-secondary">Home</a>
                            </li>
                        @endguest

                        @anygroup('money','admin')
                            <li class="mx-1">
                                <a href="{{ route('financeArea') }}" class="btn btn-light btn-outline-secondary">Finanzen</a>
                            </li>
                        @endanygroup

                        @anygroup('it','admin')
                            <li class="mx-1">
                                <a href="{{ route('itArea') }}" class="btn btn-light btn-outline-secondary">IT</a>
                            </li>
                        @endanygroup

                        @anygroup('business','admin')
                            <li class="mx-1">
                                <a href="{{ route('businessArea') }}" class="btn btn-light btn-outline-secondary">Business</a>
                            </li>
                        @endgroup

                        @anygroup('money','business','it','admin')
                            <li class="mx-1">
                                <a href="{{ route('aboutme') }}" class="btn btn-light btn-outline-secondary">About Me</a>
                            </li>
                        @endgroup

                        @group('admin')
                            <li class="mx-1">
                                <a href="{{ route('permissions.index') }}" class="btn btn-dark btn-outline-secondary">Berechtigungen</a>
                            </li>
                            <li class="mx-1">
                                <a href="{{ route('groups.index') }}" class="btn btn-dark btn-outline-secondary">Gruppen</a>
                            </li>
                            <li class="mx-1">
                                <a href="{{ route('users.index') }}" class="btn btn-dark btn-outline-secondary">Benutzer</a>
                            </li>
                        @endgroup

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest

                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
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
            @yield('content')
        </main>
    </div>
</body>
</html>
