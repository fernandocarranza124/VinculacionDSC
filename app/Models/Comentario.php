<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comentario extends Model
{
    use HasFactory;
     protected $table = 'comentario';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id', 'autor','cargo','documento','comentario','expediente','created_at','updated_at',
    ];
    protected $attributes = [
        'documento' => 0,
    ];
    public $timestamps = true;
}
