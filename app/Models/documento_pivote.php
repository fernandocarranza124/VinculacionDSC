<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class documento_pivote extends Model
{
    use HasFactory;
    protected $table = 'documento_pivote';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id', 'documento','enlace','expediente','autorizado',
    ];
    public $timestamps = true;
}
