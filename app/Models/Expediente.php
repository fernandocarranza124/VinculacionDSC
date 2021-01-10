<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Expediente extends Model
{
    use HasFactory;
    protected $table = 'expediente';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id', 'alumno','tipoSeguroExtra','numeroSeguroExtra','asesorInterno','periodo','nombreProyecto','opcion','nombreEmpresa','rfcEmpresa','giroEmpresa','calleEmpresa','coloniaEmpresa','ciudadEmpresa','faxEmpresa','telefonoEmpresa','titularEmpresa','puestoTitularEmpresa','asesorExterno','puestoAsesorExterno','nombreIntermediarioEmpresa','puestoIntermediarioEmpresa','misionEmpresa','estatus', 'fechaInicio', 'fechaFinaliza','solicitudResidenciasProfesionales','cartaResponsiva','constanciaActividadesComplementarias','constanciaServicioSocial','bosquejoResidente','Nube',
    ];
    public $timestamps = true;
}
