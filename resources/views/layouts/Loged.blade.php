<!doctype html>
  <html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
      <meta charset="UTF-8" />
      <meta name="viewport" content="width=device-width, initial-scale=1.0" />
      <meta http-equiv="X-UA-Compatible" content="ie=edge" />
      <title>Proyecto Vinculacion - Inicio</title>
    
      <!-- <title>Proyecto Vinculacion - Inicio</title> -->
      <link
        rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.8.0/css/bulma.min.css"
        integrity="sha256-D9M5yrVDqFlla7nlELDaYZIpXfFWDytQtiV+TaH6F1I="
        crossorigin="anonymous"
      />
      <link
        rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.min.css"
        integrity="sha256-+N4/V/SbAFiW1MPBCXnfnP9QSN3+Keu+NlB+0ev/YKQ="
        crossorigin="anonymous"
        />
      <link rel="stylesheet" href="css/style.css" />
      <!-- CSRF Token -->
      <meta name="csrf-token" content="{{ csrf_token() }}">
      <link rel="dns-prefetch" href="//fonts.gstatic.com">
      <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    </head>
    <body>
      <nav class="navbar is-fixed-top box-shadow-y">
        <div class="navbar-brand">
          <span aria-hidden="true"></span>
          <span aria-hidden="true"></span>
          <span aria-hidden="true"></span>
            <a href="#" class="navbar-item has-text-weight-bold has-text-black">
              Proyecto vinculacion
            </a>
            <a
              role="button"
              class="navbar-burger nav-toggler"
              aria-label="menu"
              aria-expanded="false"
              >
                <span aria-hidden="true"></span>
                <span aria-hidden="true"></span>
                <span aria-hidden="true"></span>
            </a>
            </div>
            
            <div class="navbar-menu has-background-white">
              <div class="navbar-start">
                <a href="#" class="navbar-item">
                  <i class="fas fa-home icon"></i> Inicio
                </a>
                <a href="#" class="navbar-item"></a>
              
              <div class="navbar-item has-dropdown is-hoverable has-background-white">
                <a href="#" class="navbar-link">
                  Informacion
                </a>
                <div class="navbar-dropdown is-right">        
                  <a href="#" class="navbar-item">
                    Residencias profesionales
                  </a>
                  <a href="#" class="navbar-item">
                    Preguntas Frecuentes
                  </a>
                  <a href="#" class="navbar-item">Contacto</a>
                </div>
              </div>
            </div>
            <div class="navbar-end">
              <div class="navbar-item has-dropdown is-hoverable">
                <a href="#" class="navbar-link">
                  Cuenta
                </a>
                <div class="navbar-dropdown is-right">
                  @foreach($permisos as $permiso)
                    @if($permiso->id_funcion==1)
                      <a class="navbar-item" href="{{ route('register') }}">Ver Perfil</a>
                    @endif
                    @if($permiso->id_funcion==2)
                      <a class="navbar-item" href="{{ route('register') }}">Editar Perfil</a>
                    @endif
                  @endforeach 
                  <hr class="navbar-divider" />        
                  <a class="navbar-item" href="{{ route('logout') }}"onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                    {{ __('Cerrar Sesión') }}
                  </a>
                  <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                  </form>      
                </div>
              </div>
            </div>
          </div>
        </nav>
        <main class="py-4">
            @yield('content')
            
        </main>
        
    </div>
    <script
      src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"
      integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
      crossorigin="anonymous"
    ></script>
    <script src="./js/script.js"></script>
</body>
<footer class="footer">
  <div class="content has-text-centered">
    <p>
      <strong>Proyecto vinculacion</strong>  <br>
      Instituto tecnologico de morelia
      <a href="http://www.itmorelia.edu.mx/">ITM</a>. Tecnologico nacional de méxico <a href="https://www.tecnm.mx/">TecNM</a>. <br>por <a href="https://www.linkedin.com/in/isacc-carranza-404599157/">Fernando I. Carranza</a>.
    </p>
  </div>
</footer>
</html>
