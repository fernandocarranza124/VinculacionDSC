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
use PDF;
use Carbon\Carbon;
use Response;

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
                        ->leftjoin('carrera', 'carrera.id','=','alumno.carrera')
                        ->leftjoin('departamento','departamento.id','=','carrera.departamento')
                        ->leftjoin('profesor','profesor.id','=','expediente.asesorInterno')
                        ->where('departamento.id','=',$usuario->departamento )
                        // where('id','=',$expediente->idAlumno)
                        ->get(
                            ['expediente.id','expediente.nombreProyecto','alumno.nombre','alumno.apellidoMaterno','alumno.apellidoPaterno','alumno.noControl','profesor.nombre as asesorNombre','profesor.apellidoPaterno as asesorApellidoPaterno','profesor.apellidoMaterno as asesorApellidoMaterno','alumno.carrera as carreraAlumno']
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
        $fecha=$expediente->created_at;
        
        $expediente->fechaInicio=self::obtieneFecha($fecha);

        $profesores=Profesor::where('departamento','=',$usuario->departamento)
                    ->get();

        $comentarios=self::mostrarComentarios($expediente->id);


        $registros=Registro::where('expediente','=',$idExpediente)
                            ->join('estatus','registro.estatus','=','estatus.id')
                            ->latest()->get(['registro.*','estatus.nombre as nombreEstado','estatus.prioridad']);   
        
        $documentosPendiente=documento_pivote::where('expediente',$expediente->id)->where('autorizado',0)->get();
        $documentosRevision=documento_pivote::where('expediente',$expediente->id)->where('autorizado',1)->get();
        $documentosAutorizado=documento_pivote::where('expediente',$expediente->id)->where('autorizado',2)->get();
        $documentosRegistrados=documento::all();



        return view('jefeoficina.expediente', compact('usuario','expediente','profesores','comentarios','registros','documentosAutorizado','documentosRevision','documentosPendiente','documentosRegistrados'));
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
    public function asignarAsesor(Request $request)
    {
        $expediente=Expediente::findOrFail($request->input('idExpediente'));
        $expediente->asesorInterno=$request->input('menuProfesores');
        $expediente->estatus=3;
        $expediente->save();

        $registro=new Registro;
        $registro->expediente=$request->input('idExpediente');
        $registro->estatus=3;
        $registro->save();


        return redirect('jefeoficina/expedientes/ver/'.$request->input('idExpediente').'');
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
        $comentario->cargo='Jefe de proyecto Vinculacion';
        
        $comentario->comentario=$request->comentario;
        $comentario->expediente=$request->expediente;
        
        $comentario->save();

        $comentario=Comentario::latest()->first();
        return redirect('jefeoficina/expedientes/ver/'.$request->expediente.'');
    }
    public function eliminarComentario(Request $request)
    {
        
        $comentario = Comentario::find($request->idComentario);
        $comentario->delete();
        return redirect('jefeoficina/expedientes/ver/'.$request->idExpediente.'');   

    }

    public static function mostrarComentarios($idExpediente)
    {
        $comentarios=Comentario::where('expediente','=',$idExpediente)
                    ->leftjoin('documento','comentario.documento','=','documento.id')
                    ->orderBy('created_at', 'desc')
                    ->get(['comentario.*','documento.nombre as nombreDocumento', 'documento.link as link']);
                    
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

        $registro=new Registro;
        $registro->expediente=$request->idExpediente;
        $registro->estatus=4;
        $registro->save();

        return redirect('jefeoficina/expedientes/ver/'.$request->idExpediente.'');
    }

    public function generarDocumento(Request $request)
    {
        $opcion = $request->menuGenerar;
        
        switch ($opcion) {
            case '1':
                $usuario=Auth::user();
                $documentos=documento::all();
                $expediente=Expediente::findOrFail($request->idExpediente);

                $alumno=Alumno::findOrFail($expediente->alumno);

                $carrera=Carrera::findOrFail($alumno->carrera);
                $fecha=Carbon::now();
                $fecha->toDateString();

                $fecha = substr($fecha, 0, -8);
                $nuevaFecha=substr($fecha, 8, 2).'/'.self::numeroMes(substr($fecha, 5, 2)).'/'.(substr($fecha, 0, 4));
                $Year=substr($fecha, 0, 4);

                $departamento=Departamento::findOrFail($carrera->departamento);



                $Folio=$request->idFolio;
                $asesorExterno=$expediente->asesorExterno;
                $puestoAsesorExterno=$expediente->puestoAsesorExterno;
                $Empresa=$expediente->nombreEmpresa;
                $Alumno=$alumno->nombre.' '.$alumno->apellidoPaterno.' '.$alumno->apellidoMaterno;
                $numeroControl=$alumno->noControl;
                $carreraAlumno=$carrera->nombre;
                $departamentoAlumno=$departamento->nombre;
                $seguroSocial=$alumno->seguroSocial;
                $fechaActual=$nuevaFecha;
                $pdf = PDF::loadView('jefeoficina.formatos.cartaPresentacion', compact('Folio','asesorExterno','puestoAsesorExterno','Empresa','Alumno', 'numeroControl','carreraAlumno','departamentoAlumno','seguroSocial','fechaActual','Year'))->setOptions(['defaultFont' => 'sans-serif']); 
                $nombreArchivo = ''.$numeroControl.'.pdf';
                return $pdf->download($nombreArchivo);
                break;
            case '2':
                $Folio=$request->idFolio;
                $expediente=Expediente::findOrFail($request->idExpediente);
                $Profesor=Profesor::findOrFail($expediente->asesorInterno);
                $alumno=Alumno::findOrFail($expediente->alumno);
                $fecha=Carbon::now();
                $fecha->toDateString();

                $fecha = substr($fecha, 0, -8);
                $nuevaFecha=substr($fecha, 8, 2).'/'.self::numeroMes(substr($fecha, 5, 2)).'/'.(substr($fecha, 0, 4));

                $asesorInterno=$Profesor->nombre.' '.$Profesor->apellidoPaterno.' '.$Profesor->apellidoMaterno;
                $carrera=Carrera::findOrFail($alumno->carrera);

                $periodo = substr($expediente->fechaInicio, 0, -9); 
                $nuevoPeriodo=substr($periodo, 8, 2).'/'.self::numeroMes(substr($periodo, 5, 2)).'/'.(substr($periodo, 0, 4));
                $Year=substr($fecha, 0, 4);       
                // dd($nuevoPeriodo);
                $fechaActual=$nuevaFecha;
                $Alumno=$alumno->nombre.' '.$alumno->apellidoPaterno.' '.$alumno->apellidoMaterno;
                $carreraAlumno=$carrera->nombre;
                $proyecto=$expediente->nombreProyecto;
                $periodoRealizacion = $nuevoPeriodo;
                $Empresa=$expediente->nombreEmpresa;
                $departamento=Departamento::findOrFail($carrera->departamento);
                // Hoja 2
                $asesorExterno=$expediente->asesorExterno;
                $puestoAsesorExterno=$expediente->puestoAsesorExterno;
                $Empresa=$expediente->nombreEmpresa;
                $contacto=$expediente->telefonoEmpresa;
                $numeroControl=$alumno->noControl;
                $departamentoAlumno=$departamento->nombre;
                $correoAlumno = $alumno->correoTecNMAlumno;

                $telefonoAlumno = $alumno->telefono;
                $pdf = PDF::loadView('jefeoficina.formatos.asignacion', compact('Folio','asesorInterno','asesorExterno','puestoAsesorExterno','Empresa','Alumno', 'numeroControl','carreraAlumno','departamentoAlumno','fechaActual','Year','proyecto','periodoRealizacion','correoAlumno', 'telefonoAlumno'))->setOptions(['defaultFont' => 'sans-serif']); 
                $nombreArchivo ="Carta de asignacion de asesor - ".$numeroControl.".pdf";
                
                return $pdf->download($nombreArchivo);
                break;
            case '3':
                # code...
                break;
            case '4':
                # code...
                break;
            case '5':
                # code...
                break;
            
            default:
                # code...
                break;
        } 
        
    }
    // public function generarReporte()
    // {
    //     $usuario=Auth::user();
        
    //     $carreras=Carrera::all()
    //                 ->where('departamento','=',$usuario->departamento);
                    
        
        
    //     $headers = array(
    //         "Content-type"        => "text/csv",
    //         "Content-Disposition" => "attachment; filename=test",
    //         "Pragma"              => "no-cache",
    //         "Cache-Control"       => "must-revalidate, post-check=0, pre-check=0",
    //         "Expires"             => "0"
    //     );
    //     $columns = array('Carrera', 'Genero', 'Cantidad');
    //     $callback = function() use($carreras, $columns) {
    //         $handle = fopen('test.csv', 'w+');
    //         fputcsv($file, $columns);

    //         foreach ($carreras as $carrera) {
    //         $Hombre=count(Expediente::join('alumno','alumno.id','=','expediente.alumno')
    //                     ->leftjoin('carrera', 'carrera.id','=','alumno.carrera')
    //                     ->leftjoin('departamento','departamento.id','=','carrera.departamento')
    //                     ->where('departamento.id','=',$usuario->departamento )
    //                     ->where('alumno.sexo','=','Hombre')
    //                     ->where('carrera.id', '=',$carrera->id)
    //                     ->get(
    //                         ['expediente.id',]
    //                     ));
    //         $row['Carrera']  = $carrera->nombre;
    //         $row['Genero']    = "Masculino";
    //         $row['Cantidad']    = $Hombre;
    //             fputcsv($file, array($row['Carrera'], $row['Genero'], $row['Cantidad']));
    //         $Mujer=count(Expediente::join('alumno','alumno.id','=','expediente.alumno')
    //                     ->leftjoin('carrera', 'carrera.id','=','alumno.carrera')
    //                     ->leftjoin('departamento','departamento.id','=','carrera.departamento')
    //                     ->where('departamento.id','=',$usuario->departamento )
    //                     ->where('alumno.sexo','=','Mujer')
    //                     ->where('carrera.id', '=',$carrera->id)
    //                     ->get(
    //                         ['expediente.id',]
    //                     ));    
    //         $row['Carrera']  = $carrera->nombre;
    //         $row['Genero']    = "Femenino";
    //         $row['Cantidad']    = $Mujer;
    //             fputcsv($file, array($row['Carrera'], $row['Genero'], $row['Cantidad']));
    //         }

    //         fclose($file);
    //     };
    //     // $file=Storage::disk('public')->get("test.csv");
    //     $file = fopen('test.csv', 'w+');
    //         $headers = array(
    //         'Content-Type' => 'text/csv',
    //         );
    //         // dd($file);
    //     $filename="test.csv";
    //     //header('Content-Type' => 'text/csv');
    //     //readfile($filename);
    //     // return response()->download('test.csv', $headers);
    //     //return (new Response($file, 200))->header('Content-Type', 'document/csv');


    // }


    public function numeroMes($mes)
    {
        switch ($mes) {
            case '1':
                return "Enero";
                break;
            case '2':
                return "Febrero";
                break;
            case '3':
                return "Marzo";
                break;
            case '4':
                return "Abril";
                break;
            case '5':
                return "Mayo";
                break;
            case '6':
                return "Junio";
                break;
            case '7':
                return "Julio";
                break;
            case '8':
                return "Agosto";
                break;
            case '9':
                return "Septiembre";
                break;
            case '10':
                return "Octubre";
                break;
            case '11':
                return "Noviembre";
                break;
            case '12':
                return "Diciembre";
                break;
            
            default:
                return $mes;
                break;
        }
    }
    public function actualizarEstado(Request $request)
    {
        $expediente=Expediente::findOrFail($request->idExpediente);
        $expediente->estatus=$request->menufases;
        

        switch ($request->menufases) {
            case '1':
                $expediente->asesorInterno=null;
                $documentos=documento_pivote::where('expediente','=',$request->idExpediente)->get();
                foreach ($documentos as $documento) {
                    $documento->autorizado=0;
                    $documento->save();
                }
                $registros=Registro::where('expediente','=',$request->idExpediente)->get();
                        
                
                break;
            case '3':
                $documentos=documento_pivote::where('expediente','=',$request->idExpediente)->get();
                foreach ($documentos as $documento) {
                    $documento->autorizado=0;
                    $documento->save();
                }
                
                break;
            case '4':
                
                break;
            case '5':
                
                break;
            case '9':
                
                break;
            case '10':
                
                break;
            case '11':
                
                break;
            case '12':
                
                break;
            case '13':
                
                break;
            
            default:
                # code...
                break;
        }
        $expediente->save();
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
