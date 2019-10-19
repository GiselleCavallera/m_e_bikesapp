<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTablaFuncionesConjuncionDisyuncion extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //Tabla de consulta. 
        /* Continene  los  valores  más  relevantes  para r, teniendo  en  cuenta  los n valores  de  entrada de una función */ 
         Schema::create('funcionesConjuncionDisyuncion', function (Blueprint $table) {
            $table->increments('id')->unique();  
            $table->string('nombreOperacion', 80);
            $table->string('simbolo', 5);            
            $table->integer('cantidadValoresDeEntrada');
            $table->double('r', 3, 2);
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
        //
    }
}
