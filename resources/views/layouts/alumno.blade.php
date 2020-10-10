<html>
    <head>
        <title>RP - @yield('title')</title>
    
        <meta charset="utf-8">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta name="robots" content="noindex">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0">
        <meta name="csrf-token" content="RbyrPE1mjVDnv0ye6pKdYR9LbrZYHsG6qTre5i0n">
        <!-- Fonts -->
        <script
      src="https://use.fontawesome.com/releases/v5.14.0/js/all.js"
      data-search-pseudo-elements
    ></script>
        <link rel="stylesheet" type="text/css" href="{{ URL::asset('css/estilosPropios.css') }}">
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="{{ URL::asset('css/bootstrap.css') }}" >
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.0/animate.min.css">
         <script src="{{ asset('js/app.js') }}" defer></script>

        <!-- Styles -->
    
    </head>
    <body class="antialiased">
        <div class="dashboard-page" id="main-container">
            <nav class="navbar navbar-default navbar-fixed-top" id="main-navbar">
                <div class="container-fluid">
                    <div class="navbar-header">
                        <a class="navbar-brand hidden-sm hidden-md hidden-lg" href="#">
                            Alumno
                        </a>
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#collapse-menu-1" aria-expanded="false" id="menu-collapse">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                    </div>
                    <div class="collapse navbar-collapse hidden-xs" id="collapse-menu-1">
                        <ul class="nav navbar-nav navbar-right">
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle navbar-text" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                    Alumno - {{$usuario->nombre}} {{$usuario->apellidoPaterno}} {{$usuario->apellidoMaterno}}
                                    <img src="https://morelia.tecsge.com/img/user.svg" alt="Usuario" class="img-navbar">
                                </a>
                                <ul class="dropdown-menu">
                                    <li>
                                         <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Cerrar sesion') }}
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
            <aside class="sidebar in" id="main-sidebar" role="navigation">
                <div class="sidebar-logo">
                    <img src="https://morelia.tecsge.com/img/sge_white.png" alt="Logo" class="img-logo">
                        IT Morelia
                </div>
                <div class="sidebar-outer">
                    <div class="side-menu">
                        <div class="item">
                            <a href="{{route('alumno.home')}}" class="item-dropdown">
                                <i class="fa  fa-chevron-circle-right ">
                                </i>
                                Inicio
                            </a>
                        </div>
                        <div class="item">
                            <a href="{{route('alumno.vacantes')}}" class="item-dropdown">
                                <i class="fa  fa-book "></i>
                                Vacantes
                            </a>
                        </div>
                        <div class="item">
                            <a href="https://morelia.tecsge.com/alumnos/cursos/principal" class="item-dropdown">
                                <i class="fa  fa-folder "></i>
                                Residencias profesionales
                            </a>
                        </div>
                    </div>
                </div>
            </aside>

            <div class="container">
            @yield('content')
        </div>
    </body>
</html>