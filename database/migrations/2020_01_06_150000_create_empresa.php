<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmpresa extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('empresas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('cuit_cuil');
            $table->string('razon_social');
            $table->bigInteger('sector_id')->unsigned();
            $table->foreign('sector_id')->references('id')->on('sectores');
            $table->bigInteger('seccion_id')->unsigned(); 
            $table->foreign('seccion_id')->references('id')->on('secciones');
            $table->bigInteger('grupo_id')->unsigned(); 
            $table->foreign('grupo_id')->references('id')->on('grupos');
            $table->bigInteger('categoria_pyme_id')->unsigned(); 
            $table->foreign('categoria_pyme_id')->references('id')->on('categoria_pyme');
            $table->bigInteger('organizacion_empresaria_id')->unsigned(); 
            $table->foreign('organizacion_empresaria_id')->references('id')->on('organizacion_empresaria'); // Relacion uno a muchos -> https://stackoverflow.com/questions/48841221/one-to-many-relationship-laravel-migration
            $table->integer('cantidad_empleados');
            $table->string('calle');
            $table->string('numero');
            $table->string('cp');
            $table->bigInteger('localidad_gid')->unsigned(); 
            $table->foreign('localidad_gid')->references('gid')->on('localidades');
            $table->string('email');
            $table->boolean('es_cooperativa');
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
        Schema::dropIfExists('empresas');
        DB::statement('SET FOREIGN_KEY_CHECKS = 1');
    }
}
