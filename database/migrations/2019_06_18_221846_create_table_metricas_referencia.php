<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableMetricasReferencia extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('metricas_referencia', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre', 100);
            $table->char('escala', 130);
            $table->text('descripcion');            
            $table->boolean('esPromedio');            
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
        Schema::dropIfExists('metricas_referencia');
    }
}
