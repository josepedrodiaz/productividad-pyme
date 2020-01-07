<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePreguntasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('preguntas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('texto_pregunta');
            $table->bigInteger('eje_id')->unsigned();  
            $table->foreign('eje_id')->references('id')->on('ejes');
            $table->bigInteger('sector_id')->unsigned();
            $table->foreign('sector_id')->references('id')->on('sectores');
            $table->boolean('activa');
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
        Schema::dropIfExists('preguntas');
        DB::statement('SET FOREIGN_KEY_CHECKS = 1');
    }
}
