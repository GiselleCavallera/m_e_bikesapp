<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableIndicadoresElementales extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('indicadores_elementales', function (Blueprint $table) {
            $table->increments('id');
            $table->double('valor', 5, 2);
            $table->integer('idIEReferencia');            
            $table->integer('idAtributo'); 
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
        Schema::table('indicadores_elementales', function (Blueprint $table) {
            //
        });
    }
}
