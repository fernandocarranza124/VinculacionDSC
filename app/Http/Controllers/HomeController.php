<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request; 
use Auth;
use App\User;
use App\Permiso;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {  
        $usuario=User::where('id',Auth::user()->id)->get();
        $usuario=self::Extrae_array($usuario);
        $permisos=Permiso::where('id_usuario', $usuario->id)->get();
        //dd($permisos);
        return view('home',compact('permisos'));
    }

    public function Extrae_array(object $array)
    {
        $array=$array[0];
        return $array;
    }
}
