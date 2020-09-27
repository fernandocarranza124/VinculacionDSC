@extends('layouts.JefeVinculacion')

@section('title', 'Jefe de Proyecto Vinculacion')

@section('content')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<div class="body-container animated fadeIn">
    <div class="container-fluid">
        <br>
        <div class="row">
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
                            <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                            <button type="button" class="btn btn-primary btn-raised btn-sm">Postularme</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-3 col-sm-offset-1">
                <div class="panel panel-default" >
                    <div class="panel-heading">
                        <h3 class="panel-title text-center">
                            Agile Development Design + Value
                        </h3>
                    </div>
                    <div class="panel-body text-center vacante">
                        <div class="row">
                            <div class="col-12 justify-content-center align-self-center">
                                <p class=" align-middle">
                                    <span class="badge badge-secondary">Arquitectura web</span>
                                    <span class="badge badge-secondary">Ingenieria de software</span>
                                </p>
                            </div>
                        </div>       
                    </div>
                    <div class="panel-footer text-right">
                        <button type="button" class="btn btn-primary btn-raised btn-sm" data-toggle="modal" data-target="#myModal" data-title="Agile Development Design + Value" data-tag="Arquitectura Web, Ingenieria de software" data-image="img/residenciasEjemplo3.jpg">
                            Ver
                        </button>
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
                    <div class="panel-body text-center vacante">
                        <div class="row">
                            <div class="col-12 " style="" >
                                <p>
                                    <span class="badge badge-info">Arquitectura web</span>
                                    <span class="badge badge-primary">Ingenieria de software</span>
                                    <span class="badge badge-secondary">Seguridad informatica</span>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="panel-footer text-right">
                        <button type="button" class="btn btn-primary btn-raised btn-sm" data-toggle="modal" data-target="#myModal" data-title="Secretaria de Desarrollo Economico de Michoacan" data-tag="Arquitectura Web, Ingenieria de software, Seguridad informatica" data-image="img/residenciasEjemplo1.png">
                           Ver
                       </button>
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

                    <div class="col-12 align-middle">
                        <p>
                            <span class="badge badge-info">Arquitectura web</span>
                        </p>
                    </div>
                </div>
            </div>
            <div class="panel-footer text-right">
                <button type="button" class="btn btn-primary btn-raised btn-sm" data-toggle="modal" data-target="#myModal" data-title="Direccion de Tecnologias de la Informacion y Comunicaciones" data-tag="Arquitectura Web" data-image="img/residenciasEjemplo2.jpg">
                   Ver
               </button>
           </div>
                </div>
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