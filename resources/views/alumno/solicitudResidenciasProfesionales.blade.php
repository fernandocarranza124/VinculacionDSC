@extends('layouts.alumno')

@section('title', 'Jefe de Proyecto Vinculacion')

@section('content')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<div class="body-container animated fadeIn">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <h3>Solicitud de residencias profesionales</h3>
                 <br>
             </div> 
             <form action="{{route('alumno.storeSolicitudRP')}}" method="post" data-confirm="¿La información es correcta? No podrás hacer ningún cambio posteriormente." class="confirm">
                @csrf
                <div class="col-sm-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title text-center">Datos del solicitante</h3>
                        </div> 
                        <div class="panel-body">
                            <p>Verifica tu información personal, si algún dato es incorrecto favor de acudir a servicios escolares.</p> 
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group label-floating">
                                        <label for="ncontrol" class="control-label">Nº de control</label> 
                                        <input type="text" name="ncontrol" id="ncontrol" value="{{$usuario->noControl}}" disabled="disabled" class="form-control">
                                    </div> 
                                    <div class="form-group label-floating">
                                        <label for="nombre" class="control-label">Nombre</label> 
                                        <input type="text" name="nombre" id="nombre" value="{{$usuario->nombre}} {{$usuario->apellidoPaterno}} {{$usuario->apellidoMaterno}}" disabled="disabled" class="form-control">
                                    </div> 
                                    <div class="form-group label-floating">
                                        <label for="carrera" class="control-label">Carrera</label> 
                                        <input type="text" name="carrera" id="carrera" value="{{$usuario->nombreCarrera}}" disabled="disabled" class="form-control">
                                    </div> 
                                    <div class="form-group label-floating">
                                        <label for="domicilio" class="control-label">Domicilio</label> 
                                        <input type="text" name="domicilio" id="domicilio" value="{{$usuario->domicilio}}" disabled="disabled" class="form-control">
                                    </div> 
                                    <div class="form-group label-floating">
                                        <label for="telefono" class="control-label">Teléfono</label> 
                                        <input type="text" name="telefono" id="telefono" value="{{$usuario->telefono}}" disabled="disabled" class="form-control">
                                    </div>
                                </div> 
                                <div class="col-sm-6">
                                    <div class="form-group label-floating">
                                        <label for="correo" class="control-label">Correo electrónico</label> 
                                        <input type="text" name="correo" id="correo" value="{{$usuario->correoElectronico}}" disabled="disabled" class="form-control">
                                    </div> 
                                    <div class="form-group label-floating">
                                        <label for="no_seguro" class="control-label">Seguro social (IMSS)</label> 
                                        <input type="text" name="imss" id="imss" value="{{$usuario->segurosocial}}" disabled="disabled" class="form-control">
                                    </div> 
                                    <p class="text-muted">Si tienes un registro de seguridad social extra selecciona el tipo y escribe el número correspondiente.</p> 
                                    <div class="form-group label-floating is-empty is-focused">
                                        <label for="seguro" class="control-label"></label> 
                                        <select name="seguro" id="seguro" class="form-control" placeholder="Tipo de seguro">
                                            <option disabled selected>Tipo de seguro</option>
                                            <option value="1">IMSS</option> 
                                            <option value="2">ISSSTE</option> 
                                            <option value="3">OTRO</option>
                                        </select>
                                    </div> 
                                    <div class="form-group label-floating is-empty is-focused">
                                        
                                        <input type="text" name="no_seguro" id="no_seguro" value="" placeholder="Número de seguro" class="form-control"0>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12">
                                    <div class="panel panel-default">
                                        <div class="panel-heading">
                                            <h3 class="panel-title text-center">Datos del proyecto</h3>
                                        </div> 
                                        <div class="panel-body">
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <div class="form-group label-floating">
                                                        <label for="periodo" class="control-label">Periodo proyectado</label> 
                                                        <input type="text" name="periodo" id="periodo" value="{{$periodo->nombre}}" disabled="disabled" class="form-control">
                                                        <input type="text" name="periodo_id" id="periodo_id" value="{{$periodo->id}}" class="form-control" style="display: none;">
                                                    </div> 
                                                    <div class="form-group label-floating is-empty is-focused">
                                                        <label for="proyecto" class="control-label">Nombre del proyecto</label> 
                                                        <input type="text" name="proyecto" id="proyecto" value="" class="form-control" required=""></div>
                                                    </div> 
                                                    <div class="col-sm-6">
                                                        <div class="form-group label-floating is-empty is-focused">
                                                            <label for="opcion" class="control-label"></label>
                                                            <select name="opcion" id="opcion" class="form-control" required="">
                                                                <option disabled selected="" style="text-decoration-color: gray;">Opción elegida</option> 
                                                                <option value="1">Banco de proyectos</option> 
                                                                <option value="2">Propuesta propia</option> 
                                                                <option value="3">Trabajador</option>
                                                            </select>
                                                        </div> 
                                                        <div class="form-group label-floating is-empty is-focused">
                                                            <label for="num_residentes" class="control-label">Número de residentes</label> 
                                                            <input type="number" name="num_residentes" id="num_residentes" value="" min="0" max="5" class="form-control" required="">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                                        <div class="panel panel-default">
                                                            <div class="panel-heading">
                                                                <h3 class="panel-title text-center">Datos de la empresa</h3></div> 
                                                            <div class="panel-body">
                                                                <div class="row">
                                                                    <div class="col-sm-6">
                                                                        <div class="form-group label-floating is-empty is-focused">
                                                                            <label for="nombre_empresa" class="control-label">Nombre</label> 
                                                                            <input type="text" name="nombre_empresa" id="nombre_empresa" value="" class="form-control" required="">
                                                                        </div> 
                                                                        <div class="form-group label-floating is-empty is-focused">
                                                                            <label for="rfc" class="control-label">RFC</label> 
                                                                            <input type="text" name="rfc" id="rfc" value="" class="form-control" required="">
                                                                        </div> 
                                                                        <div class="form-group label-floating is-empty is-focused">
                                                                            <label for="giro" class="control-label">Giro, ramo o sector</label> 
                                                                            <select name="giro" id="giro" class="form-control" required="">
                                                                                <option value=""></option> 
                                                                                <option value="1">Industrial</option> 
                                                                                <option value="2">Servicios</option> 
                                                                                <option value="3">Público</option> 
                                                                                <option value="4">Privado</option> 
                                                                                <option value="5">Otro</option>
                                                                            </select>
                                                                        </div>
                                                                        <div class="form-group label-floating is-empty is-focused">
                                                                            <label for="domicilio_dependencia" class="control-label">Calle y número</label> 
                                                                            <input type="text" name="domicilio_dependencia" id="domicilio_dependencia" value="" class="form-control" required="">
                                                                        </div> 
                                                                        <div class="form-group label-floating is-empty is-focused">
                                                                            <label for="colonia_dependencia" class="control-label">Colonia</label> 
                                                                            <input type="text" name="colonia_dependencia" id="colonia_dependencia" value="" class="form-control" required="">
                                                                        </div> 
                                                                        <div class="form-group label-floating is-empty is-focused">
                                                                            <label for="cp_dependencia" class="control-label">Código postal</label> 
                                                                            <input type="text" name="cp_dependencia" id="cp_dependencia" value="" class="form-control" required="">
                                                                        </div> 
                                                                        <div class="form-group label-floating is-empty is-focused">
                                                                            <label for="ciudad_dependencia" class="control-label">Ciudad y estado</label> 
                                                                            <input type="text" name="ciudad_dependencia" id="ciudad_dependencia" value="" class="form-control" required="">
                                                                        </div> 
                                                                        <div class="form-group label-floating is-empty is-focused">
                                                                            <label for="fax_dependencia" class="control-label">Fax</label> 
                                                                            <input type="text" name="fax_dependencia" id="fax_dependencia" value="" class="form-control">
                                                                        </div> 
                                                                        <div class="form-group label-floating is-empty is-focused">
                                                                            <label for="tel_dependencia" class="control-label">Teléfono</label> 
                                                                            <input type="text" name="tel_dependencia" id="tel_dependencia" value="" class="form-control" >
                                                                        </div>
                                                                    </div> 
                                                                    <div class="col-sm-6">
                                                                        <div class="form-group label-floating is-empty is-focused">
                                                                            <label for="titular" class="control-label">Nombre completo del titular</label> 
                                                                            <input type="text" name="titular" id="titular" value="" class="form-control" required="">
                                                                        </div> 
                                                                        <div class="form-group label-floating is-empty is-focused">
                                                                            <label for="puesto_titular" class="control-label">Puesto del titular</label> 
                                                                            <input type="text" name="puesto_titular" id="puesto_titular" value="" class="form-control" required="">
                                                                        </div> 
                                                                        <div class="form-group label-floating is-empty is-focused">
                                                                            <label for="asesor_externo" class="control-label">Nombre completo del asesor externo</label> 
                                                                            <input type="text" name="asesor_externo" id="asesor_externo" value="" class="form-control" required="">
                                                                        </div> 
                                                                        <div class="form-group label-floating is-empty is-focused">
                                                                            <label for="puesto_asesor_externo" class="control-label">Puesto del asesor externo</label> 
                                                                            <input type="text" name="puesto_asesor_externo" id="puesto_asesor_externo" value="" class="form-control" required="">
                                                                        </div> 
                                                                            <p class="text-muted">En caso de que exista otra persona encargada de firmar los documentos favor de anotarla a continuación.</p> 
                                                                        <div class="form-group label-floating is-empty is-focused">
                                                                            <label for="intermediario" class="control-label">Nombre completo del intermediario</label> 
                                                                            <input type="text" name="intermediario" id="intermediario" value="" class="form-control">
                                                                        </div> 
                                                                        <div class="form-group label-floating is-empty is-focused">
                                                                            <label for="puesto_intermediario" class="control-label">Puesto del intermediario</label> 
                                                                            <input type="text" name="puesto_intermediario" id="puesto_intermediario" value="" class="form-control">
                                                                        </div> 
                                                                        <div class="form-group label-floating is-empty is-focused">
                                                                            <label for="mision" class="control-label">Misión de la empresa</label> 
                                                                            <textarea name="mision" id="mision" rows="4" class="form-control" required=""></textarea>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-sm-12 text-right">
                                                                                <a href="{{route('alumno.home')}}" class="btn btn-default btn-raised btn-sm">Atrás</a> 
                                                                                <button type="submit" class="btn btn-primary btn-raised btn-sm">Guardar datos</button>
                                                                    </div>
                                                                </div>
                                                                </form>
                                                            </div>
    </div>
</div>

    @endsection