<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Auth;
use App\User;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    //protected $redirectTo = RouteServiceProvider::HOME;
    function redirectTo(){
        $redirectTo = '/tickets';    
        $user=Auth::user()->rol;
        switch ($user) {
            case 1:
                return '/home';
                // Sin validar
                break;
            case 2:
                return 'tickets';
                // Administrador
                break;
            case 3:
                return 'tickets';
                // Asesor
                break;
            case 4:
                return 'tickets';
                // Alumno
                break;
            case 5:
                return ('esperaAprob');
                break;
            default:
                return 'seguimiento';
                # code...
                break;
        }
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
    public function username()
{
    return 'no_control';
}
}
