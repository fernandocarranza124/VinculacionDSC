<!DOCTYPE html>
<html>
<head>
    <title>RP - Inicio @yield('title')</title>
    
    <meta charset="utf-8">
    <meta name="robots" content="noindex">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0">
    <meta name="csrf-token" content="RbyrPE1mjVDnv0ye6pKdYR9LbrZYHsG6qTre5i0n">
    <!-- Fonts -->
    <script
    src="https://use.fontawesome.com/releases/v5.14.0/js/all.js"
    data-search-pseudo-elements
    ></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="css/estilosPropios.css">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.0/animate.min.css">

    <!-- Styles -->
    
</head>
<body>
    <div id="main-container" class="container-fluid single-page">
        <div class="middle-panel-login">
            <div class="row">
                <div class="col-sm-6 col-sm-offset-3">
                    <div class="row">
                        <div class="col-sm-2 col-sm-offset-5 col-xs-4 col-xs-offset-4">
                            <img src="https://morelia.tecsge.com/img/sge_white.png" alt="SGE" class="img-responsive">
                        </div>
                    </div> 
                    <br> 
                    <div class="panel panel-default">
                        <div class="panel-heading image text-center">
                            <img src="https://morelia.tecsge.com/img/tnm.png" alt="Logo Tec" class="img-heading hidden-xs"> 
                            <h3 class="panel-title">
                                Instituto Tecnológico de Morelia
                            </h3> 
                            <img src="https://morelia.tecsge.com/storage/data/tec/zpHB68Mn9ybbH7l9JuRsVwOpxeDW25rmC5cMVEeQ.png" alt="Logo Tec" class="img-heading hidden-xs">
                        </div> 
                        <div class="panel-body">
                            <p class="text-center">Bienvenido al Sistema de Gestión de Residencias profesionales, por favor selecciona la opción de acuerdo a tus actividades.
                            </p> 
                            <br> 
                            <div id="exTab1" class="container-fluid center" style="margin-left: 5rem;"> 
                                <ul  class="nav nav-pills" style="background: white;">
                                    <li class="active">
                                        <a  href="#Inicio" data-toggle="tab">Inicio</a>
                                    </li>
                                    <li>
                                        <a href="#Alumno" data-toggle="tab">Alumno</a>
                                    </li>
                                    <li>
                                        <a href="#Profesor" data-toggle="tab">Profesor</a>
                                    </li>
                                    <li>
                                        <a href="#Jefe" data-toggle="tab">Jefe de oficina Vinculacion</a>
                                    </li>
                                </ul>    
                            </div>

                            <div class="panel-body text-center " style="height: fit-content; padding-bottom: 0px;">
                                <div class="tab-content clearfix">
                                    <div class="tab-pane active" id="Inicio">
                                        @if ($error = $errors->first('password'))
                                                      <div class="alert alert-danger">
                                                        {{ $error }}
                                                      </div>
                                        @endif
                                        <h3>Cuentas registradas:</h3>
                                        <strong>Jefe de oficina Vinculacion: </strong><p>Numero de control:03030303 Contraseña:3030</p>
                                        <strong>Alumno: </strong>
                                            <p>Numero de control:16121001 Contraseña:erick</p>
                                            <p>Numero de control:16121015 Contraseña:3434</p>
                                            <p>Numero de control:16121068 Contraseña:daniela</p>
                                            <p>Numero de control:14269845 Contraseña:alejandro</p>
                                        <strong>Profesor: </strong>
                                            <p>Numero de control:01010101 Contraseña:123456789</p>
                                            <p>Numero de control:12345678 Contraseña:rogelio</p>
                                            <p>Numero de control:123123123 Contraseña:alcaraz</p>
                                            <p>Numero de control:456456456 Contraseña:carol</p>


                                    </div>
                                    <div class="tab-pane" id="Jefe">
                                        <h5>Jefe de oficina</h5>
                                        <div class="row">
                                            <form method="POST" action="{{ route('jefeoficina.login.submit') }}">
                                                @csrf
                                                <div class="col-sm-10 col-sm-offset-1">
                                                    @if ($error = $errors->first('password'))
                                                      <div class="alert alert-danger">
                                                        {{ $error }}
                                                      </div>
                                                    @endif
                                                    <div class="form-group label-floating">
                                                        <label for="ncontrol" class="control-label">Número de control</label> 
                                                        <input id="noControl" type="text" class="form-control @error('noControl') is-invalid @enderror" name="noControl" value="{{ old('noControl') }}" required autocomplete="noControl">
                                                    </div> 
                                                    <div class="form-group label-floating">
                                                        <label for="password" class="control-label">Contraseña</label> 
                                                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                                                    </div>
                                                </div>
                                                <button type="submit" class="btn btn-primary btn-raised btn-sm"><i class="fa fa-sign-in"></i> Acceder</button>
                                            </form>
                                        </div>
                                    </div>  
                                    <div class="tab-pane" id="Alumno">
                                        <h5>Alumno</h5>
                                        <div class="row">
                                            <form method="POST" action="{{ route('login') }}">
                                                @csrf
                                                <div class="col-sm-10 col-sm-offset-1">
                                                    @if ($error = $errors->first('password'))
                                                      <div class="alert alert-danger">
                                                        {{ $error }}
                                                      </div>
                                                    @endif
                                                    <div class="form-group label-floating">
                                                        <label for="ncontrol" class="control-label">Número de control</label> 
                                                        <input id="noControl" type="text" class="form-control @error('noControl') is-invalid @enderror" name="noControl" value="{{ old('noControl') }}" required autocomplete="noControl">
                                                    </div> 
                                                    <div class="form-group label-floating">
                                                        <label for="password" class="control-label">Contraseña</label> 
                                                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                                                    </div>
                                                </div>
                                                <button type="submit" class="btn btn-primary btn-raised btn-sm"><i class="fa fa-sign-in"></i> Acceder</button>
                                            </form>
                                        </div>
                                    </div>
                                    <div class="tab-pane" id="Profesor">
                                        <h5>Profesor</h5>
                                        <div class="row">
                                            <form method="POST" action="{{ route('Profesor.login.submit') }}">
                                                @csrf
                                                <div class="col-sm-10 col-sm-offset-1">
                                                    @if ($error = $errors->first('password'))
                                                      <div class="alert alert-danger">
                                                        {{ $error }}
                                                      </div>
                                                    @endif
                                                    <div class="form-group label-floating">
                                                        <label for="ncontrol" class="control-label">Número de control</label> 
                                                        <input id="noControl" type="text" class="form-control @error('noControl') is-invalid @enderror" name="noControl" value="{{ old('noControl') }}" required autocomplete="noControl">
                                                    </div> 
                                                    <div class="form-group label-floating">
                                                        <label for="password" class="control-label">Contraseña</label> 
                                                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                                                    </div>
                                                </div>
                                                <button type="submit" class="btn btn-primary btn-raised btn-sm"><i class="fa fa-sign-in"></i> Acceder</button>
                                            </form>
                                        </div>
                                    </div>



                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="/js/app.js?id=a134990f66450c627594"></script>
    <div id="notify" class="notifxi-alert"></div>

</body>
</html>
