<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRespuestasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('respuestas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('texto_respuesta');
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
        Schema::dropIfExists('respuestas');
        DB::statement('SET FOREIGN_KEY_CHECKS = 1');
    }
}
