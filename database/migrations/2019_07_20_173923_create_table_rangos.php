<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableRangos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rangos_decisiones', function (Blueprint $table) {
            $table->increments('id');
            $table->string('valoracion', 100);
            $table->text('descripcion'); 
            $table->double('valorMinimo');
            $table->double('valorMaximo');
            $table->string('color', 40);
            $table->integer('orden');
            $table->integer('idMedicion');
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
        Schema::table('rangos_decisiones', function (Blueprint $table) {
            //
        });
    }
}
