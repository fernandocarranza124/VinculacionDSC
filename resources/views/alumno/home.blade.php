@extends('layouts.alumno')

@section('title', 'Jefe de Proyecto Vinculacion')

@section('content')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<div class="body-container animated fadeIn">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-8 col-sm-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title text-center">
                        Bienvenido de nuevo {{$usuario->nombre}} {{$usuario->apellidoPaterno}} {{$usuario->apellidoMaterno}}
                        </h3>
                    </div>
                    <div class="panel-body text-center">
                        <h4>( {{$usuario->noControl}})<br><div style="text-transform: uppercase;">{{$usuario->nombre}} {{$usuario->apellidoPaterno}} {{$usuario->apellidoMaterno}}</div></h4>
                        <p>Para visualizar las vacantes disponobiles da clic en "Vacantes".</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

    @endsection