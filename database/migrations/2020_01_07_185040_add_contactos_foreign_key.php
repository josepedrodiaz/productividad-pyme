<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddContactosForeignKey extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('contactos', function(Blueprint $table){
            $table->bigInteger('empresa_id')->unsigned();//create field
            $table->foreign('empresa_id')->references('id')->on('empresas');//fk
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('contactos', function($table) {
            $table->dropForeign('contactos_empresa_id_foreign');
            $table->dropColumn('empresa_id'); });
    }
}
