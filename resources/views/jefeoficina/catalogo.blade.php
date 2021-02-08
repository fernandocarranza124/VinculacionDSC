@extends('layouts.JefeVinculacion')

@section('title', 'Jefe de Proyecto Vinculacion')

@section('content')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<div class="body-container animated fadeIn">
    <div class="container-fluid">
        <br>
        

            {{-- Modal que recibe todos los datos provenientes de los panels --}}
            <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            <h4 class="modal-title" id="modal-title"></h4>
                        </div>
                        <div class="modal-body">
                            <span id="modal-tag"></span>
                            <div class="row">
                                <div class="col-sm-12">
                                    <img id="modal-image" class="img-responsive" style="height:50rem0;max-width: 100%;"/>    
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            
                            <script>
                                function probando(IDVacante) {
                                    document.getElementById("prueba").innerHTML = "<a href='edit/"+IDVacante+"'><button type='button' class='btn btn-primary btn-raised btn-sm' id='modal-id'>Editar</button></a>";
                                }
                                
                            </script>
                            <div  class="col-sm-8"></div>
                            <div id="prueba" class="col-sm-2">
                                
                            </div>
                            <div  class="col-sm-2">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>    
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>
            {{-- Fin del modal --}}
        <div class="row">

            <div class="btn-group btn-group-justified" role="group" aria-label="...">
                <div class="btn-group" role="group">
                    
                </div>
                <div class="btn-group" role="group">
                    <div class="col-sm-10">
                        <a href="{{route('jefeoficina.vacante.create')}}">
                            <button type="button" class="btn btn-primary btn-raised btn-lg">Agregar vacante</button>
                        </a>
                    </div>
                </div>
            </div>
            
        </div>

        <div class="col-sm-12"><h3>Vacantes disponibles</h3></div>
        <div class="row">
            {{-- Tarjetas  --}}
            {{-- <div class="col-sm-1 "></div> --}}
            @php
            $contador=0;
            $bandera=0;
            @endphp
            @foreach ($vacantes as $vacante)

            @php
            $contador=$contador+1;
                if ($contador==1) {
                    echo '<div class="row">';
                    echo '<div class="col-sm-3 col-sm-offset-1">';        
                }else if ($contador==3) {
                    $contador=0;
                    echo '<div class="col-sm-3 col-sm-offset-0">';
                }else{
                    echo '<div class="col-sm-3 col-sm-offset-0">';
                }
            @endphp
            
                <div class="panel panel-default" >
                    <div class="panel-heading">
                        <h3 class="panel-title text-center">
                            {{$vacante->empresa}}
                        </h3>
                    </div>
                    @php
                    $especialidades="";
                    @endphp
                    <div class="panel-body text-center vacante">
                        <div class="row">
                            <div class="col-12 justify-content-center align-self-center">
                                <p class=" align-middle">
                                    {{$especialidades=""}}
                                    @if($vacante->IngSof)
                                    @php
                                    $especialidades=$especialidades.' Ingenieria de software';
                                    @endphp
                                    <span class="badge badge-secondary">Ingenieria de software</span>    
                                    @endif
                                    @if($vacante->SegInf)
                                    <span class="badge badge-secondary">Seguridad informatica</span>    
                                    @php
                                    $especialidades=$especialidades.' Seguridad informatica';
                                    @endphp
                                    @endif
                                    @if($vacante->TecWeb)
                                    <span class="badge badge-secondary">Tecnologias web</span>
                                    @php
                                    $especialidades=$especialidades.' Tecnologias web';
                                    @endphp
                                    @endif
                                </p>
                            </div>
                        </div>       
                    </div>
                    
                    <div class="panel-footer text-right">

                            {{-- <button type="button" class="btn btn-primary btn-raised btn-sm" data-toggle="modal" data-target="#myModal" data-title="{{$vacante->empresa}}" data-tag="{{$especialidades}}" data-image="{{ URL::asset('img/'.$vacante->ruta)}}" onclick="probando({{$vacante->id}})">
                                Ver
                            </button> --}}
                            <button type="button" class="btn btn-primary btn-raised btn-sm" data-toggle="modal" data-target="#myModal" data-title="{{$vacante->empresa}}" data-tag="{{$especialidades}}" data-image="{{'http://vinculaciondsc.herokuapp.com/img/'.$vacante->ruta}}" onclick="probando({{$vacante->id}})">
                                Ver
                            </button>
                            <a class="btn btn-warning btn-raised btn-sm" href="{{route('jefeoficina.vacante.edit', $vacante->id)}}"> Editar</a>
                            <a class="btn btn-danger btn-raised btn-sm" href="{{route('jefeoficina.vacante.delete', $vacante->id)}}"> 
                                <i class="fa fa-trash" aria-hidden="true"></i>Borrar
                            </a>
                        

                    </div>
                </div>
            </div>
            @php
            if ($contador==3) {
                    echo '<div class="col-sm-2"></div>';
                    echo '</div>';        
                }
            
            @endphp

            @endforeach
            </div>
        </div>

        <div class="col-sm-12"><h3>Vacantes Inactivas</h3></div>
        <div class="row">
            {{-- Tarjetas  --}}
            {{-- <div class="col-sm-1 "></div> --}}
            @php
            $contador=0;
            $bandera=0;
            @endphp
            @foreach ($vacantesInactivas as $vacante)

            @php
            $contador=$contador+1;
                if ($contador==1) {
                    echo '<div class="row">';
                    echo '<div class="col-sm-3 col-sm-offset-1">';        
                }else if ($contador==3) {
                    $contador=0;
                    echo '<div class="col-sm-3 col-sm-offset-0">';
                }else{
                    echo '<div class="col-sm-3 col-sm-offset-0">';
                }
            @endphp
            
                <div class="panel panel-default" >
                    <div class="panel-heading">
                        <h3 class="panel-title text-center">
                            {{$vacante->empresa}}
                        </h3>
                    </div>
                    @php
                    $especialidades="";
                    @endphp
                    <div class="panel-body text-center vacante">
                        <div class="row">
                            <div class="col-12 justify-content-center align-self-center">
                                <p class=" align-middle">
                                    {{$especialidades=""}}
                                    @if($vacante->IngSof)
                                    @php
                                    $especialidades=$especialidades.' Ingenieria de software';
                                    @endphp
                                    <span class="badge badge-secondary">Ingenieria de software</span>    
                                    @endif
                                    @if($vacante->SegInf)
                                    <span class="badge badge-secondary">Seguridad informatica</span>    
                                    @php
                                    $especialidades=$especialidades.' Seguridad informatica';
                                    @endphp
                                    @endif
                                    @if($vacante->TecWeb)
                                    <span class="badge badge-secondary">Tecnologias web</span>
                                    @php
                                    $especialidades=$especialidades.' Tecnologias web';
                                    @endphp
                                    @endif
                                </p>
                            </div>
                        </div>       
                    </div>
                    
                    <div class="panel-footer text-right">

                            {{-- <button type="button" class="btn btn-primary btn-raised btn-sm" data-toggle="modal" data-target="#myModal" data-title="{{$vacante->empresa}}" data-tag="{{$especialidades}}" data-image="{{ URL::asset('img/'.$vacante->ruta)}}" onclick="probando({{$vacante->id}})">
                                Ver
                            </button> --}}
                            <button type="button" class="btn btn-primary btn-raised btn-sm" data-toggle="modal" data-target="#myModal" data-title="{{$vacante->empresa}}" data-tag="{{$especialidades}}" data-image="{{'http://vinculaciondsc.herokuapp.com/img/'.$vacante->ruta}}" onclick="probando({{$vacante->id}})">
                                Ver
                            </button>
                            <a class="btn btn-warning btn-raised btn-sm" href="{{route('jefeoficina.vacante.edit', $vacante->id)}}"> Editar</a>
                            <a class="btn btn-danger btn-raised btn-sm" href="{{route('jefeoficina.vacante.delete', $vacante->id)}}"> 
                                <i class="fa fa-trash" aria-hidden="true"></i>Borrar
                            </a>
                        

                    </div>
                </div>
            </div>
            @php
            if ($contador==3) {
                    echo '<div class="col-sm-2"></div>';
                    echo '</div>';        
                }
            
            @endphp

            @endforeach
            </div>
        </div>
    </div>
</div>


<script type="text/javascript">
        // data-* attributes to scan when populating modal values
        var ATTRIBUTES = ['title', 'tag','image'];

        $('[data-toggle="modal"]').on('click', function (e) {
  // convert target (e.g. the button) to jquery object
  var $target = $(e.target);
  // modal targeted by the button
  var modalSelector = $target.data('target');
  
  // iterate over each possible data-* attribute
  ATTRIBUTES.forEach(function (attributeName) {
    // retrieve the dom element corresponding to current attribute
    if(attributeName=='image'){
        var $modalAttribute = $(modalSelector + ' #modal-' + attributeName);
        var dataValue = $target.data(attributeName);
        $('#modal-image').attr('src',dataValue);
    }else{
        var $modalAttribute = $(modalSelector + ' #modal-' + attributeName);
        var dataValue = $target.data(attributeName);
    }
    
    // if the attribute value is empty, $target.data() will return undefined.
    // In JS boolean expressions return operands and are not coerced into
    // booleans. That way is dataValue is undefined, the left part of the following
    // Boolean expression evaluate to false and the empty string will be returned
    $modalAttribute.text(dataValue || '');
});
});
</script>
@endsection