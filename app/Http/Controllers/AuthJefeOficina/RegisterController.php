<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        $validator=Validator::make($data, [
            'nombre' => ['required', 'string', 'max:255'],
            
        ]);
        // dd($validator);
        return $validator;
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        return User::create([
            'password' => Hash::make($data['password']),
            'nombre' => $data['nombre'],
            'noControl' => $data['noControl'],
            'apellidoMaterno' => $data['apellidoMaterno'],
            'apellidoPaterno' => $data['apellidoPaterno'],
            'semestre' => $data['semestre'],
            'carrera' => $data['carrera'],
            'correoElectronico' => $data['correoElectronico'],
            'correoElectronicoTecNM' => $data['email'],
            'especialidad' => $data['especialidad'],
            'sexo' => $data['sexo'],
            
        ]);
    }
}
