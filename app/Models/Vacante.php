<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vacante extends Model
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id', 'nombre', 'ArqWeb', 'IngSof', 'SrgInf', 'empresa', 'telefono', 'activa','departamento',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    
}
