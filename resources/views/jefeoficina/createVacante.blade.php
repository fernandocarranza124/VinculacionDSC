@extends('layouts.JefeVinculacion')

@section('title', 'Jefe de Proyecto Vinculacion')

@section('content')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
<script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>
<div class="body-container animated fadeIn">
    <div class="container-fluid">
    	<div class="row">
    		<div class="col-sm-10 col-sm-offset-1">
    			<div class="panel panel-default">
    				<div class="panel-heading">
    					<h3 class="panel-title text-center">
                           Nueva vacante </strong>
                       </h3>
                   </div>
                   <div class="panel-body text-center">
                    <form action="{{route('jefeoficina.vacante.store')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="col-sm-7">
                            <div class="row">
                                <div class="col-sm-3">
                                    <h4 for="empresa" style="text-align: left;">Empresa:</h4>
                                </div>
                                <div class="col-sm-9">
                                    <div class="input-group" style="width: 100%;">
                                        <input required="" type="text" class="form-control" style="color: black;" placeholder="Nombre de la empresa" id="empresa" name="empresa">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-3">
                                    <h4 style="text-align: left;" for="telefono">Contacto:</h4>
                                </div>
                                <div class="col-sm-9">
                                    <div class="input-group" style="width: 100%;">
                                        <input required="" type="text" class="form-control" style="color: black;" placeholder="telefono/correo de la empresa" id="telefono" name="telefono">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-3">
                                    <h4 for="departamentos" style="text-align: left;">Departamento:</h4>
                                </div>
                                <div class="col-sm-9">
                                    <select class="form-control" id="departamentos" style="color:black;" name="departamento">
                                        @foreach ($departamentos as $departamento)
                                        <option selected="selected" value="{{$departamento->id}}">{{$departamento->nombre}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <h4 >Especialidad:</h4>
                                    <div class="input-group" style="width: 100%; text-align-last: left;">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="checkbox" id="Tecnologias Web"   name="TecWeb" value="true">
                                            <label class="form-check-label" for="Tecnologias Web" style="color: #000;">
                                                Tecnologias Web
                                            </label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="checkbox"   id="Seguridad informatica"   name="SegInf" value="true">
                                            <label class="form-check-label" for="Seguridad informatica" style="color: #000;">
                                                Seguridad informatica
                                            </label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="checkbox"   id="Ingenieria de software" name="IngSof"   value="true">
                                            <label class="form-check-label" for="Ingenieria de software" style="color: #000;">
                                                Ingenieria de software
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-3">
                                    <h4 for="activa" style="text-align: left;">Activa:</h4>
                                </div>
                                <div class="col-sm-9">
                                    <select class="form-control" style="color:black;" name="activa" id="activa">
                                      <option selected="selected" value="true" >Si</option>
                                      <option value="false">No</option>      
                                    </select>
                              </div>
                          </div>
                          <div class="row">
                                <div class="col-sm-3">
                                    <h4 for="activa" style="text-align: left;">Imagen: </h4>
                                </div>
                                <div class="col-sm-9">
                                    <button type="button" id="imagenBoton" onclick="seleccionaArchivo()" class="btn btn-primary btn-raised btn-md">Elegir imagen</button>
                                    
                                    <input style="display:none;" class="" type="file" name="archivo[]"  id="archivo" accept="image/*" onchange="actualizaNombre()">    



                                    <input type="text" name="ruta" id="ruta" value="" placeholder="" style="display: none;">
                                    <script type="text/javascript">
                                           function seleccionaArchivo() {
                                               document.getElementById('archivo').click();
                                           }
                                           function actualizaNombre() {
                                            var path=document.getElementById('archivo').value;
                                             var filename = path.replace(/^.*\\/, "");
                                                
                                            document.getElementById('imagenBoton').innerHTML=('<i class="fas fa-image"></i>'+filename);
                                            document.getElementById('ruta').value=filename;
                                            
                                           }
                                    </script>
                                </div>
                          </div>
                          <div class="row">
                            <div class="btn-group" role="group">
                                <div class="col-sm-12">
                                    <button type="submit" class="btn btn-primary btn-raised btn-lg">Agregar vacante</button>
                                </div>
                            </div>
                        </div>
                    </form>
                    </div>
                    <div class="col-sm-5">
                        <img src="{{ URL::asset('img/vacanteDefault.png')}}" alt="Vacante" style="width: 100%;">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>

@endsection