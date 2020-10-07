<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Auth\Authenticatable;

class Alumno extends Model implements AuthenticatableContract
{
use Authenticatable;
protected $table = 'alumno';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'noControl', 'nombre', 'apellidoPaterno', 'apellidoMaterno', 'semestre', 'carrera', 'correoElectronico', 'correoElectronicoTecNM', 'especialidad', 'sexo', 
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    
}
