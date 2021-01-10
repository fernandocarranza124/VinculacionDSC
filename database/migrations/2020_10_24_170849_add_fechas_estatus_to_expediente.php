<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFechasEstatusToExpediente extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('expediente', function (Blueprint $table) {
            $table->dateTime('fechaInicio',0)->nullable();
            $table->dateTime('fechaFinaliza',0)->nullable();
            $table->unsignedBigInteger('estatus')->nullable();
            $table->foreign('estatus')->references('id')->on('estatus')->constrained()
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
        Schema::table('expediente', function (Blueprint $table) {
            //
        });
    }
}
