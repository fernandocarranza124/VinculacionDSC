<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddDocumentacionToExpediente extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('expediente', function (Blueprint $table) {
            $table->string('solicitudResidenciasProfesionales')->nullable();
            $table->string('cartaResponsiva')->nullable();
            $table->string('constanciaActividadesComplementarias')->nullable();
            $table->string('constanciaServicioSocial')->nullable();
            $table->string('bosquejoResidente')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('expediente', function (Blueprint $table) {
            //
        });
    }
}
