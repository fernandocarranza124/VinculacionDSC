<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAlumnoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('alumno', function (Blueprint $table) {
            $table->id();
            $table->char('noControl')->unique();
            $table->string('password');
            $table->string('nombre');
            $table->string('apellidoPaterno');
            $table->string('apellidoMaterno');
            $table->smallInteger('semestre');
            $table->unsignedBigInteger('carrera');
            $table->string('correoElectronico');
            $table->string('correoElectronicoTecNM');
            $table->string('especialidad');
            $table->string('sexo');
            $table->string('domicilio');
            $table->string('telefono');
            $table->char('segurosocial');
            $table->unsignedBigInteger('seguroextra');
            $table->string('numeroseguroextra');
            $table->timestamps();
            $table->rememberToken();
            $table->foreign('carrera')->references('id')->on('carrera')->constrained()
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('alumno');
    }
}
