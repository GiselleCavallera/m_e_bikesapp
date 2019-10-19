<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTablaOperadoresElegidos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('operadoresElegidos', function (Blueprint $table) {
            $table->increments('id')->unique();
            $table->string('atributo', 200);
            $table->string('operador', 4);
            $table->integer('nroOrden'); 
            $table->integer('nroSubitem'); 
            $table->timestamps(); 
            //Pesos establecidos para cada atributo. El mayor concepto a medir (Calidad) tendría nro de orden 0. Luego, cada artibuto tienen números consecutivos 1,2,3...
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('operadoresElegidos');
    }
}
