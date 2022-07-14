<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Social Media Metatags -->
    <meta property="og:site_name" content="Hogwarts House Competition">
    <meta property="og:title" content="Hogwarts House Competition">
    <meta property="og:description" content="To help you get ready for your first year here, we’ve compiled a list of people and places you should know and visit. Your classes will go so much smoother if you learn your way around now.">
    @if(request()->has('house'))
        <meta property="og:image" content="{{ asset('/img/dashboard/team' . request()->get("house") .'.png') }}">
    @endif
    <meta property="og:url" content="{{ env('APP_URL') }}">
    <meta name="twitter:card" content="summary_large_image">

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Vidaloka" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <style>
        .score-digit{
            background-image: url({{ asset('/img/dashboard/score-digit.png') }});
            background-size: contain;
            background-repeat: no-repeat;
            border-radius: 19px;
            box-shadow: 1px 2px 2px black;
            display: inline-block;
            font-family: 'Vidaloka', serif;
            font-size: 28px;
            height: 38px;
            line-height: 28px;
            margin-left: 2px;
            margin-right: 2px;
            padding: 6px;
            text-align: center;
            width: 38px;
        }
        .navbar-light .navbar-brand{
            color: #ffffff;
            font-weight: bold;
        }
        .navbar-light .navbar-brand:hover{
            color: #cccccc;
        }
        .navbar-light .nav-item{
            color: #ffffff;
        }
        .card, .list-group-item{
            border-radius: 0px !important;
        }
    </style>
    @stack('styles')
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light navbar-laravel" style="background-color: @if(auth()->check() && auth()->user()->team) {{ auth()->user()->team->color  }} @else #000000 @endif;">
            <div class="container">
                <a class="navbar-brand" href="{{ env('APP_URL') }}/">
                    {{ config('app.name', 'Laravel') }}
                </a>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            {{--<li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                            </li>--}}
                        @else
                            <li class="nav-item dropdown">
                                {{--<a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>--}}

                                {{--<div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>--}}
                            </li>
                        @endguest

                    </ul>
                </div>
                @if(auth()->check() && auth()->user()->team)
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('coupon') }}" style="color: #ffffff; font-weight: bold;">{{ __('Coupon') }}</a>
                        </li>
                        <li class="nav-item">
                            @foreach(str_split(auth()->user()->points) as $digit)
                                <span class="score-digit">{{ $digit }}</span>
                            @endforeach
                                <img src="{{ asset('/img/dashboard/team' . auth()->user()->team->id . '.png') }}" style="height: 50px; margin-top: -12px; margin-left: 10px; width: auto;">
                        </li>
                    </ul>
                @else
                    <ul class="navbar-nav" v-if="questions">
                        <li class="nav-item">
                            Question
                            <span id="current">1</span> / <span id="total"></span>
                        </li>
                    </ul>
                @endif
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    @stack('scripts')
</body>
</html>
