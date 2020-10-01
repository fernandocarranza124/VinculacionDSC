@extends('layouts.JefeVinculacion')

@section('title', 'Jefe de Proyecto Vinculacion')

@section('content')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<div class="body-container animated fadeIn">
    <div class="container-fluid">
        <br>
        {{-- Barra de progeso --}}
        <div class="col-sm-12 col-sm-offset-0">
            <div class="panel panel-default" >
                <div class="panel-body text-center vacante" style="height: fit-content; padding-bottom: 0px;">
                    <div class="col-12 justify-content-center align-self-center">
                        <div class="progeso-panel">
                            <div class="progeso-row setup-panel">
                                <div class="progeso-nodo">
                                    <a href="#step-9" type="button" class="btn btn-indigo btn-circle"><i class="fa fa-folder-open fa-lg" aria-hidden="true"></i></a>
                                    <p>Apertura de <br> expediente</p>
                                </div>
                                <div class="progeso-nodo">
                                    <a href="#step-10" type="button" class="btn btn-default btn-circle">
                                        <i class="fa fa-file-archive fa-lg" aria-hidden="true"></i>
                                    </a>
                                    <p>Documentos <br>aprobados</p>
                                </div>
                                <div class="progeso-nodo">
                                    <a href="#step-11" type="button" class="btn btn-default btn-circle" >
                                        <i class="fa fa-book fa-lg" aria-hidden="true"></i>
                                    </a>
                                    <p>Informe intermedio</p>
                                </div>
                                <div class="progeso-nodo">
                                    <a href="#" type="button" class="btn btn-default btn-circle" >
                                        <i class="fa fa-book fa-lg" aria-hidden="true"></i>
                                    </a>
                                    <p>Informe final</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>        
            </div>
        </div>
        <br>
        {{-- Tabulador por seccion --}}
        <div id="exTab1" class="container-fluid"> 
            <ul  class="nav nav-pills" style="background: white;">
                <li class="active">
                    <a  href="#InformacionGeneral" data-toggle="tab">Informacion general</a>
                </li>
                <li>
                    <a href="#Seguimiento" data-toggle="tab">Seguimiento</a>
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
                <div class="tab-pane " id="InformacionGeneral">
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
                                                <small class="text-muted">Nombre:</small> <span>Fernando Isacc</span>
                                            </li>  
                                            <li>
                                                <small class="text-muted">Apellido paterno:</small> <span>Carranza</span>
                                            </li> 
                                            <li>
                                                <small class="text-muted">Apellido materno:</small> <span>Salazar</span>
                                            </li> 
                                            <li>
                                                <small class="text-muted">Nº de control:</small> <span>16121015</span>
                                            </li> 
                                            <li>
                                                <small class="text-muted">Carrera / Reticula:</small> <span>Ingenieria En Sistemas Computacionales / 2010</span>
                                            </li>
                                            <li><small class="text-muted">Especialidad: </small> <span>SIC13 / Arquitectura Web (2019-1)</span>
                                            </li>
                                            <li><small class="text-muted">Sexo:</small> <span> Masculino </span>
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
                                        <small class="text-muted">Nombre:</small> <span>16121015  </span>
                                    </li> 
                                    <li><small class="text-muted">Fecha de inicio:</small> <span>18/Julio/2020</span>
                                    </li> 
                                    <li><small class="text-muted">Fecha terminacion:</small> <span>15/Enero/2021</span>
                                    </li> 
                                    <li><small class="text-muted">Asesor interno:</small> <span>Aurelio Amaury Coria Ramirez</span>
                                    </li> 
                                    <li>
                                        <small class="text-muted">Asesor externo:</small> <span> Carol Aidee Martinez Rosiles </span>
                                    </li> 
                                    <li><small class="text-muted">Plan de estudios:</small> <span>ISIC-2010-224       </span>
                                    </li>
                                    <li><small class="text-muted">Teléfono:</small> <span>4431189253</span>
                                    </li> 
                                    <li>
                                        <small class="text-muted">Correo electrónico:</small> <span>fernandocarranza124@gmail.com</span>
                                    </li>
                                    <li>
                                        <small class="text-muted">Correo electrónico tecnm: </small> <span> 16121015@morelia.tecnm.mx                                                                            </span>
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
                                    <li><small class="text-muted">Empresa:</small> <span></span>
                                    </li> 
                                    <li><small class="text-muted">Correo electrónico:</small> <span></span>
                                    </li> 
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane" id="Seguimiento">
                    <h5>seguimiento</h5>
                </div>  
                <div class="tab-pane active" id="Documentos">
                    <div class="col-md-4 col-sm-4" style="">
                        <div class="panel panel-default panel-documentos" style="overflow-y: scroll;" >
                            <div class="panel-heading pendientes" style="">
                                <h3 class="panel-title text-center">
                                    Pendientes por subir
                                </h3>
                            </div>
                            <div class="panel-body">
                                <div>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="row" style="box-shadow: inset 0 -5px 0 rgba(153, 153, 153, 0.2);">
                                            <div class="col-sm-4 col-xs-3 col-md-4 col-lg-2" >
                                                <img src="img/pdfDocumentos.png" class="iconPDF" >
                                            </div>
                                            <div class="col-sm-8 col-xs-8 col-md-8 col-lg-4" >
                                                <p  class="text-left" style="font-size: 1.5rem;">Solicitud de residencias</p>
                                            </div>
                                            <div class="col-sm-12 col-xs-12 col-md-12 col-lg-6 padding-sides-none" >
                                                <input type="file" name="file" id="file" class="input-file" accept="application/pdf">
                                                <label for="file" class="inputBorder btn btn-default js-labelFile btn-block padding-sides-none " style="
                                                    border-right: 1px #ababab solid;
                                                    border-left: 1px #ababab solid;
                                                    border-top: 1px #ababab solid;
                                                    border-bottom: 1px #ababab solid;">
                                                <span class="js-fileName">Subir archivo</span>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div> 
                                <div class="row">
                                    <br>
                                    <div class="col-sm-12">
                                        <div class="row" style="box-shadow: inset 0 -5px 0 rgba(153, 153, 153, 0.2);">
                                            <div class="col-sm-4 col-xs-3 col-md-4 col-lg-2" >
                                                <img src="img/pdfDocumentos.png" class="iconPDF">
                                            </div>
                                            <div class="col-sm-8 col-xs-8 col-md-8 col-lg-4" >
                                                <p  class="text-left" style="font-size: 1.5rem;">Bosquejo</p>
                                            </div>
                                            <div class="col-sm-12 col-xs-12 col-md-12 col-lg-6 padding-sides-none" >
                                                <input type="file" name="file" id="file" class="input-file" accept="application/pdf">
                                                <label for="file" class="btn btn-default js-labelFile btn-block padding-sides-none" style="
                                                border-right: 1px #ababab solid;
                                                border-left: 1px #ababab solid;
                                                border-top: 1px #ababab solid;
                                                ">
                                                <span class="js-fileName">Subir archivo</span>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div> 
                                <div class="row">
                                    <br>
                                    <div class="col-sm-12">
                                        <div class="row" style="box-shadow: inset 0 -5px 0 rgba(153, 153, 153, 0.2);">
                                            <div class="col-sm-4 col-xs-3 col-md-4 col-lg-2" >
                                                <img src="img/pdfDocumentos.png" class="iconPDF">
                                            </div>
                                            <div class="col-sm-8 col-xs-8 col-md-8 col-lg-4" >
                                                <p  class="text-left" style="font-size: 1.5rem;">Carta de liberacion de servicio social</p>
                                            </div>
                                            <div class="col-sm-12 col-xs-12 col-md-12 col-lg-6 padding-sides-none" >
                                                <input type="file" name="file" id="file" class="input-file" accept="application/pdf">
                                                <label for="file" class="btn btn-default js-labelFile btn-block padding-sides-none" style="
                                                border-right: 1px #ababab solid;
                                                border-left: 1px #ababab solid;
                                                border-top: 1px #ababab solid;
                                                ">
                                                <span class="js-fileName">Subir archivo</span>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div> 
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
                            <div class="row">
                                <div class="col-sm-12 text-left">

                                </div>
                            </div> 
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
                            <div class="row">
                                <div class="col-sm-12 text-center">

                                </div>
                            </div> 
                            <br> 
                        </div>
                    </div>
                </div>
            </div>
            <div class="tab-pane" id="Comentarios">
                <h3>We use css to change the background color of the content to be equal to the tab</h3>
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