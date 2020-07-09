<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Permiso extends Model
{
    protected $fillable = [
        'id_funcion', 'id_usuario', 
    ];
    protected $table = 'permisos';

}
