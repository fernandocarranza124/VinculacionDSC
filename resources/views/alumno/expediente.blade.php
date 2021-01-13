@extends('layouts.alumno')

@section('title', 'Residencias profesionales')

@section('content')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<div class="body-container animated fadeIn">
    <div class="container-fluid">
        @php
        $desactivado="background-color: gray;";
        $alerta="background-color: orange;";
        $modificaciones="";
        $apertura=$desactivado;
        $asesor=$desactivado;
        $aprobados=$desactivado;
        $intermedio=$desactivado;
        $final=$desactivado;
        switch ($expediente->estatus) {
            case '1':
            case '2':
                $apertura="";
                $asesor=$desactivado;
                $aprobados=$desactivado;
                $intermedio=$desactivado;
                $final=$desactivado;
                break;
            case '3':
                $apertura="";
                $asesor="";
                $aprobados=$desactivado;
                $intermedio=$desactivado;
                $final=$desactivado;
                break;
            case '4':
                $apertura="";
                $asesor="";
                $aprobados="";
                $intermedio=$desactivado;
                $final=$desactivado;
                break;
            case '5':
                $apertura="";
                $asesor="";
                $aprobados=$alerta;
                $intermedio=$desactivado;
                $final=$desactivado;
                $modificaciones="con modificaciones";
                break;
            case '6':
                
                break;
            
            default:
                # code...
                break;
        }
        @endphp
        <br>
        {{-- Barra de progeso --}}
        <div class="col-sm-12 col-sm-offset-0">
            <div class="panel panel-default" >
                <div class="panel-body text-center vacante" style="height: fit-content; padding-bottom: 0px;">
                    <div class="col-12 justify-content-center align-self-center">
                        <div class="progeso-panel">
                            <div class="progeso-row setup-panel">
                                <div class="progeso-nodo">
                                    <a href="#step-9" type="button" class="btn btn-indigo btn-circle" style="{{$apertura}}"><i class="fa fa-folder-open fa-lg" aria-hidden="true"></i></a>
                                    <p>Apertura de <br> expediente</p>
                                </div>
                                <div class="progeso-nodo">
                                    <a href="#step-13" type="button" class="btn btn-default btn-circle" style="{{$asesor}}">
                                        <i class="fa fa-user fa-lg" aria-hidden="true"></i>
                                    </a>
                                    <p>Asesor<br>asignado</p>
                                </div>
                                <div class="progeso-nodo">
                                    <a href="#step-10" type="button" class="btn btn-default btn-circle" style="{{$aprobados}}">
                                        <i class="fa fa-file-archive fa-lg" aria-hidden="true"></i>
                                    </a>
                                    <p>Documentos <br>aprobados<br>{{$modificaciones}}</p>
                                </div>
                                <div class="progeso-nodo">
                                    <a href="#step-11" type="button" class="btn btn-default btn-circle" style="{{$intermedio}}">
                                        <i class="fa fa-book fa-lg" aria-hidden="true"></i>
                                    </a>
                                    <p>Informe <br>intermedio</p>
                                </div>
                                <div class="progeso-nodo">
                                    <a href="#" type="button" class="btn btn-default btn-circle" style="{{$final}}">
                                        <i class="fa fa-book fa-lg" aria-hidden="true"></i>
                                    </a>
                                    <p>Informe <br>final</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>        
            </div>
        </div>
    @if ($expediente->Nube == null)
        <div class="col-sm-12 col-sm-offset-0">
            <div class="panel panel-default" >
                <div class="panel-body text-center vacante" style="height: fit-content; padding-bottom: 0px;">
                    <div class="col-12 justify-content-center align-self-center">
                        <div class="progeso-panel">
                            <h5><strong> Favor de crear una carpeta compartida en la nube e ingresar el enlace a la misma. </strong></h5>
                            <form action="{{route('alumno.expediente.carpeta')}}" method="post" accept-charset="utf-8">
                              @csrf
                              <div class="form-group label-floating">
                                <input type="hidden" name="idExpediente" id="idcarpetaNube" class="form-control" value="{{$expediente->id}}">
                                <label for="carpetaNube" class="control-label">Enlace a la carpeta compartida en la nube</label> 
                                <input type="url" name="carpetaNube" id="carpetaNube" class="form-control">
                                <button type="submit" class="btn btn-primary btn-raised btn-sm">Guardar</button>
                              </div>
                            
                            </form>
                        </div>
                    </div>
                </div>        
            </div>
        </div>
        <br>
        @endif


        {{-- Tabulador por seccion --}}
        <div id="exTab1" class="container-fluid"> 
            <ul  class="nav nav-pills" style="background: white;">
                <li class="active">
                    <a  href="#InformacionGeneral" data-toggle="tab">Informacion general</a>
                </li>
                <li>
                    <a href="#Documentos" data-toggle="tab">Documentos</a>
                </li>
                <li>
                    <a href="#Comentarios" data-toggle="tab">Comentarios</a>
                </li>
            </ul>    
        </div>
        {{-- Cuerpo primer tabulador --}}
        <div class="panel-body text-center " style="height: fit-content; padding-bottom: 0px;">
            <div class="tab-content clearfix">
                <div class="tab-pane active " id="InformacionGeneral">
                    {{-- Tarjeta de informacion general --}}
                    <div class="col-md-3 col-sm-4" style="padding-left: 0px; padding-right: 0px;">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h3 class="panel-title text-center">
                                    Información general
                                </h3>
                            </div>
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-sm-12 text-center">
                                        <img src="https://morelia.tecsge.com/img/user.svg" alt="Foto de perfil" class="img-responsive img-thumbnail">
                                    </div>
                                </div> 
                                <br> 
                                <div class="row">
                                    <div class="col-sm-12" style="text-align: left; ">
                                        <ul class="simple">
                                            <li>
                                                <small class="text-muted">Nombre:</small> <span>{{$expediente->nombreAlumno}}</span>
                                            </li>  
                                            <li>
                                                <small class="text-muted">Apellido paterno:</small> <span>{{$expediente->apellidoPaternoAlumno}}</span>
                                            </li> 
                                            <li>
                                                <small class="text-muted">Apellido materno:</small> <span>{{$expediente->apellidoMaternoAlumno}}</span>
                                            </li> 
                                            <li>
                                                <small class="text-muted">Nº de control:</small> <span>{{$expediente->noControlAlumno}}</span>
                                            </li> 
                                            <li>
                                                <small class="text-muted">Carrera / Reticula:</small> <span>{{$expediente->nombreCarrera}}</span>
                                            </li>
                                            <li><small class="text-muted">Especialidad: </small> <span>SIC13 / Arquitectura Web (2019-1)</span>
                                            </li>
                                            <li><small class="text-muted">Sexo:</small> <span>{{$expediente->sexoAlumno}} </span>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>  

                    {{-- Tarjetas unidas apiladas --}}
                    <div class="col-md-9 col-sm-8" style="text-align: left; ">
                        {{-- Tarjeta de Datos de proeycto --}}
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h3 class="panel-title">
                                    Datos de proyecto
                                </h3>
                            </div> 
                            <div class="panel-body">
                                <ul class="simple">
                                    <li>
                                        <small class="text-muted">Nombre:</small> <span>{{$expediente->nombreProyecto}}  </span>
                                    </li> 
                                @if ($expediente->Nube != null)
                                    <li>
                                        <small class="text-muted">Carpeta en la nube:</small> <span> <a href="{{$expediente->Nube}}"  target="_blank">DropBox/{{$expediente->nombreProyecto}} </a>   </span>
                                    </li> 
                                @endif
                                    <li><small class="text-muted">Fecha de inicio:</small> <span>{{$expediente->fechaInicio}}</span>
                                    </li> 
                                    <li><small class="text-muted">Fecha terminacion:</small> <span>{{$expediente->fechaFinaliza}}</span>
                                    </li> 
                                    <li><small class="text-muted">Asesor interno:</small> <span>{{$expediente->nombreProfesor}} {{$expediente->apellidoPaternoProfesor}} {{$expediente->apellidoMaternoProfesor}}</span>
                                    </li> 
                                    <li>
                                        <small class="text-muted">Asesor externo:</small> <span>{{$expediente->asesorExterno}}</span>
                                    </li> 
                                    <li><small class="text-muted">Plan de estudios:</small> <span>ISIC-2010-224       </span>
                                    </li>
                                    <li><small class="text-muted">Teléfono:</small> <span>{{$expediente->telefonoAlumno}}</span>
                                    </li> 
                                    <li>
                                        <small class="text-muted">Correo electrónico:</small> <span>{{$expediente->correoAlumno}}</span>
                                    </li>
                                    <li>
                                        <small class="text-muted">Correo electrónico tecnm: </small> <span> {{$expediente->correoTecNMAlumno}}                                                                            </span>
                                    </li> 
                                </ul>
                            </div>
                        </div>
                        {{-- Tarjeta de Informacion de contacto a la empresa --}}
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h3 class="panel-title">
                                Informacion de contacto con la empresa</h3>
                            </div>
                            <div class="panel-body">
                                <ul class="simple">
                                    <li><small class="text-muted">Empresa:</small> <span>{{$expediente->nombreEmpresa}}</span>
                                    </li> 
                                    <li><small class="text-muted">Correo electrónico:</small> <span>{{$expediente->telefonoEmpresa}}</span>
                                    </li> 
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="tab-pane " id="Documentos">
                    <div class="col-md-4 col-sm-4" style="">
                        <div class="panel panel-default panel-documentos" style="overflow-y: scroll;" >
                            <div class="panel-heading pendientes" style="">
                                <h3 class="panel-title text-center">
                                    Pendientes por subir
                                </h3>
                            </div>
                            <div class="panel-body">
                                <div>
                                @foreach ($documentosPendiente as $documento)
                                    <div class="row">
                                    <div class="col-sm-12">
                                        <div class="row" style="box-shadow: inset 0 -5px 0 rgba(153, 153, 153, 0.2);">
                                            <div class="col-sm-3 col-xs-3 col-md-4 col-lg-2" >
                                                <img src="../img/pdfDocumentos.png" class="iconPDF" >
                                            </div>
                                            <div class="col-sm-9 col-xs-8 col-md-8 col-lg-4" >
                                                <p  class="text-left" style="font-size: 1.5rem;">{{$documento->documento}}</p>
                                            </div>
                                            <div class="col-sm-12 col-xs-12 col-md-12 col-lg-6 padding-sides-none" >
                                                <form action="{{route('alumno.expediente.documento.subir')}}" method="post" accept-charset="utf-8" onsubmit="window.open('{{$expediente->Nube}}');">
                                                @csrf    
                                                    <button type="submit" class="btn btn-primary btn-raised btn-sm" style="width: 100%;">Subir archivo </button> 
                                                    <input type="hidden" name="idExpediente" id="idcarpetaNube" class="form-control" value="{{$expediente->id}}">
                                                    <input type="hidden" name="idDocumento"  class="form-control" value="{{$documento->id}}">
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div> 
                                @endforeach
                                
                                
                                </div>
                            </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-4" style="">
                    <div class="panel panel-default panel-documentos">
                        <div class="panel-heading revision" >
                            <h3 class="panel-title text-center">
                                En proceso de revision
                            </h3>
                        </div>
                        <div class="panel-body">
                            @foreach ($documentosRevision as $documento)
                                    <div class="row">
                                    <div class="col-sm-12">
                                        <div class="row" style="box-shadow: inset 0 -5px 0 rgba(153, 153, 153, 0.2);">
                                            <div class="col-sm-3 col-xs-3 col-md-4 col-lg-2" >
                                                <img src="../img/pdfDocumentos.png" class="iconPDF" >
                                            </div>
                                            <div class="col-sm-9 col-xs-8 col-md-8 col-lg-4" >
                                                <p  class="text-left" style="font-size: 1.5rem;">{{$documento->documento}}</p>
                                            </div>
                                            <div class="col-sm-12 col-xs-12 col-md-12 col-lg-6 padding-sides-none" >
                                                <a href="{{$expediente->Nube}}" name="file" id="file" class="btn btn-primary btn-raised btn-sm" target="_blank">Ver archivo</a>
                                            </div>
                                        </div>
                                    </div>
                                </div> 
                                @endforeach
                            <br> 
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-4" >
                    <div class="panel panel-default panel-documentos">
                        <div class="panel-heading aprobados" >
                            <h3 class="panel-title text-center">
                                Documentos aprobados
                            </h3>
                        </div>
                        <div class="panel-body">
                            @foreach ($documentosAutorizado as $documento)
                                    <div class="row">
                                    <div class="col-sm-12">
                                        <div class="row" style="box-shadow: inset 0 -5px 0 rgba(153, 153, 153, 0.2);">
                                            <div class="col-sm-3 col-xs-3 col-md-4 col-lg-2" >
                                                <img src="../img/pdfDocumentos.png" class="iconPDF" >
                                            </div>
                                            <div class="col-sm-9 col-xs-8 col-md-8 col-lg-4" >
                                                <p  class="text-left" style="font-size: 1.5rem;">{{$documento->documento}}</p>
                                            </div>
                                            
                                        </div>
                                    </div>
                                </div> 
                                @endforeach
                        </div>
                    </div>
                </div>
            </div>
            <div class="tab-pane" id="Comentarios">
                    <div class="container-fluid" style="overflow-y: scroll;">
                        <div class="row">
                            <div class="col-md-8">
                                <div class="panel panel-default panel-documentos" style="overflow-y: scroll;    overflow-x: hidden;">
                                    <div class="panel-heading aprobados" >
                                        <h3 class="panel-title text-center">
                                            Comentarios
                                        </h3>
                                    </div>
                                    <div class="panel-body" >
                                        <div class="row">
                                            <div class="col-sm-12 text-left">
                                                @forelse($comentarios as $comentario)
                                                    <div class="row" style="    border-bottom: 0.1rem solid gray;">
                                                        <div class="row">
                                                            <div class="col-sm-1">

                                                            </div>
                                                            <div class="col-sm-6">
                                                                <h4>{{$comentario->autor}}</h4>
                                                                <small style="color: gray;"><i>{{$comentario->cargo}}</i></small>
                                                            </div>
                                                            <div class="col-sm-5">
                                                                @if ($comentario->documento==0)
                                                                    <h6 class="text-muted">Documento citado: ninguno</h6>
                                                                @else
                                                                    <h6>Documento citado: {{$comentario->nombreDocumento}}
                                                         </h6>
                                                                @endif
                                                                <small style="color: gray;">Fecha de creacion: <i>{{$comentario->created_at}}</i></small>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-sm-1">

                                                            </div>
                                                            <div class="col-sm-11">

                                                                <p>{{$comentario->comentario}}</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @empty
                                                    <h4>No hay comentarios </h4>
                                                @endforelse
                                            </div>
                                        </div> 
                                        <br> 
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="panel panel-default panel-documentos">
                                    <div class="panel-heading aprobados" >
                                        <h3 class="panel-title text-center">
                                            Agregar nuevo comentario
                                        </h3>
                                    </div>
                                    <div class="panel-body">
                                        <form action="{{route('alumno.expediente.comentar')}}" method="post" accept-charset="utf-8">
                                            @csrf

                                            <div class="container-fluid">
                                                <div class="col-sm-12 text-left">
                                                    <div class="row">
                                                        <h4>{{$usuario->nombre}} {{$usuario->apellidoPaterno}} {{$usuario->apellidoMaterno}}</h4>
                                                        <input type="numeric" name="expediente" value="{{$expediente->id}}" hidden="">
                                                        <small style="color: gray;"><i>Residente</i></small>
                                                    </div>

                                                    <div class="row text-left">
                                                        <div class="col-sm-6 text-left">
                                                            <h5>Citar documento: </h5>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <select name="menuDocumentos" id="menuDocumentos" class="" style="width: 100%; margin-top: 1rem;"  >
                                                                <option value="null" selected="" > ---- </option>
                                                                @foreach ($documentosRegistrados as $documento)
                                                                <option value="{{$documento->id}}">{{$documento->nombre}}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div> 
                                            <br> 

                                            <div class="row">
                                                <div class="col-sm-12 text-left">
                                                    <h4>Comentario: </h4>
                                                    <textarea style="width: 100%; resize: none;" class='autoExpand' rows='3' data-min-rows='3' placeholder='Ingrese comentario' name="comentario"></textarea>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-6 text-left">
                                                </div>
                                                <div class="col-sm-6 text-right">
                                                    <button class="btn btn-primary btn-raised btn-sm" type="submit">Comentar</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        </div>
    </div>
            {{-- </div>
            </div> --}}
        </div>
    </div>
    <script type="text/javascript">
        (function() {

          'use strict';

          $('.input-file').each(function() {
            var $input = $(this),
            $label = $input.next('.js-labelFile'),
            labelVal = $label.html();

            $input.on('change', function(element) {
              var fileName = '';
              if (element.target.value) fileName = element.target.value.split('\\').pop();
              fileName ? $label.addClass('has-file').find('.js-fileName').html(fileName) : $label.removeClass('has-file').html(labelVal);
          });
        });

      })();
  </script>

  @endsection