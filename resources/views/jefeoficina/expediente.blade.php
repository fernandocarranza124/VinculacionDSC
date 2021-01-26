@extends('layouts.JefeVinculacion')

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
            // Apertura de expediente
            case '1':
            case '2':
            $apertura="";
            $asesor=$desactivado;
            $aprobados=$desactivado;
            $intermedio=$desactivado;
            $final=$desactivado;
            break;
            // Asesor asignado
            case '3':
            $apertura="";
            $asesor="";
            $aprobados=$desactivado;
            $intermedio=$desactivado;
            $final=$desactivado;
            break;
            // Documentos aprobados
            case '4':
            $apertura="";
            $asesor="";
            $aprobados="";
            $intermedio=$desactivado;
            $final=$desactivado;
            break;
            // Documentos aprobados con modificaciones
            case '5':
            case '6':
            case '7':
            case '8':
            $apertura="";
            $asesor="";
            $aprobados=$alerta;
            $intermedio=$desactivado;
            $final=$desactivado;
            $modificaciones="con modificaciones";
            break;
            // Reporte intermedio con modificaciones
            case '9':
            $apertura="";
            $asesor="";
            $aprobados="";
            $intermedio=$alerta;
            $final=$desactivado;
            break;
            // Reporte intermedio aprobado
            case '10':
            $apertura="";
            $asesor="";
            $aprobados="";
            $intermedio="";
            $final=$desactivado;
            break;
            // Reporte final aprobado
            case '11':
            $apertura="";
            $asesor="";
            $aprobados="";
            $intermedio="";
            $final="";
            break;
            // Reporte final aprobado con modificaciones
            case '12':
            $apertura="";
            $asesor="";
            $aprobados="";
            $intermedio="";
            $final=$alerta;
            break;
            // Residencias finalizadas
            case '13':
            $apertura="";
            $asesor="";
            $aprobados="";
            $intermedio="";
            $final="";
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
        <br>
        @if ($expediente->Nube != null)
        <div class="col-sm-12 col-sm-offset-0">
            <div class="panel panel-default" >
                <div class="panel-body text-center vacante" style="height: fit-content; padding-bottom: 0px;">
                    <div class="col-12 justify-content-center align-self-center">
                        <div class="progeso-panel">
                            <h5><strong> Si el alumno ya cumplió subiendo los archivos correspondientes a la fase actual, es posible actualizar el estado de su expediente. </strong></h5>
                            <form action="{{route('jefeoficina.expediente.estatus.actualizar')}}" method="post" accept-charset="utf-8">
                              @csrf
                              <div class="form-group label-floating">
                                <input type="hidden" name="idExpediente" id="idcarpetaNube" class="form-control" value="{{$expediente->id}}">
                                <label for="carpetaNube" class="control-label">Seleccione la etapa en la que se encuentra el expediente</label> 
                                <select id="menufases" class="selectpicker form-control" data-live-search="true" name="menufases" >
                                        <option value="null" selected=""  disabled="">Selecciona para actualizar estado </option>
                                        <option value="1"><strong>Apertura de expediente</strong></option>
                                        <option value="3">Asesor asignado</option>
                                        <option value="4">Documentos aprobados</option>
                                        <option value="5">Documentos aprobados con modificaciones</option>
                                        <option value="10">Reporte intermedio aprobado</option>
                                        <option value="9">Reporte intermedio aprobado con modificaciones</option>
                                        <option value="11">Informe final aprobado</option>
                                        <option value="12">Informe final aprobado con modificaciones</option>
                                        <option value="13">Residencias profesionales finalizadas</option>
                                    </select>
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
                <li>
                    <a href="#Registro" data-toggle="tab">Registro</a>
                </li>
                @if ($expediente->asesorInterno == null)
                <li>
                    <a href="#Asignar" data-toggle="tab">
                        Asignar asesor interno 
                        <span class="badge badge-primary" style="background-color: #ffcc00;">
                            <i class="fa fa-bell" aria-hidden="true"></i>
                        </span>
                    </a>
                </li>
                @else

                @endif
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
                                            <li><small class="text-muted">Especialidad: </small> <span></span>
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
                    <div class="row">
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
                                                <div class="col-sm-3 col-xs-3 col-md-4 col-lg-3" >
                                                    <img src="../../../img/pdfDocumentos.png" class="iconPDF" >
                                                </div>
                                                <div class="col-sm-9 col-xs-8 col-md-8 col-lg-9" >
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
                                                    <img src="../../../img/pdfDocumentos.png" class="iconPDF" >
                                                </div>
                                                <div class="col-sm-9 col-xs-8 col-md-8 col-lg-6" >
                                                    <p  class="text-left" style="font-size: 1.5rem;">{{$documento->documento}}</p>
                                                </div>
                                                <div class="col-sm-12 col-xs-12 col-md-12 col-lg-4 padding-sides-none" >
                                                    <a href="{{$expediente->Nube}}" name="file" id="file" class="btn btn-info btn-raised btn-sm" target="_blank" style="width: 100%;">Ver</a>
                                                    <form action="{{route('jefeoficina.expediente.documento.aprobar')}}" method="post" accept-charset="utf-8">
                                                        @csrf    
                                                        <button type="submit" class="btn btn-primary btn-raised btn-sm" style="width: 100%;">Aprobar</a> </button> 
                                                        <input type="hidden" name="idExpediente" id="idcarpetaNube" class="form-control" value="{{$expediente->id}}">
                                                        <input type="hidden" name="idDocumento"  class="form-control" value="{{$documento->id}}">   
                                                    </form>
                                                    
                                                    
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
                                                    <img src="../../../img/pdfDocumentos.png" class="iconPDF" >
                                                </div>
                                                <div class="col-sm-9 col-xs-8 col-md-8 col-lg-6" >
                                                    <p  class="text-left" style="font-size: 1.5rem;">{{$documento->documento}}</p>
                                                </div>
                                                <div class="col-sm-12 col-xs-12 col-md-12 col-lg-4 padding-sides-none" >
                                                    <a href="{{$expediente->Nube}}" name="file" id="file" class="btn btn-info btn-raised btn-sm" target="_blank" style="width: 100%;">Ver</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div> 
                                    @endforeach
                            </div>
                        </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 col-sm-12" style="">
                            <div class="panel panel-default panel-documentos" style="overflow-y: scroll;" >
                                <div class="panel-heading pendientes" style="">
                                    <h3 class="panel-title text-center">
                                        Generar documentos
                                    </h3>
                                </div>
                                <div class="panel-body">
                                    <div>
                                        <h4>A continuacion se muestran los documentos que se pueden generar
                                            <br><br>
                                        <small>Una vez seleccionado, inserte los datos correspondientes para la creacion del archivo</small>
                                        </h4>
                                        <form action="{{route('jefeoficina.generar.documento')}}" method="post" accept-charset="utf-8">
                                            @csrf
                                            
                                            
                                        
                                    
                                    <input type="hidden" name="idExpediente" value="{{$expediente->id}}">
                                    @if ($expediente->idProfesor != null)

                                        <select id="menuGenerar" class="selectpicker form-control" data-live-search="true" name="menuGenerar" onchange="cambiarCampos()">
                                        <option value="null" selected=""  disabled="">Selecciona un documento </option>
                                        <option value="1"><strong>Carta de presentacion del estudiante</strong></option>
                                        <option value="2">Carta de asignacion de asesor interno</option>
                                        <option value="3">Revision de informe</option>
                                        <option value="4">Constancia de cumplimiento</option>
                                        <option value="5">Carta de acreditacion de residencia profesional</option>
                                    </select>

                                    @else
                                        <h5>Aún no se ha asignado un asesor interno, favor de asignaro para evitar inconsistencias en los documentos</h5>
                                    @endif
                                    <div class="col-sm-12" id="agregarCampos">
                                        
                                    </div>
                                    </form>
                                    <script type="text/javascript" charset="utf-8">
                                           function cambiarCampos() {
                                               var selectInput = document.getElementById('menuGenerar');
                                               // alert(selectInput.options[selectInput.selectedIndex].text);
                                               var div = document.getElementById('agregarCampos');
                                               // <div class="form-group label-floating">
                                               var formControl = document.createElement('div')
                                                formControl.setAttribute('class', "form-group label-floating");


                                               var l = document.createElement("label"); //input element, text
                                                l.setAttribute('for',"idFolio");
                                                l.setAttribute('class',"control-label");
                                                var text = document.createTextNode("Ingresa el folio que se mostrará en el documento generado");
                                                l.appendChild(text);

                                               var i = document.createElement("input"); //input element, text
                                                i.setAttribute('type',"text");
                                                i.setAttribute('name',"idFolio"); 
                                                i.setAttribute('id',"idFolio"); 
                                                i.setAttribute('class',"form-control");
                                               
                                               var button = document.createElement("input");
                                                button.setAttribute('type', "submit");
                                                button.setAttribute('class', "btn btn-primary btn-raised btn-sm");
                                                while(div.firstChild){
                                                    div.removeChild(div.firstChild)
                                                }

                                               formControl.appendChild(l);
                                               formControl.appendChild(i);
                                               div.appendChild(formControl);
                                               div.appendChild(button);

                                           }
                                    </script>
                                    
                                    
                                    </div>
                                </div>
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
                                                     <div class="text-right">
                                                        <form action="{{route('jefeoficina.expediente.comentario.eliminar')}}" method="post" accept-charset="utf-8">
                                                        @csrf    
                                                            <input type="hidden" name="idExpediente" value="{{$expediente->id}}" >
                                                            <input type="hidden" name="idComentario" value="{{$comentario->id}}" >
                                                            <button type="submit" class="btn btn-danger btn-raised btn-sm">
                                                            <i class="fa fa-trash" aria-hidden="true"></i>
                                                        </button>    
                                                        </form>
                                                        
                                                    </div>
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
                                <form action="{{route('jefeoficina.expediente.comentar')}}" method="post" accept-charset="utf-8">
                                    @csrf

                                    <div class="container-fluid">
                                        <div class="col-sm-12 text-left">
                                            <div class="row">
                                                <h4>{{$usuario->nombre}} {{$usuario->apellidoPaterno}} {{$usuario->apellidoMaterno}}</h4>
                                                <input type="numeric" name="expediente" value="{{$expediente->id}}" hidden="">
                                                <small style="color: gray;"><i>Asesor interno</i></small>
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
        <div class="tab-pane" id="Registro">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">
                    Registro de actividad</h3>
                </div>
                <div class="panel-body">
                    <ul class="simple">
                            <div class="row ">
                                <div class="col-sm-12">
                                    <h4 class="text-muted">Registros: </h4>
                                    <p class="text-muted">Ordenados por mas reciente</p> 
                                    <div class="overflow-auto" style="border: solid black 0.1rem;">
                                        <div class="list-group">
                                            <div class="row" >
                                                @foreach ($registros as $registro)
                                                    <div class="row" >
                                                    <div class="col-sm-6" >
                                                        <h4>{{$registro->nombreEstado}}</h4>
                                                        <small style="color: gray;"><i>Prioridad: {{$registro->prioridad}}</i></small>
                                                    </div>
                                                    <div class="col-sm-5">
                                                        <small style="color: gray;">Fecha de creacion: <i>{{$registro->created_at}}</i></small>
                                                        <div class="text-right">
                                                            {{-- <a href="" class="btn btn-danger btn-raised btn-sm">
                                                                <i class="fa fa-trash" aria-hidden="true"></i>
                                                            </a> --}}
                                                        </div>
                                                    </div>

                                                </div>
                                                @endforeach
                                                
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </li> 
                    </ul>
                </div>
            </div>
        </div>
        <div class="tab-pane" id="Asignar">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">
                    Profesores</h3>
                </div>
                <div class="panel-body">
                    <ul class="simple">
                        <li>
                            <div class="row ">
                                <div class="col-sm-12">
                                    <h4 class="text-muted">Buscar profesor: </h4>
                                    <p class="text-muted">Puede buscarse por nombre o por numero de control</p> 
                                    <form action="{{route('jefeoficina.expediente.asignarAsesor')}}" method="post" accept-charset="utf-8">
                                        @csrf
                                        
                                        <div class="form-group" style="">

                                            <select id="menuDocumentos" class="selectpicker form-control" data-live-search="true" name="menuProfesores" onchange="boton()">
                                                <option value="null" selected="" disabled="" >Seleccionar asesor</option>
                                                
                                                @foreach ($profesores as $profesor)
                                                <option data-tokens="{{$profesor->noControl}}" value="{{$profesor->id}}"  >{{$profesor->nombre}} {{$profesor->apellidoPaterno}} {{$profesor->apellidoMaterno}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div id="botonPoP">
                                            <button type="submit" class="btn btn-primary btn-raised btn-lg" disabled="" id="asignar" data-toggle="tooltip" data-placement="bottom" title="Primero selecciona un profesor">Asignar asesor</button>
                                        </div>
                                        <div style="display: none;">
                                            <input type="text" name="idExpediente" value="{{$expediente->id}}" hidden="">
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </li> 
                    </ul>
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
        $('#menuDocumentos').change(function() {
            $('#asignar').focus();
            $('#asignar').tooltip('disable');
            $('#asignar').prop( "disabled", false );
        });
        function boton() {
            document.getElementById('asignar').disabled=false;
            document.getElementById('asignar').focus=true;
            console.log("si")
        }


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
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/css/bootstrap-select.min.css">
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/js/bootstrap.bundle.min.js"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/js/bootstrap-select.min.js"></script>


  @endsection