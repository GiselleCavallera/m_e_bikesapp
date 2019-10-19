<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class EditTablaMetricas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('metricas', function (Blueprint $table) {
            $table->dropColumn('nombre');
            $table->dropColumn('medida');
            $table->dropColumn('esPromedio');
            $table->dropColumn('cantidadMedicionesPromedio');
            
            $table->integer('idAtributo');
            $table->integer('idMetricaReferencia');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('metricas', function (Blueprint $table) {
            //
        });
    }
}
