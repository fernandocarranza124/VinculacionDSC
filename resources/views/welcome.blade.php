@extends('layouts.JefeVinculacion')

@section('title', 'Jefe de Proyecto Vinculacion')

@section('content')
    <div class="body-container animated fadeIn"><div class="container-fluid">
            <br>
            <br>
            <div class="row">
                
            </div>
            <style type="text/css" media="screen">
    .vacante{
        border-left:10px solid #04c496;
    }
                
            </style>
            <div class="row">
                <div class="col-sm-3 col-sm-offset-1">
                    <div class="panel panel-default" >
                        <div class="panel-heading">
                            <h3 class="panel-title text-center">
                                Agile Development Design + Value
                            </h3>
                        </div>
                        <div class="panel-body text-center vacante">
                            <div class="row">
                                {{-- <div class="col-md-6 col-xs-12"> 
                                    <img class="test" src="img/residenciasEjemplo3.jpg" alt="">        
                                </div>--}}
                                <div class="col-12">
                                    <p>
                                        <span class="badge badge-secondary">Arquitectura web</span>
                                        <span class="badge badge-secondary">Ingenieria de software</span>
                                    </p>
                                </div>
                            </div>
                            
                            
                        </div>
                        <div class="panel-footer text-right">
                            <button type="submit" class="btn btn-primary btn-raised btn-sm">Ver</button>
                        </div>
                    </div>
                </div>
                <div class="col-sm-3 col-sm-offset-0">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title text-center">
                                Secretaria de Desarrollo Economico de Michoacan
                            </h3>
                        </div>
                        <div class="panel-body text-center vacante" >
                            <div class="row">
                                {{-- <div class="col-6"> 
                                    <img class="test" src="img/residenciasEjemplo1.png" alt="">
                                </div>--}}
                                <div class="col-12">
                                    <p>
                                        <span class="badge badge-info">Arquitectura web</span>
                                        <span class="badge badge-primary">Ingenieria de software</span>
                                        <span class="badge badge-secondary">Seguridad informatica</span>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="panel-footer text-right">
                            <button type="submit" class="btn btn-primary btn-raised btn-sm">Ver</button>
                        </div>
                    </div>
                </div>
                <div class="col-sm-3 col-sm-offset-0">
                    <div class="panel panel-default ">
                        <div class="panel-heading">
                            <h3 class="panel-title text-center">
                                Direccion de Tecnologias de la Informacion y Comunicaciones
                            </h3>
                        </div>
                        <div class="panel-body text-center vacante">
                            <div class="row">
                                {{-- <div class="col-6"> 
                                    <img class="test" src="img/residenciasEjemplo2.jpg" alt="">
                                </div>--}}
                                <div class="col-12">
                                    <p>
                                        <span class="badge badge-info">Arquitectura web</span>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="panel-footer text-right">
                            <button type="submit" class="btn btn-primary btn-raised btn-sm">Ver</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection