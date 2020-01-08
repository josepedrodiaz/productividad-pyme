<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRespuestasUsuarioTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('respuestas_usuario', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('respuesta_opcion_id')->unsigned();
            $table->foreign('respuesta_opcion_id')->references('id')->on('respuestas_opciones');
            $table->integer('ponderacion');
            $table->bigInteger('encuesta_id')->unsigned();
            $table->foreign('encuesta_id')->references('id')->on('encuestas');
            $table->bigInteger('pregunta_id')->unsigned();
            $table->foreign('pregunta_id')->references('id')->on('preguntas');
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
        DB::statement('SET FOREIGN_KEY_CHECKS = 0');
        Schema::dropIfExists('respuestas_usuario');
        DB::statement('SET FOREIGN_KEY_CHECKS = 1');
    }
}
