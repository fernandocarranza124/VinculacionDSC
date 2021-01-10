@extends('layouts.JefeVinculacion')

@section('title', 'Jefe de Proyecto Vinculacion')

@section('content')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<div class="body-container animated fadeIn">
    <div class="container-fluid">
    	<div class="row">
    		<div class="col-sm-5 col-sm-offset-1">
    			<div class="panel panel-default">
    				<div class="panel-heading">
    					<h3 class="panel-title text-center">
    					Documentos requeridos actualmente
    					</h3>
    				</div>
    				<div class="panel-body text-center">
    					<p><strong>Los siguientes documentos se le pedirán al alumno durante su tramite y periodo de residencias</strong></p>
                        
                            @foreach($documentos as $documento )
                                <div class="row">
                                    <div class="col-sm-7">
                                        <h5>Documento: {{$documento->nombre}}</h5> 
                                    </div>
                                    <div class="col-sm-5">
                                        <a href="{{$documento->link}}" class="btn btn-primary btn-raised btn-sm" add target="_blank">Ver</a> 
                                        <a href="eliminar/{{$documento->id}}" class="btn btn-danger btn-raised btn-sm">Eliminar</a> 
                                    </div>
                                </div>
                            @endforeach
                        
    				</div>
    			</div>
    		</div>

            <div class="col-sm-5 col-sm-offset-0">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title text-center">
                        Agregar nuevo documento
                        </h3>
                    </div>
                    <div class="panel-body text-center">
                        <p>Si desea agregar un nuevo documento a la lista, complete los siguientes campos:</p>
                        <form action="{{route('jefeoficina.documento.store')}}" method="post" accept-charset="utf-8">
                            @csrf
                            <div class="form-group label-floating">
                                <label for="nombreDocumento" class="control-label">Nombre del documento</label> 
                                <input type="text" name="nombreDocumento" id="nombreDocumento" class="form-control">
                            </div> 
                            <div class="form-group label-floating">
                                <label for="linkDocumento" class="control-label">Enlace de descarga</label> 
                                <input type="url" name="linkDocumento" id="linkDocumento" class="form-control">
                            </div>
                            <div class="col-sm-12 text-right">
                                <button type="submit" class="btn btn-primary btn-raised btn-sm">Guardar documento</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
    	</div>
    </div>
</div>

    @endsection