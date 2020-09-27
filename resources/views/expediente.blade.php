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

        
    </div>
</div>

@endsection