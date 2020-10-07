<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Profesor extends Authenticatable
{
    protected $table = 'profesor';
    protected $guard = 'profesor';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'noControl', 'nombre', 'apellidoPaterno', 'apellidoMaterno', 'departamento', 'correoElectronico', 'correoElectronicoTecNM', 'especialidad', 'sexo', 
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
    ];
}
