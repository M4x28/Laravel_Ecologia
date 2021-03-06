<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" />

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/mdb.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/personal.css?v=') . time() }}" rel="stylesheet">

    <!-- MapBox -->
    <script src='https://api.mapbox.com/mapbox-gl-js/v2.3.1/mapbox-gl.js'></script>
    <link href='https://api.mapbox.com/mapbox-gl-js/v2.3.1/mapbox-gl.css' rel='stylesheet' />
</head>

<body @yield('body')>
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="
        crossorigin="anonymous"></script>


    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light shadow-5-strong">
        <!-- Container wrapper -->
        <div class="container">
            <!-- Navbar brand -->
            <a class="navbar-brand text-success" href="{{ url('/home') }}">Ecologia</a>

            <!-- Toggle button -->
            <button class="navbar-toggler" type="button" data-mdb-toggle="collapse"
                data-mdb-target="#navbarButtonsExample" aria-controls="navbarButtonsExample" aria-expanded="false"
                aria-label="Toggle navigation">
                <i class="fas fa-bars"></i>
            </button>

            <!-- Collapsible wrapper -->
            <div class="collapse navbar-collapse" id="navbarButtonsExample">
                <!-- Left links -->
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/home') }}">Home</a>
                    </li>

                    <!-- Dropdown -->
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                            data-mdb-toggle="dropdown" aria-expanded="false">
                            {{ __('Cities') }}
                        </a>
                        <!-- Dropdown menu -->
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            @foreach ($comuni_aderenti as $comune)
                                <li>
                                    <a class="dropdown-item"
                                        href="{{ route('comune.show', ['comune' => $comune->comune]) }}">
                                        {{ $comune->comune }}
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </li>
                </ul>
                <!-- Left links -->

                <div class="d-flex align-items-center pr-2">
                    <h5>Visite</h5>
                    <div id="sfcmu1jx497g7gdkmd91cu7t3udlfpasjtu"></div>
                    <script type="text/javascript"
                                        src="https://counter9.stat.ovh/private/counter.js?c=mu1jx497g7gdkmd91cu7t3udlfpasjtu&down=async"
                                        async></script><noscript><a href="https://www.contatoreaccessi.com" title="contatore"><img
                                src="https://counter9.stat.ovh/private/contatoreaccessi.php?c=mu1jx497g7gdkmd91cu7t3udlfpasjtu"
                                border="0" title="contatore" alt="contatore"></a></noscript>
                </div>

                <div></div>
                <div class="d-flex align-items-center">
                    @auth
                        <a id="navbarDropdown" class="nav-link" href="{{ route('home.create') }}" role="button"
                            data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }}
                        </a>
                    @else
                        <a href="{{ route('login') }}" class="btn btn-link px-3 me-2">{{ __('Login') }}</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="btn btn-primary me-3">{{ __('Register') }}</a>
                        @endif
                    @endauth
                </div>


                <!-- Icon dropdown -->
                <li class="nav-item dropdown" style="list-style-type: none;">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                        data-mdb-toggle="dropdown" aria-expanded="false">
                        <i class="{{ Config::get('languages')[App::getLocale()]['flag-icon'] }} flag"></i>
                        {{ Config::get('languages')[App::getLocale()]['display'] }}
                    </a>

                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        @foreach (Config::get('languages') as $lang => $language)
                            @if ($lang != App::getLocale())
                                <hr class="dropdown-divider" />
                                <li>
                                    <a class="dropdown-item" href="{{ route('lang.switch', $lang) }}">
                                        <i class="{{ $language['flag-icon'] }} flag"></i>
                                        {{ $language['display'] }}
                                    </a>
                                </li>
                            @endif
                        @endforeach
                    </ul>
                </li>
            </div>
            <!-- Collapsible wrapper -->
        </div>
        <!-- Container wrapper -->
    </nav>
    <!-- Navbar -->

    @yield('content')


    @yield('scripts')
    <!-- Scripts -->
    <script src="{{ asset('js/mdb.min.js') }}"></script>
</body>

</html>
