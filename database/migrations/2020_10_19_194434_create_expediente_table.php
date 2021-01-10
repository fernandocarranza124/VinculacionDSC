<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExpedienteTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('expediente', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('alumno');
            $table->string('tipoSeguroExtra');
            $table->char('numeroSeguroExtra', 20);
            $table->unsignedBigInteger('asesorInterno');
            $table->unsignedBigInteger('periodo');
            $table->string('nombreProyecto');
            $table->string('opcion');
            $table->string('nombreEmpresa');
            $table->string('rfcEmpresa');
            $table->string('giroEmpresa');
            $table->string('calleEmpresa');
            $table->string('coloniaEmpresa');
            $table->string('ciudadEmpresa');
            $table->string('faxEmpresa');
            $table->string('telefonoEmpresa');
            $table->string('titularEmpresa');
            $table->string('puestoTitularEmpresa');
            $table->string('asesorExterno');
            $table->string('puestoAsesorExterno');
            $table->string('nombreIntermediarioEmpresa');
            $table->string('puestoIntermediarioEmpresa');
            $table->string('misionEmpresa');
            $table->foreign('alumno')->references('id')->on('alumno')->constrained()
                ->onDelete('cascade');
            $table->foreign('asesorInterno')->references('id')->on('profesor')->constrained()
                ->onDelete('cascade');
            $table->foreign('periodo')->references('id')->on('periodo')->constrained()
                ->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('periodo');
    }
}
