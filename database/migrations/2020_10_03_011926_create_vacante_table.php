<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVacanteTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vacante', function (Blueprint $table) {
            $table->id();
            $table->string('empresa');
            $table->boolean('TecWeb');
            $table->boolean('IngSof');
            $table->boolean('SegInf');
            $table->char('telefono');
            $table->boolean('activa');
            $table->unsignedBigInteger('departamento');
            $table->timestamps();
            $table->foreign('departamento')->references('id')->on('departamento')->constrained()
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
        Schema::dropIfExists('vacante');
    }
}
