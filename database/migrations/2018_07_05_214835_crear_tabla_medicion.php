<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CrearTablaMedicion extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mediciones', function (Blueprint $table) {
            $table->increments('id')->unique();
            $table->string('nombre', 60);
            $table->timestamp('fecha');
            $table->string('descripcion', 300);
            $table->integer('nroReferencia');
            $table->string('evaluadores', 300);
            $table->string('proposito', 300);
            $table->string('objeto', 300);
            $table->string('entidad', 300);
            $table->string('foco', 300);
            $table->string('contexto', 300);
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
        Schema::dropIfExists('mediciones');
    }
}
