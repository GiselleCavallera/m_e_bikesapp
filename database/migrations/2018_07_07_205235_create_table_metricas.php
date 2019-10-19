
<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableMetricas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('metricas', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre', 100);
            $table->double('valor', 5, 2);
            $table->string('medida', 70); //ej: m/minutos
            $table->integer('esPromedio'); // 1 o 0
            $table->integer('cantidadMedicionesPromedio'); //cantidad de mediciones que se hicieron para calcular el promedio 
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
        Schema::dropIfExists('metricas');
    }
}
