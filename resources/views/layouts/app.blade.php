<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script type="text/javascript" src="{{asset('js/jquery-3.3.1.min.js')}}"></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('css/font-awesome.min.css') }}">

    @stack("styles")

    <script src="https://cdn.onesignal.com/sdks/OneSignalSDK.js" async=""></script>
    <script>
        var OneSignal = window.OneSignal || [];
        OneSignal.push(function() {
            OneSignal.init({
            appId: "ea6daa6c-0325-4bdb-ba01-e31adfcb60f4",
            });
        });
        </script>
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light navbar-laravel">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav nav-tabs mr-auto">
                        @auth 
                        <li class="nav-item">
                            <a class="nav-link {{Route::currentRouteName() != 'home' ?: 'active'}}"
                             href="{{ url('home') }}">@lang("messages.home")</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{Route::currentRouteName() != 'peliculas.index' ?: 'active'}}"
                             href="{{ url('peliculas') }}">@lang("messages.movies")</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{Route::currentRouteName() != 'generos.index' ?: 'active'}}"
                             href="{{ url('generos') }}">@lang("messages.genders")</a>
                        </li>
                        @role('admi')
                            <li class="nav-item">
                                <a class="nav-link {{Route::currentRouteName() != 'usuarios.index' ?: 'active'}}"
                                href="{{ url('usuarios') }}">@lang("messages.users")</a>
                            </li>
                        @endrole
                        <li class="nav-item">
                            <a class="nav-link {{Route::currentRouteName() != 'reportes.index' ?: 'active'}}"
                             href="{{ url('reportes') }}">@lang("messages.reports")</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{Route::currentRouteName() != 'actores.index' ?: 'active'}}"
                             href="{{ url('actores') }}">@lang("messages.actors")</a>
                        </li>
                        @role('admi')
                            <li class="nav-item">
                                <a class="nav-link {{Route::currentRouteName() != 'passport.index' ?: 'active'}}"
                                href="{{ url('passport') }}">Passport</a>
                            </li>
                        @endrole
                        @endauth
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                            </li>
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdownLanguages" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    @lang("messages.languages")
                                </a>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownLanguages">
                                    @foreach (Config::get('app.available_locale') as $lang)
                                        @if ($lang != \LaravelLocalization::getCurrentLocale())
                                            <a class="dropdown-item" href="{{ route('lang.switch', $lang) }}">@lang("languages.".$lang)</a>
                                        @endif
                                    @endforeach
                                </div>
                            </li>
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('settings') }}">
                                         @lang("messages.settings")
                                     </a>
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        @lang("messages.logout")
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
    @stack("scripts")
</body>
</html>
