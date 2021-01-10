<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateComentariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comentario', function (Blueprint $table) {
            $table->id();
            $table->string('autor');
            $table->string('cargo');
            $table->foreignId('documento')->nullable();
            $table->text('comentario');
            $table->timestamps();
            $table->foreignId('expediente');

            $table->foreign('expediente')->references('id')->on('expediente');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('comentario');
    }
}
