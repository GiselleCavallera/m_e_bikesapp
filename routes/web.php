<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    //return view('welcome');
    return view('pantallaInicial_');
})->name('inicio');

Route::get('/home',function () {
    //return view('welcome');
    return view('pantallaInicial');
})->name('home');

Route::resource('/mediciones', 'MedicionesController');

Route::get('/medicion', function () {
    return view('medicion');
})->name('medicion');

Route::get('/nuevaMedicion', function () {
    return view('nuevaMedicion');
})->name('nuevaMedicion');	

Route::get('/listadoMediciones', 'MedicionesController@mostrarListado')->name('listadoMediciones');


Route::post('saveMetrica/{siglasMetrica}/{idMedicion}', 'MetricasController@store')->name('saveMetrica');

Route::post('/operadoresYPesosReq/{idMedicion}', 'MedicionesController@grabarOperadoresYPesosRequerimientos')->name('grabarOperadoresYPesosReq');

Route::post('/pesosReq/{idMedicion}', 'MedicionesController@grabarPesosRequerimientos')->name('grabarPesosReq');

Route::post('saveRangos/{idMedicion}', 'RangosDecisionController@store')->name('saveRangos');

Route::resource('/indicadorDerivado', 'IndicadorDerivadoController');

Route::get('rangos/{idMedicion}', 'RangosDecisionController@show')->name('rangos');


Route::get('consultaMetrica/{idMetrica}', 'MetricasController@mostrarMetrica')->name('consultaMetrica');

Route::post('/comparacion', 'MedicionesController@compararMediciones')->name('comparacion');

Route::post('/saveComentarios/{idMedicion}', 'MedicionesController@saveComentarios')->name('saveComentarios');

Route::get('consultaProyecto/{idMedicion}', 'MedicionesController@obtenerResultadosProyecto')->name('consultaProyecto');

Route::get('logs', '\Rap2hpoutre\LaravelLogViewer\LogViewerController@index');