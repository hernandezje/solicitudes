<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<html>
  <script src="https://d3js.org/d3.v4.min.js"></script>
  <script src=
"https://cdn.jsdelivr.net/npm/billboard.js/dist/billboard.min.js"></script>
  <link
    rel="stylesheet"
    href=
"https://cdn.jsdelivr.net/npm/billboard.js/dist/billboard.min.css"
  />
  <link
    rel=
"https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css"
    type="text/css"
  />

  <script src=
"https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js">
  </script>
  <script src=
"https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js">
  </script>

  <script src=
"https://cdnjs.cloudflare.com/ajax/libs/Chart.js/1.0.1/Chart.min.js">
  </script>

  <link
      rel=
  "https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css"
      type="text/css"
    />
    <script src=
  "https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script
      src=
  "https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.min.js"
      type="text/javascript"
    ></script>
    <script src=
  "https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

    <script src=
  "https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.2.2/Chart.min.js"></script>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'HOME') }}</title>

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
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('DEP', 'HOME') }}
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">
                      @if(@Auth::user()->hasRole('responsable'))
                      <li class="nav-item">
                          <a class="nav-link" href="{{ route('requerimiento.index') }}">{{ __('Requerimiento') }}</a>
                      </li>
                      <li class="nav-item">
                          <a class="nav-link" href="{{ route('scrum.index') }}">{{ __('Tablero Scrum') }}</a>
                      </li>

                      <li class="nav-item">
                          <a class="nav-link" href="{{ route('reporte.index') }}">{{ __('Estadisticas') }}</a>
                      </li>
                      @endif
                      @if(@Auth::user()->hasRole('asistente'))
                      <li class="nav-item">
                          <a class="nav-link" href="{{ route('requerimiento.index') }}">{{ __('Requerimiento') }}</a>
                      </li>
                      <li class="nav-item">
                          <a class="nav-link" href="{{ route('scrum.index') }}">{{ __('Tablero Scrum') }}</a>
                      </li>

                      @endif
                      @if(@Auth::user()->hasRole('administrador'))

                      <li class="nav-item">
                          <a class="nav-link" href="{{ route('area.index') }}">{{ __('Area') }}</a>
                      </li>
                      <li class="nav-item">
                          <a class="nav-link" href="{{ route('puesto.index') }}">{{ __('Puesto') }}</a>
                      </li>
                      <li class="nav-item">
                          <a class="nav-link" href="{{ route('empleado.index') }}">{{ __('Empleado') }}</a>
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
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Salir') }}
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

        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>
</html>
