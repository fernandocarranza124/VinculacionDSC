<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\JefeOficina;
use App\Models\Vacante;
use App\Models\Departamento;
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
