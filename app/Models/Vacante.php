<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vacante extends Model
{
    use HasFactory;
    protected $table = 'vacante';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id', 'TecWeb', 'IngSof', 'SrgInf', 'empresa', 'telefono', 'activa','departamento','ruta',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    
}
