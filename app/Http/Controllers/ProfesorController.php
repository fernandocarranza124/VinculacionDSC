<?php

namespace App\Http\Controllers;

use App\Models\Profesor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Expediente;
use App\Http\Controllers\Controller;
use App\Models\Alumno;
use App\Models\Carrera;
use App\Models\Comentario;
class ProfesorController extends Controller
{


    public function __construct()
    {
        $this->middleware('auth:profesor');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $usuario=Auth::user();
        return view('profesor.home', compact('usuario'));
    }
    public function consultaResidentes()
    {
        $usuario=Auth::user();
        

        $expedientes=Expediente::where('expediente.asesorInterno','=',$usuario->id)
                        ->join('alumno','alumno.id','=','expediente.alumno')
                        ->get(
                            ['expediente.id','expediente.nombreProyecto','alumno.nombre','alumno.apellidoMaterno','alumno.apellidoPaterno','alumno.noControl','expediente.asesorInterno']
                        );
                        

                    // dd($expedientes);
        

        return view('profesor.expedientes', compact('usuario', 'expedientes'));;
    }

    public function editExpediente($idExpediente)
    {
        
        

        $usuario=Auth::user();
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

        $comentarios=self::mostrarComentarios($expediente->id);
        // dd($profesores);

        // dd($expediente);
        return view('profesor.expediente', compact('usuario','expediente','comentarios'));
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
        $comentario->cargo='Asesor Interno';
        
        $comentario->comentario=$request->comentario;
        $comentario->expediente=$request->expediente;
        
        $comentario->save();

        $comentario=Comentario::latest()->first();
        return redirect('profesor/expedientes/ver/'.$request->expediente.'');
    }

    public static function mostrarComentarios($idExpediente)
    {
        $comentarios=Comentario::where('expediente','=',$idExpediente)
                    ->orderBy('created_at', 'desc')
                    ->get();
        return $comentarios;
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
