<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>
        <script src="{{ asset('js/script.js') }}" defer></script>

        <!-- Fonts -->
        <link rel="dns-prefetch" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    </head>
    <body>
        <div id="app" class="wrapper">
            @guest
            
            @else
            <nav id="sidebar">
                <div class="sidebar-header">
                    <h3>Laravel Eloquents</h3>
                    <strong>SB</strong>
                </div>

                <ul class="list-unstyled components">
                    <li>
                        <a href="/home">
                            <i class="glyphicon glyphicon-dashboard"></i>
                            Dashboard
                        </a>
                    </li>
                    <li>
                        <a href="/studentboard">
                            <i class="glyphicon glyphicon-user"></i>
                            Student board
                        </a>
                    </li>
                </ul>
            </nav>
            @endguest
            <main class="py-4" id="content">
                @guest
            
                @else
                <nav class="navbar navbar-default">
                    <div class="container-fluid">

                        <div class="navbar-header">
                            <ul class="nav navbar-nav navbar-right">
                                <li>
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </li>
                            </ul>

                        </div>

                    </div>
                </nav>
                @endguest
                @yield('content')
            </main>
            
        </div>
    </body>
</html>
