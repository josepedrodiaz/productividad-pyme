<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLocalidadesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('localidades', function (Blueprint $table) {
            $table->bigIncrements('gid');
            $table->string('cod_prov');
            $table->string('nom_prov');
            $table->string('cod_depto');
            $table->string('nom_depto');
            $table->string('cod_loc');
            $table->string('cod_sit');
            $table->string('cod_entidad');
            $table->integer('cod_bahra');
            $table->string('nombre_bahra');
            $table->string('lat_gd');
            $table->string('long_gd');
            $table->string('lat_gms');
            $table->string('long_gms');
            $table->string('fuente_ubicacion');
            $table->string('the_geom');
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
        Schema::dropIfExists('localidades');
    }
}
