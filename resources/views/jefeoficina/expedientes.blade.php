@extends('layouts.JefeVinculacion')

@section('title', 'Jefe de Proyecto Vinculacion')

@section('content')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<div class="body-container animated fadeIn">
        
        <div class="row">

            <div class="btn-group btn-group-justified" role="group" aria-label="...">
                <div class="btn-group" role="group">
                    
                </div>
                <div class="btn-group" role="group">
                    <div class="col-sm-10">
                        <a href="{{route('jefeoficina.vacante.create')}}">
                            <button type="button" class="btn btn-primary btn-raised btn-lg">Generar reporte de residentes</button>
                        </a>
                    </div>
                </div>
            </div>
            
        </div>

        <div class="col-sm-12"><h3>Expdientes </h3></div>
        <div class="row">
            {{-- Tarjetas  --}}
            {{-- <div class="col-sm-1 "></div> --}}
            @php
            $contador=0;
            $bandera=0;
            @endphp
            @foreach ($expedientes as $expediente)

            @php
            $contador=$contador+1;
                if ($contador==1) {
                    echo '<div class="row">';
                    echo '<div class="col-sm-3 col-sm-offset-1">';        
                }else if ($contador==3) {
                    $contador=0;
                    echo '<div class="col-sm-12 col-sm-offset-1">';
                }else{
                    echo '<div class="col-sm-3 col-sm-offset-0">';
                }
            @endphp
            
                <div class="panel panel-default" >
                    <div class="panel-heading">
                        <h4 class="panel-title text-center">
                            {{$expediente->nombreProyecto}}
                        </h4>
                    </div>
                    @php
                    $especialidades="";
                    @endphp
                    <div class="panel-body text-center vacante">
                        <div class="row">
                            <div class="col-12 justify-content-center align-self-center">
                                <h5>Alumno: {{$expediente->nombre}} {{$expediente->apellidoPaterno}} {{$expediente->apellidoMaterno}}</h5>
                                <h6>Asesor interno: {{$expediente->asesorNombre}} {{$expediente->asesorApellidoPaterno}} {{$expediente->asesorApellidoMaterno}}</h6>

                            </div>
                        </div>       
                    </div>
                    
                    <div class="panel-footer text-right">

                            
                            <a class="btn btn-primary btn-raised btn-sm" href="expedientes/ver/{{$expediente->id}}"> Ver</a>
                            <a class="btn btn-danger btn-raised btn-sm" href="expedientes/eliminar/{{$expediente->id}}"> 
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