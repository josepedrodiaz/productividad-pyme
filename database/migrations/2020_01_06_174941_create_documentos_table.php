<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDocumentosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('documentos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nombre');
            $table->string('url_documento');
            $table->bigInteger('rubro_id')->unsigned();
            $table->foreign('rubro_id')->references('id')->on('rubros');
            $table->dateTime('vigencia_desde')->nullable();
            $table->dateTime('vigencia_hasta')->nullable();
            $table->string('descripcion');
            $table->string('ruta_archivo')->nullable();
            $table->string('ruta_imagen')->nullable();
            $table->string('url_video')->nullable();
            $table->bigInteger('sector_id')->unsigned();
            $table->foreign('sector_id')->references('id')->on('sectores');
            $table->bigInteger('categoria_pyme_id')->unsigned();
            $table->foreign('categoria_pyme_id')->references('id')->on('categoria_pyme');
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
        Schema::dropIfExists('documentos');
        DB::statement('SET FOREIGN_KEY_CHECKS = 1');
    }
}
