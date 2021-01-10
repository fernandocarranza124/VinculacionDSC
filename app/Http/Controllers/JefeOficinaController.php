<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\File; 
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\JefeOficina;
use App\Models\Vacante;
use App\Models\Departamento;
use App\Models\Expediente;
use App\Models\Alumno;
use App\Models\Carrera;
use App\Models\Periodo;
use App\Models\Profesor;
use App\Models\Comentario;
use App\Models\Registro;
use App\Models\documento;
use App\Models\documento_pivote;

use Illuminate\Support\Facades\Storage;
class JefeOficinaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:jefeoficina');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $usuario=Auth::user();
        return view('jefeoficina.home', compact('usuario'));
    }

    public function showVacantes()
    {
        $usuario=Auth::user();
        $departamento=Auth::user()->departamento;
        
        $vacantes=Vacante::where('departamento', '=', $departamento)->get();


        return view('jefeoficina.catalogo', compact('usuario', 'vacantes'));
        // return view('jefeoficina.vacantes', compact('usuario'));
    }
    public function createVacante()
    {   
        $usuario=Auth::user();
        $departamentos=Departamento::all();
        return view('jefeoficina.createVacante', compact('usuario','departamentos'));
    }
    public function storeVacante(Request $request)
    {
        $vacante=new Vacante;
        $vacante->empresa=$request->input('empresa');
        $vacante->telefono=$request->input('telefono');
        $vacante->activa=$request->input('activa');
        $vacante->departamento=$request->input('departamento');        
        if($request->input('IngSof')==null){            $vacante->IngSof="false";    
        }else{            $vacante->IngSof=$request->input('IngSof');        }
        if($request->input('TecWeb')==null){            $vacante->TecWeb="false";    
        }else{            $vacante->TecWeb=$request->input('TecWeb');        }
        if($request->input('SegInf')==null){            $vacante->SegInf="false";    
        }else{            $vacante->SegInf=$request->input('SegInf');        }
        if($request->input('ruta')!=null){
            $vacante->ruta=$request->input('ruta');
        }
        if($request->file('archivo')!=null){
            $archivos=$request->file('archivo');
            foreach ($archivos as $archivo) {
                $filename = $archivo->storeAs('','img/'.$vacante->ruta);
            }
        }
        $vacante->save();
        return redirect()->route('jefeoficina.vacantes');
        
    }

    public function deleteVacante($idVacante)
    {
        $vacante=Vacante::find($idVacante);                 
        $vacante->delete();
        if($vacante->ruta!="Vacantedefault.png"){
        File::delete('img/'.$vacante->ruta);}
        
        return redirect()->route('jefeoficina.vacantes');
    }

    public function editVacante($idVacante)
    {
        $usuario=Auth::user();
        $vacante=Vacante::find($idVacante);                 
        $departamento=Departamento::findOrFail($vacante->departamento);
        $vacante->nombreDepartamento=$departamento->nombre;
        $departamentos=Departamento::all();
        
        return view('jefeoficina.editVacante', compact('usuario', 'vacante', 'departamentos'));
    }
    public function updateVacante(Request $request, $idVacante)
    {

        $vacante = Vacante::findOrFail($idVacante);
        if($request->input('IngSof')==null){            $vacante->IngSof="false";    
        }else{            $vacante->IngSof=$request->input('IngSof');        }
        if($request->input('TecWeb')==null){            $vacante->TecWeb="false";    
        }else{            $vacante->TecWeb=$request->input('TecWeb');        }
        if($request->input('SegInf')==null){            $vacante->SegInf="false";    
        }else{            $vacante->SegInf=$request->input('SegInf');        }

        $vacante->empresa=$request->input('empresa');
        $vacante->telefono=$request->input('telefono');
        $vacante->activa=$request->input('activa');
        
        if($request->input('ruta')!=null){
            $vacante->ruta=$request->input('ruta');
        }
        if($request->file('archivo')!=null){
            $archivos=$request->file('archivo');
            foreach ($archivos as $archivo) {
                $filename = $archivo->storeAs('','img/'.$vacante->ruta);
            }
        }

        $vacante->save();
        Storage::delete('img/examen.jpeg');

        return redirect()->route('jefeoficina.vacantes');
    }


    public function showAllExpedientes()
    {
        $usuario=Auth::user();
        

        $expedientes=Expediente::join('alumno','alumno.id','=','expediente.alumno')
                        ->leftjoin('profesor','profesor.id','=','expediente.asesorInterno')
                        ->get(
                            ['expediente.id','expediente.nombreProyecto','alumno.nombre','alumno.apellidoMaterno','alumno.apellidoPaterno','alumno.noControl','profesor.nombre as asesorNombre','profesor.apellidoPaterno as asesorApellidoPaterno','profesor.apellidoMaterno as asesorApellidoMaterno']
                        );

                    // dd($expedientes);
        

        return view('jefeoficina.expedientes', compact('usuario', 'expedientes'));
    }

    public function eliminarExpediente($idExpediente)
    {
        $Comentario=Comentario::where('expediente',$idExpediente)->delete();
        $Registro=Registro::where('expediente',$idExpediente)->delete();
        $Expediente=Expediente::where('id',$idExpediente)->delete();
        return redirect()->route('jefeoficina.expedientes');
    }


    public function editExpediente($idExpediente)
    {
        $usuario=Auth::user();

        $carreraUsuario=Auth::user()->carrera;

        $carrera=Carrera::where('id', $carreraUsuario)->first();
        $expediente=Expediente::where('expediente.id',$idExpediente)
                                ->join('alumno','alumno.id','=','expediente.alumno')
                                ->leftjoin('profesor','profesor.id','=','expediente.asesorInterno')
                        ->get(
                            ['expediente.id','expediente.estatus',
                            'expediente.*','alumno.nombre as nombreAlumno','alumno.apellidoMaterno as apellidoMaternoAlumno','alumno.apellidoPaterno as apellidoPaternoAlumno','alumno.noControl as noControlAlumno', 'alumno.id as idAlumno','alumno.sexo as sexoAlumno', 'alumno.correoElectronico as correoAlumno','alumno.correoElectronicoTecNM as correoTecNMAlumno','profesor.nombre as nombreProfesor', 'profesor.apellidoPaterno as apellidoPaternoProfesor', 'profesor.apellidoMaterno as apellidoMaternoProfesor', 'profesor.id as idProfesor']
                        )->first();

                        // dd($expediente);
        $carreraAlumno=Alumno::where('id','=',$expediente->idAlumno)->first();
        
        $carrera=Carrera::where('id', $carreraAlumno->carrera)->first();
        
        $expediente->nombreCarrera=$carrera->nombre;


        $profesores=Profesor::where('departamento','=',$usuario->departamento)
                    ->get();

        $comentarios=self::mostrarComentarios($expediente->id);


        $registros=Registro::where('expediente','=',$idExpediente)
                            ->join('estatus','registro.estatus','=','estatus.id')
                            ->latest()->get(['registro.*','estatus.nombre as nombreEstado','estatus.prioridad']);   
        
        $documentosPendiente=documento_pivote::where('expediente',$expediente->id)->where('autorizado',0)->get();
        $documentosRevision=documento_pivote::where('expediente',$expediente->id)->where('autorizado',1)->get();
        $documentosAutorizado=documento_pivote::where('expediente',$expediente->id)->where('autorizado',2)->get();
        return view('jefeoficina.expediente', compact('usuario','expediente','profesores','comentarios','registros','documentosAutorizado','documentosRevision','documentosPendiente'));
    }
    public function asignarAsesor(Request $request)
    {
        $expediente=Expediente::findOrFail($request->input('idExpediente'));
        $expediente->asesorInterno=$request->input('menuProfesores');
        $expediente->estatus=3;
        $expediente->save();

        $registro=new Registro;
        $registro->expediente=$request->input('idExpediente');
        $registro->estatus=1;
        $registro->save();


        return redirect('jefeoficina/expedientes/ver/'.$request->input('idExpediente').'');
    }

    public function agregarComentario(Request $request)
    {
        $usuario=Auth::user();
        $nombreCompleto=$usuario->nombre.' '.$usuario->apellidoPaterno.' '.$usuario->apellidoMaterno;
        $comentario=new Comentario;

        if ($request->documento==null) {
            $comentario->documento=0;
        }else{
            $comentario->documento=$request->menuDocumentos;
        }
        
        $comentario->autor=$nombreCompleto;
        $comentario->cargo='Jefe de proyecto Vinculacion';
        
        $comentario->comentario=$request->comentario;
        $comentario->expediente=$request->expediente;
        
        $comentario->save();

        $comentario=Comentario::latest()->first();
        return redirect('jefeoficina/expedientes/ver/'.$request->expediente.'');
    }

    public static function mostrarComentarios($idExpediente)
    {
        $comentarios=Comentario::where('expediente','=',$idExpediente)
                    ->orderBy('created_at', 'desc')
                    ->get();
        return $comentarios;
    }

    public function showDocumentos()
    {
        $usuario=Auth::user();
        $documentos=documento::all();

        return view('jefeoficina.documentos', compact('usuario','documentos'));
    }
    public function storeDocumento(Request $request)
    {
        $documento=new documento;
        $documento->nombre = $request->nombreDocumento;
        $documento->link = $request->linkDocumento;
        $documento->save();
        return redirect()->route('jefeoficina.show.documentos');
    }
    public function deleteDocumentos($idDocumento)
    {
        $vacante=documento::find($idDocumento);                 
        $vacante->delete();
        return redirect()->route('jefeoficina.show.documentos');   
    }

    public function aprobarDocumento(Request $request)
    {
        $documento_pivote = documento_pivote::where('id', $request->idDocumento)->first();
        $documento_pivote->autorizado = 2;
        $documento_pivote->save();
        return redirect('jefeoficina/expedientes/ver/'.$request->idExpediente.'');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
     * @param  \App\Models\Profesor  $profesor
     * @return \Illuminate\Http\Response
     */
    public function show(Profesor $profesor)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Profesor  $profesor
     * @return \Illuminate\Http\Response
     */
    public function edit(Profesor $profesor)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Profesor  $profesor
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Profesor $profesor)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Profesor  $profesor
     * @return \Illuminate\Http\Response
     */
    public function destroy(Profesor $profesor)
    {
        //
    }
}
