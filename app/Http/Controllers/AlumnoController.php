<?php

namespace App\Http\Controllers;

use App\Models\Alumno;
use App\Models\Carrera;
use App\Models\Departamento;
use App\Models\Vacante;
use App\Models\Periodo;
use App\Models\Expediente;
use App\Models\Comentario;
use App\Models\Registro;
use App\Models\documento;
use App\Models\documento_pivote;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;

class AlumnoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    



    public function index()
    {   
        $usuario=Auth::user();
        return view('alumno.home', compact('usuario'));
    }
    public function showVacantes()
    {
        $usuario=Auth::user();
        $carreraUsuario=Auth::user()->carrera;
        
        $carrera=Carrera::where('id', $carreraUsuario)->first();
        $departamento=Departamento::findOrFail($carrera->departamento);
        $vacantes=Vacante::where('departamento', '=', $departamento->id)->get();
        return view('alumno.catalogo', compact('usuario', 'vacantes'));
    }
    public function solicitaResidenciasProfesionales()
    {
        $usuario=Auth::user();
        $carreraUsuario=Auth::user()->carrera;
        $carrera=Carrera::where('id', $carreraUsuario)->first();
        $usuario->nombreCarrera=$carrera->nombre;

        $periodo=Periodo::all()->last();
        $expediente=Expediente::where('alumno','=',$usuario->id)->first();
        $error="Ya tienes un expediente activo";
        if($expediente==null){
            return view('alumno.solicitudResidenciasProfesionales', compact('usuario', 'periodo'));
        }else{
            
            return view('alumno.error', compact('usuario', 'error'));
        }
        dd($expediente);


        //dd($usuario);
        
    }
    public function storeSolicitud(Request $request)
    {
        $expediente=new Expediente;
        $expediente->alumno=Auth::user()->id;
        $expediente->tipoSeguroExtra=$request->input('seguro');
        $expediente->numeroSeguroExtra=$request->input('no_seguro');
        $expediente->periodo=$request->input('periodo_id');
        $expediente->nombreProyecto=$request->input('proyecto');
        $expediente->opcion=$request->input('opcion');
        $expediente->nombreEmpresa=$request->input('nombre_empresa');
        $expediente->rfcEmpresa=$request->input('rfc');
        $expediente->giroEmpresa=$request->input('giro');
        $expediente->calleEmpresa=$request->input('domicilio_dependencia');
        $expediente->coloniaEmpresa=$request->input('colonia_dependencia');
        $expediente->ciudadEmpresa=$request->input('ciudad_dependencia');
        $expediente->faxEmpresa=$request->input('fax_dependencia');
        $expediente->telefonoEmpresa=$request->input('tel_dependencia');
        $expediente->titularEmpresa=$request->input('titular');
        $expediente->puestoTitularEmpresa=$request->input('puesto_titular');
        $expediente->asesorExterno=$request->input('asesor_externo');
        $expediente->puestoAsesorExterno=$request->input('puesto_asesor_externo');
        $expediente->nombreIntermediarioEmpresa=$request->input('intermediario');
        $expediente->puestoIntermediarioEmpresa=$request->input('puesto_intermediario');
        $expediente->misionEmpresa=$request->input('mision');
        $expediente->estatus=1;
        $expediente->save();

        
        self::enlazarDocumentacion($expediente->id);


        $registro=new Registro;
        $registro->expediente=$expediente->id;
        $registro->estatus=1;
        
        $registro->save();



        return redirect()->route('alumno.showExpediente');
    }
    public static function enlazarDocumentacion($idExpediente)
    {
        $documentos=documento::all();

        foreach ($documentos as $documento) {
        $pivote=new documento_pivote;
        $pivote->documento=$documento->nombre;
        $pivote->enlace=$documento->link;
        $pivote->expediente=$idExpediente;
        $pivote->autorizado=0;
        $pivote->save();
        }
    }


    public function showExpediente()
    {
        $usuario=Auth::user();
        $carreraUsuario=Auth::user()->carrera;
        $carrera=Carrera::where('id', $carreraUsuario)->first();
        
        
        // $expediente=Expediente::where('alumno',$usuario->id)->first();
        $expediente=Expediente::where('alumno',$usuario->id)
                                ->join('alumno','alumno.id','=','expediente.alumno')
                                ->leftjoin('profesor','profesor.id','=','expediente.asesorInterno')
                        ->get(
                            ['expediente.id','expediente.estatus',
                            'expediente.*','alumno.nombre as nombreAlumno','alumno.apellidoMaterno as apellidoMaternoAlumno','alumno.apellidoPaterno as apellidoPaternoAlumno','alumno.noControl as noControlAlumno', 'alumno.id as idAlumno','alumno.sexo as sexoAlumno', 'alumno.correoElectronico as correoAlumno','alumno.correoElectronicoTecNM as correoTecNMAlumno','profesor.nombre as nombreProfesor', 'profesor.apellidoPaterno as apellidoPaternoProfesor', 'profesor.apellidoMaterno as apellidoMaternoProfesor', 'profesor.id as idProfesor','expediente.created_at as fechaInicio','expediente.Nube']
                        )->first();
       $error="Aun no tienes un expediente, solicita tu apertura de Residencias profesionales en : Periodo actual -> 'Solicitud de residencias profesionales'";
        if($expediente==null){
            return view('alumno.error', compact('usuario', 'error'));
        }
        $fecha=$expediente->fechaInicio;
        
        $expediente->fechaInicio=self::obtieneFecha($fecha);
        $comentarios=self::mostrarComentarios($expediente->id);

        $documentosPendiente=documento_pivote::where('expediente',$expediente->id)->where('autorizado',0)->get();
        $documentosRevision=documento_pivote::where('expediente',$expediente->id)->where('autorizado',1)->get();
        $documentosAutorizado=documento_pivote::where('expediente',$expediente->id)->where('autorizado',2)->get();
        $documentosRegistrados=documento::all();

        return view('alumno.expediente', compact('usuario','expediente','comentarios','documentosPendiente','documentosRevision', 'documentosAutorizado','documentosRegistrados'));
    }
    public function obtieneFecha($fecha)
    {
        $fecha = substr($fecha, 0, 10);
        $numeroDia = date('d', strtotime($fecha));
        $dia = date('l', strtotime($fecha));
        $mes = date('F', strtotime($fecha));
        $anio = date('Y', strtotime($fecha));
         $dias_ES = array("Lunes", "Martes", "Miércoles", "Jueves", "Viernes", "Sábado", "Domingo");
        $dias_EN = array("Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday", "Sunday");
        $nombredia = str_replace($dias_EN, $dias_ES, $dia);
        $meses_ES = array("Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre");
        $meses_EN = array("January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December");
        $nombreMes = str_replace($meses_EN, $meses_ES, $mes);
        return ($numeroDia.'/'.$nombreMes.'/'.$anio);
    }

    public function agregarComentario(Request $request)
    {
        $usuario=Auth::user();
        $nombreCompleto=$usuario->nombre.' '.$usuario->apellidoPaterno.' '.$usuario->apellidoMaterno;
        $comentario=new Comentario;

        if ($request->menuDocumentos==null) {
            $comentario->documento=0;
        }else{
            $comentario->documento=$request->menuDocumentos;
        }
        
        $comentario->autor=$nombreCompleto;
        $comentario->cargo='Residente';
        
        $comentario->comentario=$request->comentario;
        $comentario->expediente=$request->expediente;
        
        $comentario->save();

        $comentario=Comentario::latest()->first();
        return redirect('alumno/residencias-profesionales');
    }

    public static function mostrarComentarios($idExpediente)
    {
        $comentarios=Comentario::where('expediente','=',$idExpediente)
                    ->leftjoin('documento','comentario.documento','=','documento.id')
                    ->orderBy('created_at', 'desc')
                    ->get(['comentario.*','documento.nombre as nombreDocumento', 'documento.link as link']);
                    
        return $comentarios;
    }
    public function agregarCarpeta(Request $request)
    {
        $expediente= Expediente::where('id', $request->idExpediente)->first();
        $expediente->Nube=$request->carpetaNube;
        $expediente->save();

        $registro=new Registro;
        $registro->expediente=$request->idExpediente;
        $registro->estatus=2;
        $registro->save();

        return redirect('alumno/residencias-profesionales');    
    }
    public function subirArchivo(Request $request)
    {
        $documento_pivote = documento_pivote::where('id', $request->idDocumento)->first();
        $documento_pivote->autorizado = 1;
        $documento_pivote->save();

        $registro=new Registro;
        $registro->expediente=$request->idExpediente;
        $registro->estatus=2;
        $registro->save();
        
        return redirect('alumno/residencias-profesionales');   
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Alumno  $alumno
     * @return \Illuminate\Http\Response
     */
    public function show(Alumno $alumno)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Alumno  $alumno
     * @return \Illuminate\Http\Response
     */
    public function edit(Alumno $alumno)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Alumno  $alumno
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Alumno $alumno)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Alumno  $alumno
     * @return \Illuminate\Http\Response
     */
    public function destroy(Alumno $alumno)
    {
        //
    }
}
