@extends('layouts.app')

 @section('my_styles')
        <!-- Fonts -->
        <link href="https://
        fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
        <link href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
        <script src="//netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
@endsection


@section('content')

        <div class="flex-center "> <!-- position-ref full-height -->
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>
                        <a href="{{ route('register') }}">Register</a>
                    @endauth
                </div>
            @endif            

            <div class="content" style="width: 90%">
                <div>
                    <br>
                    <p> <b><font size="6px">Automatización y aplicación de un Modelo de Calidad para flotas dinámicas en una Smart City</font></b></p>
                    <p>  <b></b></p>
                    <p> 
                    <!--NIVEL CALIDAD  @if ($id_calidad < 40)  
                            <span class="label label-danger">{{$id_calidad}} %</span>
                            @elseif ($id_calidad < 70 && $id_calidad > 40)
                            <span class="label label-warning">{{$id_calidad}} %</span>
                            @else
                            <span class="label label-success">{{$id_calidad}} %</span>
                    @endif

                    </p>
                    <!--{!! $msj !!} -->

                </div>


                <!--
                {!! Form::open([ 'route' => 'mediciones.store', 'method' => 'POST', 'id'=>'pesos_requerimientos']) !!}
                    <div id="requerimientos_nf"> 
                        <h4 > <b>Peso de cada REQUERIMIENTO NO FUNCIONAL:</b> </h4>
                        <b>ADECUACIÓN: &nbsp;  <input id="peso_adecuacion" type="text" class="form" name="peso_adecuacion" size="4" required>&nbsp; + &nbsp;
                        EFICIENCIA: &nbsp;  <input id="peso_eficiencia" type="text" class="form" name="peso_eficiencia" size="4" required>&nbsp; + &nbsp;
                        USABILIDAD: &nbsp;  <input id="peso_usabilidad" type="text" class="form" name="peso_usabilidad" size="4" required>&nbsp; + &nbsp;
                        FUNCIONALIDAD: &nbsp;  <input id="peso_funcionalidad" type="text" class="form" name="peso_funcionalidad" size="4" required> &nbsp;&nbsp; = 1  &nbsp;&nbsp;</b>
                        <button type="button" class="btn btn-primary" id="bt_requerimientos">  
                            <b>Guardar</b>
                        </button>
                    </div>
                {!! Form::close() !!}
                -->

                <br>
                <div id="detalle_carateristicas" class="row-lg-12" style="width: 100%; display: block">
                    <br><br>
                    <!-- Tab Attribute -->
                    <ul id="myTab" class="nav nav-tabs" style="width: 100%">
                        <li class="active"><a href="#adecuacion" data-toggle="tab"><b>1. Adecuación Funcional</b></a></li>
                        <li><a class="nav-link" href="#eficiencia" data-toggle="tab"><b>2. Eficiencia de Desempeño</b></a></li>
                        <li><a class="nav-link" href="#usabilidad" data-toggle="tab"><b>3. Usabilidad</b></a></li>
                        <li><a class="nav-link" href="#fiabilidad" data-toggle="tab"><b>4. Fiabilidad</b></a></li>
                    </ul>
                 
                    <div class="panel-body">
                        <!-- Tab Contents -->
                        <div id="myTabContent" class="tab-content" style="width: 100%">
                            <div class="tab-pane fade in active" role="tabpanel" id="adecuacion">  <!--class="tab-pane fade active in" -->
                                <h2 style="text-align: left;"><b>1.1.    COMPLETITUD FUNCIONAL</b></h2>
                                <!--<h4 style="text-align: left;"><b>Peso: <input id="peso_completitud" type="text" class="form" name="peso_completitud" size="2" required"></b></h4>-->
                                <h4 style="text-align: left;"><b>Métrica:  Integridad de implementación funcional: Iif = 1 – A / B 
                                &nbsp; 
                                <button type="button" class="btn btn-default btn-xs" onclick="abrir(1)">
                                    <span class="glyphicon glyphicon-question-sign" aria-hidden="true"></span>
                                </button> 
                                <!--<a href="" onclick="abrir(1);" class="btn btn-default btn-xs" style="display: inline-block;">
                                    <span class="glyphicon glyphicon-question-sign" aria-hidden="true"></span> </a>-->

                                </b></h4>  
                                
                                
                                {!! Form::open([ 'route' => ['saveMetrica', 'integridad', $medicion->id], 'method' => 'POST', 'id'=>'integridad']) !!}
                                <div id="integridad" style="text-align: left;">
                                    <b><p>A: Número de funciones faltantes detectadas: &nbsp;&nbsp; <input id="funciones_faltantes"  class="text" name="funciones_faltantes" size="4" required/></p>
                                    <p>B: Número de funciones descritas en la especificación de requerimientos: &nbsp;&nbsp;<input id="funciones_descritas" class="form" name="funciones_descritas" size="4"  required/> </p></b>
                                    <input type="button" class="btn btn-primary" id='bt_calcularIntegridad' value="Calcular">
                                    <!--<button  class="btn btn-primary" id='bt_calcularIntegridad' onclick="calcularIntegridad()"> 
                                        <b>Calcular </b>
                                     </button> -->
                                    <div id="resultado_integridad" style="display: inline-block;">
                                         <!--<div style="background-color: grey" style="display: inline-block;">-->
                                         &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                            <b>MÉTRICA: <input id="metrica_integridad" name="metrica_integridad" size="6" style="width: bold" class="text" /></b> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                          <!--</div>-->
                                         <!-- <div style="background-color: yellow" style="display: inline-block;"> -->
                                            <b>I.E.: %I_IF= Iif *100 = <input id="ie_integridad" name="ie_integridad" size="4" style="width: bold" class="text" /> </b>
                                         <!--</div>-->
                                    </div>
                                </div>
                                <input id="nroOrden"  class="text" name="nroOrden" size="4" readonly="true" value="1" hidden="true" />
                                <input id="nroSubitem"  class="text" name="nroSubitem" size="4" readonly="true" value="1" hidden="true"/>
                                <input id="idMetricaReferencia"  class="text" name="idMetricaReferencia" size="4" readonly="true" value="1" hidden="true"/>
                                <input id="idIEReferencia"  class="text" name="idIEReferencia" size="4" readonly="true" value="1" hidden="true"/>
                                {!! Form::close() !!}
                                
                                <h2 style="text-align: left;"><b>1.2.    CORRECIÓN FUNCIONAL</b></h2>                            
                                <!--<h4 style="text-align: left;"><b>Peso: </b><input id="peso_exactitud" type="text" class="form" name="peso_exactitud" size="2" required"></h4>-->
                                <h4 style="text-align: left;"><b>Métrica:  Exactitud Esperada: EE = 1 – CRD / Cft 
                                &nbsp; 
                                <button type="button" class="btn btn-default btn-xs" onclick="abrir(2)">
                                    <span class="glyphicon glyphicon-question-sign" aria-hidden="true"></span>
                                </button>                                  
                                </b></h4>

                                {!! Form::open([ 'route' => ['saveMetrica', 'exactitud', $medicion->id], 'method' => 'POST', 'id'=>'exactitud']) !!}
                                <div id="exactitud" style="text-align: left;">
                                    <p><b>CRD: Funciones con resultados diferentes a los esperados: &nbsp;</b><input id="crd_exactitud" class="text" name="crd_exactitud" size="4" required/> </p>
                                    <p><b>Cft: Cantidad de funciones totales: &nbsp;</b><input id="cft_exactitud" class="text" name="cft_exactitud" size="4" required/> </p>
                                    <!--<div id="pruebas_exactitud" style="display: none">
                                        <p><b>Funciones con resultados diferentes a los esperados:</b></p> 
                                        <div id="inputs_exactitud">
                                         
                                        </div>
                                    </div> -->
                                    <br>                                
                                    <!--<p>T: &nbsp;<input id="tiempo_operacion" class="text" name="tiempo_operacion" size="4" required> <b>Tiempo de operación de las pruebas en minutos.<b></p> -->
                                    
                                    <button type="submit" class="btn btn-primary" id="bt_calcularExactitud">
                                        <b>Calcular</b>
                                    </button>

                                    <div id="resultado_exactitud" style="display: inline-block;">
                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                       <b> MÉTRICA:</b> <input id="metrica_exactitud" name="metrica_exactitud" size="4" class="text" required/> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                        <b>I.E.:  %EE = EE * 100 = </b><input id="ie_exactitud" name="ie_exactitud" size="4" class="text" required/>
                                    </div>
                                </div>

                                <input id="nroOrden"  class="text" name="nroOrden" size="4" readonly="true" value="1" hidden="true"/>
                                <input id="nroSubitem"  class="text" name="nroSubitem" size="4" readonly="true" value="2" hidden="true"/>
                                <input id="idMetricaReferencia"  class="text" name="idMetricaReferencia" size="4" readonly="true" value="2" hidden="true"/>
                                <input id="idIEReferencia"  class="text" name="idIEReferencia" size="4" readonly="true" value="2" hidden="true"/>                                
                                {!! Form::close() !!}
                                <p></p>
                            </div>
                            

                            </b>

                            <div class="tab-pane fade" role="tabpanel" id="eficiencia">
                                <h2 style="text-align: left;"><b>2.1.    COMPORTAMIENTO TEMPORAL</b></h3>
                                <h4 style="text-align: left;"><b>Métrica: Tiempo Medio de Respuesta: TMR   -> Terminarrrr!!
                                &nbsp; 
                                <button type="button" class="btn btn-default btn-xs" onclick="abrir(3)">
                                    <span class="glyphicon glyphicon-question-sign" aria-hidden="true"></span>
                                </button> 
                                </b></h4>
                                
                                {!! Form::open([ 'route' => ['saveMetrica', 'tiempo_rta', $medicion->id], 'method' => 'POST', 'id'=>'tiempo_rta']) !!}
                                <div id="tmr" style="text-align: left;">
                                    <p><b>Cantidad de pruebas:  &nbsp;&nbsp; </b><input id="cant_pruebas_tiempo_rta" class="text" name="cant_pruebas_tiempo_rta" size="4" required onblur="obtenerInputsParaPromedio('tiempo_rta', 'Prueba')"></p> 
                                    <div id="pruebas_tiempo_rta" style="display: none">
                                        <p><b>T: Tiempo de respuesta:</b></p> 
                                        <div id="inputs_tiempo_rta">
                                         
                                        </div>
                                    </div>
                                    <br>
                                    <!--<p>T:  &nbsp;&nbsp; <input id="tiempo_rta" type="number" class="form" name="tiempo_rta" size="4" required></p> -->                               
                                    <button type="submit" class="btn btn-primary" id="bt_calcularTMR">
                                        <b>Calcular</b>
                                    </button> 

                                    <div id="resultado_tiempo_rta" style="display: inline-block;">
                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                        <b>MÉTRICA: </b><input id="metrica_tiempo_rta" name="metrica_tiempo_rta" size="4" class="text" required/> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                        <b>I.E.: %TMR = (1 – TMR) * 100 = </b><input id="ie_tiempo_rta" name="ie_tiempo_rta" size="4" class="text" required/>
                                    </div>
                                </div>
                                <input id="nroOrden"  class="text" name="nroOrden" size="4" readonly="true" value="2" hidden="true"/>
                                <input id="nroSubitem"  class="text" name="nroSubitem" size="4" readonly="true" value="1"hidden="true" />
                                <input id="idMetricaReferencia"  class="text" name="idMetricaReferencia" size="4" readonly="true" value="3" hidden="true"/>
                                <input id="idIEReferencia"  class="text" name="idIEReferencia" size="4" readonly="true" value="3" hidden="true"/>                                
                                {!! Form::close() !!}

                                <h2 style="text-align: left;"><b>2.2.    UTILIZACIÓN DE RECURSOS</b></h2>
                                <h4 style="text-align: left;"><b>Métrica: Ocurrencia de error en memoria: OEM  &nbsp; 
                                <button type="button" class="btn btn-default btn-xs" onclick="abrir(4)">
                                    <span class="glyphicon glyphicon-question-sign" aria-hidden="true"></span>
                                </button> 
                                </b></h4>

                                {!! Form::open([ 'route' => ['saveMetrica', 'oem', $medicion->id], 'method' => 'POST', 'id'=>'oem']) !!}
                                <div id="tmr" style="text-align: left;">
                                    <p><b>Cantidad máxima de errores:  &nbsp;&nbsp; </b><input id="cant_maxima_errores" class="text" name="cant_maxima_errores" size="4" required></p> 
                                    <p><b>Cantidad de pruebas:  &nbsp;&nbsp; </b><input id="cant_pruebas_oem" class="text" name="cant_pruebas_oem" size="4" required onblur="obtenerInputsParaPromedio('oem', 'Prueba')"></p> 
                                    <div id="pruebas_oem" style="display: none">
                                        <p><b>CE: Cantidad de Errores por prueba:</b></p> 
                                        <div id="inputs_oem">
                                         
                                        </div>
                                    </div>
                                    <br>
                                    <!--<p>T:  &nbsp;&nbsp; <input id="tiempo_rta" type="number" class="form" name="tiempo_rta" size="4" required></p> -->                               
                                    <button type="submit" class="btn btn-primary" id="bt_calcularOcurrenciaErrorM">
                                        <b>Calcular</b>
                                    </button> 

                                    <div id="resultado_oem" style="display: inline-block;">
                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                        <b>MÉTRICA: </b><input id="metrica_oem" name="metrica_oem" size="4" class="text" required/> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                        <b>I.E.: %OEM = (1 – OEM) * 100 = </b><input id="ie_oem" name="ie_oem" size="4" class="text" required/>
                                    </div>
                                    <input id="nroOrden"  class="text" name="nroOrden" size="4" readonly="true" value="2" hidden="true"/>
                                    <input id="nroSubitem"  class="text" name="nroSubitem" size="4" readonly="true" value="2" hidden="true"/>
                                    <input id="idMetricaReferencia"  class="text" name="idMetricaReferencia" size="4" readonly="true" value="4" hidden="true"/>
                                    <input id="idIEReferencia"  class="text" name="idIEReferencia" size="4" readonly="true" value="4" hidden="true"/>                                
                                    {!! Form::close() !!}
                                </div>
                                <!--<h3 style="text-align: left;"> <b>2.1.2.  Tiempo de espera: X = Ta / Tb</b></h3>
                                <div id="integridad" style="text-align: left;">
                                    <p><b>Ta:  </b>&nbsp;&nbsp; <input id="tiempo_espera" class="text" name="tiempo_espera" size="4" required></p> 
                                    <p><b>Tb: </b> &nbsp;&nbsp; <input id="tiempo_tarea" class="text" name="tiempo_tarea" size="4" required></p>                                
                                    <button type="submit" class="btn btn-primary">
                                        <b>Calcular</b>
                                    </button>
                                    <div id="resultado_tiempo_espera" style="display: inline-block;">
                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                        <b>MÉTRICA: </b><input id="metrica_tiempo_espera" name="metrica_tiempo_espera" size="4" class="text" required/> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                        <b>I.E.:</b> <input id="ie_tiempo_espera" name="ie_tiempo_espera" size="4" class="text" required/>
                                    </div>
                                </div>-->
                            </div>                            

                            <div class="tab-pane fade" role="tabpanel" id="usabilidad">
                                <h2 style="text-align: left;"><b>3.1.    INTELIGIBILIDAD</b></h2>
                                <h4 style="text-align: left;"><b>Métrica: Comprensión de entradas y salidas 
                                &nbsp; 
                                <button type="button" class="btn btn-default btn-xs" onclick="abrir(5)">
                                    <span class="glyphicon glyphicon-question-sign" aria-hidden="true"></span>
                                </button> 
                                </b></h4>
                                
                                {!! Form::open([ 'route' => ['saveMetrica', 'ces', $medicion->id], 'method' => 'POST', 'id'=>'ces']) !!}
                                <div id="inteligibilidad" style="text-align: left;">
                                    <p><b>Cantidad de E/S en interfaz:  &nbsp;&nbsp; </b><input id="cant_es_interfaz" class="text" name="cant_es_interfaz" size="4" required></p> 
                                    <p><b>Cantidad de usuarios:  &nbsp;&nbsp; </b><input id="cant_pruebas_ces" class="text" name="cant_pruebas_ces" size="4" required onblur="obtenerInputsParaPromedio('ces', 'Usuario')"></p> 
                                    <div id="pruebas_ces" style="display: none">
                                        <p><b>An: Cantidad de E/S no entendidos por el usuario:</b></p> 
                                        <div id="inputs_ces">
                                         
                                        </div>
                                    </div>
                                    <br>
                                    <!--<p>T:  &nbsp;&nbsp; <input id="tiempo_rta" type="number" class="form" name="tiempo_rta" size="4" required></p> -->                               
                                    <button type="submit" class="btn btn-primary" id="bt_calcularComprensionES">
                                        <b>Calcular</b>
                                    </button> 

                                    <div id="resultado_ces" style="display: inline-block;">
                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                        <b>MÉTRICA: </b><input id="metrica_ces" name="metrica_ces" size="4" class="text" required/> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                        <b>I.E.: %Ces = Ces * 100 = </b><input id="ie_ces" name="ie_ces" size="4" class="text" required/>
                                    </div>
                                </div>
                                <input id="nroOrden"  class="text" name="nroOrden" size="4" readonly="true" value="3" hidden="true"/>
                                <input id="nroSubitem"  class="text" name="nroSubitem" size="4" readonly="true" value="1" hidden="true"/>
                                <input id="idMetricaReferencia"  class="text" name="idMetricaReferencia" size="4" readonly="true" value="5" hidden="true"/>
                                <input id="idIEReferencia"  class="text" name="idIEReferencia" size="4" readonly="true" value="5" hidden="true"/> 
                                {!! Form::close() !!}

                                <h2 style="text-align: left;"><b>3.2.    APRENDIZAJE</b></h2>
                                <h4 style="text-align: left;"><b>Métrica: Facilidad de aprendizaje (FA)     &nbsp; 
                                <button type="button" class="btn btn-default btn-xs" onclick="abrir(6)">
                                    <span class="glyphicon glyphicon-question-sign" aria-hidden="true"></span>
                                </button> 
                                </b></h4>

                                {!! Form::open([ 'route' => ['saveMetrica', 'fa', $medicion->id], 'method' => 'POST', 'id'=>'fa']) !!}
                                <div id="aprendizaje" style="text-align: left;">
                                    <p><b>Cantidad de funciones totales:  &nbsp;&nbsp; </b><input id="cant_func_total" class="text" name="cant_func_total" size="4" required></p> 
                                    <p><b>Cantidad de usuarios:  &nbsp;&nbsp; </b><input id="cant_pruebas_fa" class="text" name="cant_pruebas_fa" size="4" required onblur="obtenerInputsParaPromedio('fa', 'Usuario')"></p> 
                                    <div id="pruebas_fa" style="display: none">
                                        <p><b>FA: Cantidad de funciones aprendidas correctamente por usuario:</b></p> 
                                        <div id="inputs_fa">
                                         
                                        </div>
                                    </div>
                                    <br>
                                    <!--<p>T:  &nbsp;&nbsp; <input id="tiempo_rta" type="number" class="form" name="tiempo_rta" size="4" required></p> -->                               
                                    <button type="submit" class="btn btn-primary" id="bt_calcularFacilidadAprendizaje">
                                        <b>Calcular</b>
                                    </button> 

                                    <div id="resultado_fa" style="display: inline-block;">
                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                        <b>MÉTRICA: </b><input id="metrica_fa" name="metrica_fa" size="4" class="text" required/> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                        <b>I.E.: %FA = FA * 100 = </b><input id="ie_fa" name="ie_fa" size="4" class="text" required/>
                                    </div>
                                </div>
                                <input id="nroOrden"  class="text" name="nroOrden" size="4" readonly="true" value="3" hidden="true"/>
                                <input id="nroSubitem"  class="text" name="nroSubitem" size="4" readonly="true" value="2" hidden="true"/>
                                <input id="idMetricaReferencia"  class="text" name="idMetricaReferencia" size="4" readonly="true" value="6" hidden="true"/>
                                <input id="idIEReferencia"  class="text" name="idIEReferencia" size="4" readonly="true" value="6" hidden="true"/> 
                                {!! Form::close() !!}

                                <h2 style="text-align: left;"><b>3.3.    OPERABILIDAD</b></h2>
                                <h4 style="text-align: left;"><b>Métrica: Capacidad para ser entendido el mensaje en uso (CE) 
                                &nbsp; 
                                <button type="button" class="btn btn-default btn-xs" onclick="abrir(7)">
                                    <span class="glyphicon glyphicon-question-sign" aria-hidden="true"></span>
                                </button> 
                                </b></h4>
                                {!! Form::open([ 'route' => ['saveMetrica', 'ce', $medicion->id], 'method' => 'POST', 'id'=>'ce']) !!}
                                <div id="aprendizaje" style="text-align: left;">
                                    <p><b>Cantidad de mensajes totales:  &nbsp;&nbsp; </b><input id="cant_msjs_total" class="text" name="cant_msjs_total" size="4" required></p> 
                                    <p><b>Cantidad de usuarios:  &nbsp;&nbsp; </b><input id="cant_pruebas_ce" class="text" name="cant_pruebas_ce" size="4" required onblur="obtenerInputsParaPromedio('ce', 'Usuario')"></p> 
                                    <div id="pruebas_ce" style="display: none">
                                        <p><b>An: Cantidad de mensajes no entendidos por usuario:</b></p> 
                                        <div id="inputs_ce">
                                         
                                        </div>
                                    </div>
                                    <br>
                                    <!--<p>T:  &nbsp;&nbsp; <input id="tiempo_rta" type="number" class="form" name="tiempo_rta" size="4" required></p> -->                               
                                    <button type="submit" class="btn btn-primary" id="bt_calcularCapacidadEntendido">
                                        <b>Calcular</b>
                                    </button> 

                                    <div id="resultado_ce style="display: inline-block;">
                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                        <b>MÉTRICA: </b><input id="metrica_ce" name="metrica_ce" size="4" class="text" required/> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                        <b>I.E.: %CE = CE * 100 = </b><input id="ie_ce" name="ie_ce" size="4" class="text" required/>
                                    </div>
                                </div>
                                <input id="nroOrden"  class="text" name="nroOrden" size="4" readonly="true" value="3" hidden="true"/>
                                <input id="nroSubitem"  class="text" name="nroSubitem" size="4" readonly="true" value="3" hidden="true"/>
                                <input id="idMetricaReferencia"  class="text" name="idMetricaReferencia" size="4" readonly="true" value="7" hidden="true"/>
                                <input id="idIEReferencia"  class="text" name="idIEReferencia" size="4" readonly="true" value="7" hidden="true"/> 
                                {!! Form::close() !!}

                                <h2 style="text-align: left;"><b>3.4.    ESTÉTICA</b></h2>
                                <h4 style="text-align: left;"><b>Métrica: Interacción Atractiva (IA) 
                                &nbsp; 
                                <button type="button" class="btn btn-default btn-xs" onclick="abrir(8)">
                                    <span class="glyphicon glyphicon-question-sign" aria-hidden="true"></span>
                                </button> 
                                </b></h4>
                                {!! Form::open([ 'route' => ['saveMetrica', 'ia', $medicion->id], 'method' => 'POST', 'id'=>'ia']) !!}
                                <div id="ia" style="text-align: left;">
                                    <p><b>Cantidad de usuarios:  &nbsp;&nbsp; </b><input id="cant_pruebas_ia" class="text" name="cant_pruebas_ia" size="4" required onblur="obtenerInputsParaPromedio('ia', 'Usuario')"></p> 
                                    <div id="pruebas_ia" style="display: none">
                                        <p><b>V: Valor puntuado por usuario:</b></p> 
                                        <div id="inputs_ia">
                                         
                                        </div>
                                    </div>
                                    <br>
                                    <!--<p>T:  &nbsp;&nbsp; <input id="tiempo_rta" type="number" class="form" name="tiempo_rta" size="4" required></p> -->                               
                                    <button type="submit" class="btn btn-primary" id="bt_calcularInteraccionAtractiva">
                                        <b>Calcular</b>
                                    </button> 

                                    <div id="resultado_ia" style="display: inline-block;">
                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                        <b>MÉTRICA: </b><input id="metrica_ia" name="metrica_ia" size="4" class="text" required/> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                        <b>I.E.: %IA = (IA * 100) / 10 = </b><input id="ie_ia" name="ie_ia" size="4" class="text" required/>
                                    </div>
                                </div>
                                <input id="nroOrden"  class="text" name="nroOrden" size="4" readonly="true" value="3" hidden="true"/>
                                <input id="nroSubitem"  class="text" name="nroSubitem" size="4" readonly="true" value="4" hidden="true"/>
                                <input id="idMetricaReferencia"  class="text" name="idMetricaReferencia" size="4" readonly="true" value="8" hidden="true"/>
                                <input id="idIEReferencia"  class="text" name="idIEReferencia" size="4" readonly="true" value="8" hidden="true"/> 
                                {!! Form::close() !!}


                                <h2 style="text-align: left;"><b>3.5.    ACCESIBILIDAD</b></h2>
                                <h4 style="text-align: left;"><b>Métrica: Accesibilidad Física (AF) CFA/CFT 
                                &nbsp; 
                                <button type="button" class="btn btn-default btn-xs" onclick="abrir(9)">
                                    <span class="glyphicon glyphicon-question-sign" aria-hidden="true"></span>
                                </button> 
                                </b></h4>

                                {!! Form::open([ 'route' => ['saveMetrica', 'af', $medicion->id], 'method' => 'POST', 'id'=>'af']) !!}
                                <div id="af" style="text-align: left;">
                                    <p><b>CFA= Cantidad de funciones accesibles:  &nbsp;&nbsp; </b><input id="cant_func_accesibles" class="text" name="cant_func_accesibles" size="4" required></p> 
                                    <p><b>CFT= Cantidad de funciones totales del software:  &nbsp;&nbsp; </b><input id="cant_func_totales" class="text" name="cant_func_totales" size="4" required></p>
                                    <br>
                                    <!--<p>T:  &nbsp;&nbsp; <input id="tiempo_rta" type="number" class="form" name="tiempo_rta" size="4" required></p> -->                               
                                    <button type="submit" class="btn btn-primary" id="bt_calcularAccesibilidadFisica">
                                        <b>Calcular</b>
                                    </button> 

                                    <div id="resultado_af" style="display: inline-block;">
                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                        <b>MÉTRICA: </b><input id="metrica_af" name="metrica_af" size="4" class="text" required/> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                        <b>I.E.: %AF = AF * 100 = </b><input id="ie_af" name="ie_af" size="4" class="text" required/>
                                    </div>
                                </div>
                                <input id="nroOrden"  class="text" name="nroOrden" size="4" readonly="true" value="3" hidden="true"/>
                                <input id="nroSubitem"  class="text" name="nroSubitem" size="4" readonly="true" value="5" hidden="true"/>
                                <input id="idMetricaReferencia"  class="text" name="idMetricaReferencia" size="4" readonly="true" value="9" hidden="true"/>
                                <input id="idIEReferencia"  class="text" name="idIEReferencia" size="4" readonly="true" value="9" hidden="true"/> 
                                {!! Form::close() !!}

                                <h2 style="text-align: left;"><b>3.6.    BENEFICIO</b></h2>
                                <h4 style="text-align: left;"><b>Métrica: Eficacia de los datos como un valor añadido (ED) 
                                &nbsp; 
                                <button type="button" class="btn btn-default btn-xs" onclick="abrir(10)">
                                    <span class="glyphicon glyphicon-question-sign" aria-hidden="true"></span>
                                </button> 
                                </b></h4>
                                {!! Form::open([ 'route' => ['saveMetrica', 'ed', $medicion->id], 'method' => 'POST', 'id'=>'ed']) !!}
                                <div id="ed" style="text-align: left;">
                                    <p><b>CDB: Cantidad de datos beneficiosos:   &nbsp;&nbsp; </b><input id="cant_datos_beneficiosos" class="text" name="cant_datos_beneficiosos" size="4" required></p> 
                                    <p><b>CDT: Cantidad de datos totales:  &nbsp;&nbsp; </b><input id="cant_datos_totales" class="text" name="cant_datos_totales" size="4" required></p>
                                    <br>
                                    <!--<p>T:  &nbsp;&nbsp; <input id="tiempo_rta" type="number" class="form" name="tiempo_rta" size="4" required></p> -->                               
                                    <button type="submit" class="btn btn-primary" id="bt_calcularEficaciaDatos">
                                        <b>Calcular</b>
                                    </button> 

                                    <div id="resultado_ed" style="display: inline-block;">
                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                        <b>MÉTRICA: </b><input id="metrica_ed" name="metrica_ed" size="4" class="text" required/> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                        <b>I.E.: %ED = ED * 100 = </b><input id="ie_ed" name="ie_ed" size="4" class="text" required/>
                                    </div>
                                </div>
                                <input id="nroOrden"  class="text" name="nroOrden" size="4" readonly="true" value="3" hidden="true"/>
                                <input id="nroSubitem"  class="text" name="nroSubitem" size="4" readonly="true" value="6" hidden="true"/>
                                <input id="idMetricaReferencia"  class="text" name="idMetricaReferencia" size="4" readonly="true" value="10" hidden="true"/>
                                <input id="idIEReferencia"  class="text" name="idIEReferencia" size="4" readonly="true" value="10" hidden="true"/> 
                                {!! Form::close() !!}

                                <h2 style="text-align: left;"><b>3.7.    INTERPRETABILIDAD</b></h2>
                                <h4 style="text-align: left;"><b>Métrica: Capacidad de Personalización de funciones, idiomas y símbolos (CP) &nbsp; 
                                <button type="button" class="btn btn-default btn-xs" onclick="abrir(11)">
                                    <span class="glyphicon glyphicon-question-sign" aria-hidden="true"></span>
                                </button> 
                                </b></h4>
                                {!! Form::open([ 'route' => ['saveMetrica', 'cp', $medicion->id], 'method' => 'POST', 'id'=>'cp']) !!}
                                <div id="cp" style="text-align: left;">
                                    <p><b>FSP: Cantidad de funciones satisfactoriamente personalizadas:  &nbsp;&nbsp; </b><input id="cant_funciones_personalizadas" class="text" name="cant_datos_beneficiosos" size="4" required></p> 
                                    <p><b>CDT: Cantidad de funciones totales:  &nbsp;&nbsp; </b><input id="cant_func_totales_cp" class="text" name="cant_func_totales_cp" size="4" required></p>
                                    <br>
                                    <!--<p>T:  &nbsp;&nbsp; <input id="tiempo_rta" type="number" class="form" name="tiempo_rta" size="4" required></p> -->                               
                                    <button type="submit" class="btn btn-primary" id="bt_calcularCapacidadPersonalizacion">
                                        <b>Calcular</b>
                                    </button> 

                                    <div id="resultado_cp" style="display: inline-block;">
                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                        <b>MÉTRICA: </b><input id="metrica_cp" name="metrica_cp" size="4" class="text" required/> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                        <b>I.E.: %CP= CP * 100 = </b><input id="ie_cp" name="ie_cp" size="4" class="text" required/>
                                    </div>
                                </div>
                                <input id="nroOrden"  class="text" name="nroOrden" size="4" readonly="true" value="3" hidden="true"/>
                                <input id="nroSubitem"  class="text" name="nroSubitem" size="4" readonly="true" value="7" hidden="true"/>
                                <input id="idMetricaReferencia"  class="text" name="idMetricaReferencia" size="4" readonly="true" value="11" hidden="true"/>
                                <input id="idIEReferencia"  class="text" name="idIEReferencia" size="4" readonly="true" value="11" hidden="true"/> 
                                {!! Form::close() !!}

                            </div>


                            <div class="tab-pane fade" role="tabpanel" id="fiabilidad">

                                <h2 style="text-align: left;"><b>4.1.    MADUREZ</b></h2>
                                <h4 style="text-align: left;"><b>Métrica: Densidad de fallas (DF) &nbsp; 
                                <button type="button" class="btn btn-default btn-xs" onclick="abrir(12)">
                                    <span class="glyphicon glyphicon-question-sign" aria-hidden="true"></span>
                                </button> 
                                </b></h4>
                                
                                {!! Form::open([ 'route' => ['saveMetrica', 'df', $medicion->id], 'method' => 'POST', 'id'=>'df']) !!}
                                <div id="df" style="text-align: left;">
                                    <p><b>Cantidad de funciones totales:  &nbsp;&nbsp; </b><input id="cant_func_total_df" class="text" name="cant_func_total_df" size="4" required></p> 
                                    <p><b>Cantidad de pruebas:  &nbsp;&nbsp; </b><input id="cant_pruebas_df" class="text" name="cant_pruebas_df" size="4" required onblur="obtenerInputsParaPromedio('df', 'Prueba')"></p> 
                                    <div id="pruebas_df" style="display: none">
                                        <p><b>FD: Número de fallas detectadas por usuario:</b></p> 
                                        <div id="inputs_df">
                                         
                                        </div>
                                    </div>
                                    <br>         
                                    <button type="submit" class="btn btn-primary" id="bt_calcularDensidadFallas">
                                        <b>Calcular</b>
                                    </button> 

                                    <div id="resultado_df" style="display: inline-block;">
                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                        <b>MÉTRICA: </b><input id="metrica_df" name="metrica_df" size="4" class="text" required/> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                        <b>I.E.: %DF = (1-DF) * 100 = </b><input id="ie_df" name="ie_df" size="4" class="text" required/>
                                    </div>
                                </div>
                                <input id="nroOrden"  class="text" name="nroOrden" size="4" readonly="true" value="4" hidden="true"/>
                                <input id="nroSubitem"  class="text" name="nroSubitem" size="4" readonly="true" value="1" hidden="true"/>
                                <input id="idMetricaReferencia"  class="text" name="idMetricaReferencia" size="4" readonly="true" value="12" hidden="true"/>
                                <input id="idIEReferencia"  class="text" name="idIEReferencia" size="4" readonly="true" value="12" hidden="true"/> 
                                {!! Form::close() !!}

                                <h2 style="text-align: left;"><b>4.2.    DISPONIBILIDAD</b></h2>
                                <h4 style="text-align: left;"><b>Métrica: Disponibilidad (D) &nbsp; 
                                <button type="button" class="btn btn-default btn-xs" onclick="abrir(13)">
                                    <span class="glyphicon glyphicon-question-sign" aria-hidden="true"></span>
                                </button> 
                                </b></h4>
                                {!! Form::open([ 'route' => ['saveMetrica', 'd', $medicion->id], 'method' => 'POST', 'id'=>'d']) !!}
                                <div id="d" style="text-align: left;">
                                    <p><b>CIT: Número total de intentos durante el tiempo de observación  &nbsp;&nbsp; </b><input id="cant_intentos_total" class="text" name="cant_intentos_total" size="4" required></p> 
                                    <p><b>Cantidad de usuarios:  &nbsp;&nbsp; </b><input id="cant_pruebas_d" class="text" name="cant_pruebas_d" size="4" required onblur="obtenerInputsParaPromedio('d', 'Usuario')"></p> 
                                    <div id="pruebas_d" style="display: none">
                                        <p><b>IS: Cantidad de intentos satisfactorios de disponibilidad del software cuando el usuario lo intenta usar.</b></p> 
                                        <div id="inputs_d">
                                         
                                        </div>
                                    </div>
                                    <br>         
                                    <button type="submit" class="btn btn-primary" id="bt_calcularDisponibilidad">
                                        <b>Calcular</b>
                                    </button> 

                                    <div id="resultado_d" style="display: inline-block;">
                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                        <b>MÉTRICA: </b><input id="metrica_d" name="metrica_d" size="4" class="text" required/> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                        <b>I.E.: %D = D * 100 = </b><input id="ie_d" name="ie_d" size="4" class="text" required/>
                                    </div>
                                </div>
                                <input id="nroOrden"  class="text" name="nroOrden" size="4" readonly="true" value="4" hidden="true"/>
                                <input id="nroSubitem"  class="text" name="nroSubitem" size="4" readonly="true" value="2" hidden="true"/>
                                <input id="idMetricaReferencia"  class="text" name="idMetricaReferencia" size="4" readonly="true" value="13" hidden="true"/>
                                <input id="idIEReferencia"  class="text" name="idIEReferencia" size="4" readonly="true" value="13" hidden="true"/> 
                                {!! Form::close() !!}

                                <h2 style="text-align: left;"><b>4.3.    TOLERANCIA A FALLOS</b></h2>
                                <h4 style="text-align: left;"><b>Métrica: Prevención de caídas (PC) &nbsp; 
                                <button type="button" class="btn btn-default btn-xs" onclick="abrir(14)">
                                    <span class="glyphicon glyphicon-question-sign" aria-hidden="true"></span>
                                </button> 
                                </b></h4>
                                {!! Form::open([ 'route' => ['saveMetrica', 'pc', $medicion->id], 'method' => 'POST', 'id'=>'pc']) !!}
                                <div id="pc" style="text-align: left;">
                                    <p><b>Cantidad de evaluaciones:  &nbsp;&nbsp; </b><input id="cant_pruebas_pc" class="text" name="cant_pruebas_pc" size="4" required onblur="obtenerInputsParaPromedio('pc')"></p> 
                                    <div id="pruebas_pc" style="display: none">
                                        <p><b>CC: Cantidad de Caídas </b></p> 
                                        <p><b>CC: Cantidad de Fallos </b></p> 
                                        <div id="inputs_pc">
                                         
                                        </div>
                                    </div>
                                    <br>         
                                    <button type="submit" class="btn btn-primary" id="bt_calcularPrevencionCaidas">
                                        <b>Calcular</b>
                                    </button> 

                                    <div id="resultado_pc" style="display: inline-block;">
                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                        <b>MÉTRICA: </b><input id="metrica_pc" name="metrica_pc" size="4" class="text" required/> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                        <b>I.E.: %PC = PC * 100 = </b><input id="ie_pc" name="ie_pc" size="4" class="text" required/>
                                    </div>
                                </div>
                                <input id="nroOrden"  class="text" name="nroOrden" size="4" readonly="true" value="4" hidden="true"/>
                                <input id="nroSubitem"  class="text" name="nroSubitem" size="4" readonly="true" value="3" hidden="true"/>
                                <input id="idMetricaReferencia"  class="text" name="idMetricaReferencia" size="4" readonly="true" value="14" hidden="true"/>
                                <input id="idIEReferencia"  class="text" name="idIEReferencia" size="4" readonly="true" value="14" hidden="true"/> 
                                {!! Form::close() !!}

                            </div>
                            
                        </div>
                    </div>

                    <br><br>
                    <div id='bt_ocultarArbol'>
                        <input type="button" class="btn btn-primary" value="Grabar" onclick="ocultarArbolRequerimientos();">
                    </div>
                    
                </div>

                <div class="tab-pane fade active in" style="display: block">
                
                </div>
                <br>             


                {!! Form::open([ 'route' => ['grabarOperadoresYPesosReq', $medicion->id], 'method' => 'POST', 'id'=>'operadores_y_pesos']) !!}

                <div id="operadores_y_pesos_atributos" class="tab-pane fade active in" style="display: none">                    
                    <table class="table table-bordered" align="CENTER" style="width: 75%">
                        <thead>
                            <tr>
                                <th>
                                    Concepto calculable  
                                </th>
                                <th class="text-center">
                                    Operador  
                                </th> 
                                <th class="text-center">
                                    Peso  
                                </th>               
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="text-left">
                                   1. CALIDAD DEL SOFTWARE  
                                </td>
                                <td colspan="2" class="text-left">
                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                    <select name="operadores_0">
                                        <option value="D+">D+</option>
                                        <option value="DA">DA</option>
                                        <option value="D-">D-</option>
                                        <option value="A">A</option>
                                        <option value="C-">C-</option>
                                        <option value="CA">CA</option>
                                        <option value="C+">C+</option>
                                    </select>    
                                </td>
                                
                            </tr>  
                            <tr>
                                <td class="text-left">
                                   &nbsp;&nbsp; 1.1. ADECUACIÓN FUNCIONAL  
                                </td>
                                <td rowspan="3">
                                   <select name="operadores_1" id="operadores_1">
                                        <option value="D+">D+</option>
                                        <option value="DA">DA</option>
                                        <option value="D-">D-</option>
                                        <option value="A">A</option>
                                        <option value="C-">C-</option>
                                        <option value="CA">CA</option>
                                        <option value="C+">C+</option>
                                    </select>   
                                </td>
                                <td rowspan="3">
                                     <input type="text" name="peso_1"  id="peso_1"/>
                                </td>
                            </tr>
                            <tr>
                                <td class="text-left">
                                   &nbsp;&nbsp;&nbsp;&nbsp; 1.1.1. Completitud funcional  
                                </td>
                                
                            </tr>
                            <tr>
                                <td class="text-left">
                                   &nbsp;&nbsp;&nbsp;&nbsp; 1.1.2. Corrección funcional  
                                </td>
                               
                            </tr>
                            <tr>
                                <td class="text-left">
                                   &nbsp;&nbsp; 1.2. EFICIENCIA DE DESEMPEÑO  
                                </td>
                                <td rowspan="3">
                                   <select name="operadores_2" id="operadores_2">
                                        <option value="D+">D+</option>
                                        <option value="DA">DA</option>
                                        <option value="D-">D-</option>
                                        <option value="A">A</option>
                                        <option value="C-">C-</option>
                                        <option value="CA">CA</option>
                                        <option value="C+">C+</option>
                                    </select>   
                                </td>  
                                <td rowspan="3">
                                    <input type="text" name="peso_2"  id="peso_2"/>
                                </td>                       
                            </tr>
                            <tr>
                                <td class="text-left">
                                   &nbsp;&nbsp;&nbsp;&nbsp; 1.2.1. Comportamiento temporal  
                                </td>

                            </tr>
                            <tr>
                                <td class="text-left">
                                   &nbsp;&nbsp;&nbsp;&nbsp; 1.2.2. Utlización de Recursos  
                                </td>
                            
                            </tr>
                            <tr>
                                <td class="text-left">
                                   &nbsp;&nbsp; 1.3. USABILIDAD  
                                </td>
                                <td>
                                   <select name="operadores_3" id="operadores_3">
                                        <option value="D+">D+</option>
                                        <option value="DA">DA</option>
                                        <option value="D-">D-</option>
                                        <option value="A">A</option>
                                        <option value="C-">C-</option>
                                        <option value="CA">CA</option>
                                        <option value="C+">C+</option>
                                    </select>     
                                </td> 
                                <td rowspan="8">
                                    <input type="text" name="peso_3"  id="peso_3"/>
                                </td>                         
                            </tr>
                            <tr>
                                <td class="text-left">
                                   &nbsp;&nbsp;&nbsp;&nbsp; 1.3.1. Inteligibilidad  
                                </td>
                                <td rowspan="4">
                                   <select name="operadores_3a">
                                        <option value="D+">D+</option>
                                        <option value="DA">DA</option>
                                        <option value="D-">D-</option>
                                        <option value="A">A</option>
                                        <option value="C-">C-</option>
                                        <option value="CA">CA</option>
                                        <option value="C+">C+</option>
                                    </select>   
                                </td>
                            </tr>
                            <tr>
                                <td class="text-left">
                                   &nbsp;&nbsp;&nbsp;&nbsp; 1.3.2. Aprendizaje  
                                </td>
                                
                            </tr>
                            <tr>
                                <td class="text-left">
                                   &nbsp;&nbsp;&nbsp;&nbsp; 1.3.3. Operabilidad  
                                </td>
                                
                            </tr>
                            <tr>
                                <td class="text-left">
                                   &nbsp;&nbsp;&nbsp;&nbsp; 1.3.4. Estética  
                                </td>                                
                            </tr>
                            <tr>
                                <td class="text-left">
                                   &nbsp;&nbsp;&nbsp;&nbsp; 1.3.5. Accesibilidad  
                                </td>
                                <td rowspan="3">
                                    <select name="operadores_3b">
                                        <option value="D+">D+</option>
                                        <option value="DA">DA</option>
                                        <option value="D-">D-</option>
                                        <option value="A">A</option>
                                        <option value="C-">C-</option>
                                        <option value="CA">CA</option>
                                        <option value="C+">C+</option>
                                    </select>     
                                </td>
                            </tr>
                            <tr>
                                <td class="text-left">
                                   &nbsp;&nbsp;&nbsp;&nbsp; 1.3.6. Benefico  
                                </td>
                                
                            </tr>
                            <tr>
                                <td class="text-left">
                                   &nbsp;&nbsp;&nbsp;&nbsp; 1.3.7. Interpretabilidad  
                                </td>
                                
                            </tr>
                            <tr>
                                <td class="text-left">
                                   &nbsp;&nbsp; 1.4. FIABILIDAD  
                                </td>
                                <td rowspan="3">
                                    <select name="operadores_4" id="operadores_4">
                                        <option value="D+">D+</option>
                                        <option value="DA">DA</option>
                                        <option value="D-">D-</option>
                                        <option value="A">A</option>
                                        <option value="C-">C-</option>
                                        <option value="CA">CA</option>
                                        <option value="C+">C+</option>
                                    </select>   
                                </td> 
                                <td rowspan="3">
                                    <input type="text" name="peso_4" id="peso_4"/>
                                </td>                         
                            </tr>
                            <tr>
                                <td class="text-left">
                                   &nbsp;&nbsp;&nbsp;&nbsp; 1.4.1. Madurez  
                                </td>
                                
                            </tr>
                            <tr>
                                <td class="text-left">
                                   &nbsp;&nbsp;&nbsp;&nbsp; 1.4.2. Disponibilidad  
                                </td>
                            </tr>
                             <tr>
                                <td class="text-left">
                                   &nbsp;&nbsp;&nbsp;&nbsp; 1.4.3. Prevención de caídas   
                                </td>
                            </tr>
                        </tbody>
                    </table>
                
                    <br>

                    <div style="text-align: center">
                        <input type="button" class="btn btn-primary" id='bt_guardar_operadores_pesos' value="Guardar"/>                        
                    </div>

                </div>
                <br>
                {!! Form::close()!!}


                {!! Form::open([ 'route' => ['grabarPesosReq', $medicion->id], 'method' => 'POST', 'id'=>'pesos']) !!}
                <div id="pesos_atributos" class="tab-pane fade active in" style="display: none">
                    <b>
                    <table class="table table-bordered" align="CENTER" style="width: 75%">
                        <thead>
                            <tr>
                                <th>
                                    Concepto calculable  
                                </th>
                                <th class="text-center">
                                    Peso  
                                </th>   
                                <th class="text-center">
                                    Peso  
                                </th>             
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td colspan="3" class="text-left">
                                   1. CALIDAD DEL SOFTWARE  
                                </td> 
                            </tr>  
                            <tr>
                                <td colspan="3" class="text-left">
                                   &nbsp;&nbsp; 1.1. ADECUACIÓN FUNCIONAL  
                                </td>                                
                            </tr>
                            <tr>
                                <td class="text-left">
                                   &nbsp;&nbsp;&nbsp;&nbsp; 1.1.1. Completitud funcional  
                                </td>
                                <td class="text-left">
                                   <input type="text" name="peso_11" id="peso_11" maxlength="6" max="6"/>
                                </td>
                            </tr>
                            <tr>
                                <td class="text-left">
                                   &nbsp;&nbsp;&nbsp;&nbsp; 1.1.2. Corrección funcional  
                                </td>
                                <td class="text-left">
                                   <input type="text" name="peso_12" id="peso_12"/>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="3" class="text-left">
                                   &nbsp;&nbsp; 1.2. EFICIENCIA DE DESEMPEÑO  
                                </td>
                                                       
                            </tr>
                            <tr>
                                <td class="text-left">
                                   &nbsp;&nbsp;&nbsp;&nbsp; 1.2.1. Comportamiento temporal  
                                </td>
                                <td class="text-left">
                                   <input type="text" name="peso_21" id="peso_21"/>
                                </td>
                            </tr>
                            <tr>
                                <td class="text-left">
                                   &nbsp;&nbsp;&nbsp;&nbsp; 1.2.2. Utlización de Recursos  
                                </td>
                                <td class="text-left">
                                   <input type="text" name="peso_22" id="peso_22"/>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="3"  class="text-left">
                                   &nbsp;&nbsp; 1.3. USABILIDAD  
                                </td>
                                                  
                            </tr>
                            <tr>
                                <td class="text-left">
                                   &nbsp;&nbsp;&nbsp;&nbsp; 1.3.1. Inteligibilidad  
                                </td>
                                <td class="text-left">
                                   <input type="text" name="peso_31" id="peso_31"/>
                                </td>
                                <td  rowspan="3" class="text-left">
                                   <input type="text" name="peso_3a" id="peso_3a"/>
                                </td>
                            </tr>
                            <tr>
                                <td class="text-left">
                                   &nbsp;&nbsp;&nbsp;&nbsp; 1.3.2. Aprendizaje  
                                </td>
                                <td class="text-left">
                                   <input type="text" name="peso_32" id="peso_32"/>
                                </td>
                                
                            </tr>
                            <tr>
                                <td class="text-left">
                                   &nbsp;&nbsp;&nbsp;&nbsp; 1.3.3. Operabilidad  
                                </td>
                                <td class="text-left">
                                   <input type="text" name="peso_33" id="peso_33"/>
                                </td>
                            </tr>
                            <tr>
                                <td class="text-left">
                                   &nbsp;&nbsp;&nbsp;&nbsp; 1.3.4. Estética  
                                </td>
                                <td class="text-left">
                                   <input type="text" name="peso_34" id="peso_34"/>
                                </td>
                                <td  rowspan="4" class="text-left">
                                   <input type="text" name="peso_3b" id="peso_3b"/>
                                </td>
                            </tr>
                            <tr>
                                <td class="text-left">
                                   &nbsp;&nbsp;&nbsp;&nbsp; 1.3.5. Accesibilidad  
                                </td>
                                <td class="text-left">
                                   <input type="text" name="peso_35" id="peso_35"/>
                                </td>
                            </tr>
                            <tr>
                                <td class="text-left">
                                   &nbsp;&nbsp;&nbsp;&nbsp; 1.3.6. Benefico  
                                </td>
                                <td class="text-left">
                                   <input type="text" name="peso_36" id="peso_36"/>
                                </td>
                            </tr>
                            <tr>
                                <td class="text-left">
                                   &nbsp;&nbsp;&nbsp;&nbsp; 1.3.7. Interpretabilidad  
                                </td>
                                <td class="text-left">
                                   <input type="text" name="peso_37" id="peso_37"/>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="3" class="text-left">
                                   &nbsp;&nbsp; 1.4. FIABILIDAD  
                                </td>                                                   
                            </tr>
                            <tr>
                                <td class="text-left">
                                   &nbsp;&nbsp;&nbsp;&nbsp; 1.4.1. Madurez  
                                </td>
                                <td class="text-left">
                                   <input type="text" name="peso_41" id="peso_41"/>
                                </td>
                            </tr>
                            <tr>
                                <td class="text-left">
                                   &nbsp;&nbsp;&nbsp;&nbsp; 1.4.2. Disponibilidad  
                                </td>
                                <td class="text-left">
                                   <input type="text" name="peso_42" id="peso_42"/>
                                </td>
                            </tr>
                            <tr>
                                <td class="text-left">
                                   &nbsp;&nbsp;&nbsp;&nbsp; 1.4.3. Prevención de caídas 
                                </td>
                                <td class="text-left">
                                   <input type="text" name="peso_43" id="peso_43"/>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                
                    <br>
                    <div style="text-align: center">
                        <input type="button" class="btn btn-primary" id='bt_guardar_pesos' value="Guardar"  onclick="cargando();"/>
                    </div>

                    <br>
                    <div class="form-group" align="center" style="display: none; align-content: center" id="img_cargando" >
                        <img src="images/cargando.gif"/>
                    </div>
                    <br>

                </div>
                {!! Form::close()!!}  
            </div>
            
        </div>


        <div class="container" id="div_rangos_desicion" style="display: none">
            <div class="row">
                <div class="col-md-10 col-md-offset-1">
                    <div class="panel panel-default">
                        <div class="panel-heading"><h4>RANGOS DE DESICIÓN</h4></div>
                       
                        <div class="panel-body">

                            {!! Form::open([ 'route' => ['saveRangos', $medicion->id], 'method' => 'POST', 'id'=>'rangos']) !!}
                                <div class="form-group">
                                    <label for="Cantidad de rangos" class="col-md-4 control-label">Cantidad de rangos</label>

                                    <div class="col-md-6">
                                        <input id="cant_rangos" type="text" class="form-control" name="cant_rangos" value="" required autofocus>

                                        @if ($errors->has('cant_rangos'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('cant_rangos') }}</strong>
                                            </span>
                                        @endif
                                    </div>                            
                                    <button class="btn btn-primary" id="bt_cant_rangos" onclick="mostrarRangos()">
                                        <b>Aceptar</b>
                                    </button>
                                </div>
                                <br><br>

                                
                               <div id="rangos_desicion" style="display: none">


                               </div>
                            {!! Form::close() !!}
                        
                        </div>              

                    </div>
                </div>  
            </div>
        </div> 
        

        <!-- --------------------------------------------------- 
        <div class="panel-body">
            <div class="form-group">
                <label for="nombre" class="col-md-10 control-label">RANGO A</label>
            </div>

            <div class="form-group">
                <label for="val_$i" class="col-md-4 control-label">Valoración</label>

                <div class="col-md-6">
                    <input id="valoracion_$i" type="text" class="form-control" name="valoracion_$i" value="" required autofocus>
                </div>
            </div>
            <div class="form-group">
                <label for="desc_$i" class="col-md-4 control-label">Descripción</label>

                <div class="col-md-6">
                    <textarea id="descripcion_$i" class="form-control" name="descripcion_$i" required>
                        
                    </textarea>  
                </div>
            </div>
            <div class="form-group">
                <label for="mi_$i" class="col-md-4 control-label">Valor mínimo </label>

                <div class="col-md-6">
                    <input id="min_$i" type="text" class="form-control" name="min_$i" value="" required autofocus>
                </div>
            </div>
            <div class="form-group">
                <label for="ma_$i" class="col-md-4 control-label">Valor máximo </label>

                <div class="col-md-6">
                    <input id="max_$i" type="text" class="form-control" name="max_$i" value="" required autofocus>
                </div>
            </div>
            <div class="form-group">
                <label for="col_$i" class="col-md-4 control-label">Color </label>

                <div class="col-md-6">
                    <input id="color_$i" type="text" class="form-control" name="color_$i" value="" required autofocus>
                </div>
            </div>
        </div>
        --------------------------------------------------- -->

        
        <script type="text/javascript"> 
            /*$(function () {
                $('#myTab eficiencia').tab('show')
              });*/

              //?????????????????????????
            /*$('#adecuacion').on('click', function (e) {
              e.preventDefault()
              $('#adecuacion').tab('show')
            });

            $('#eficiencia').on('click', function (e) {
              e.preventDefault()
              $('#eficiencia').tab('show')
            });

            $('#usabilidad').on('click', function (e) {
              e.preventDefault()
              $('#usabilidad').tab('show')
            });

            mostrarMsj(<?php echo $msj; ?> );

            function mostrarMsj(msj){
                alert(msj+'  **');
            }*/

            function obtenerInputsParaPromedio(nombre, tipoInput){
                cantidad_inputs= document.getElementById('cant_pruebas_'+nombre).value;

                inputs= '';

                for(var i=0; i< cantidad_inputs;i++)
                {
                    if(nombre !== 'pc')
                    {
                        //alert('input '+i);
                        /*if(tipoInput != 'Usuario')
                        {*/
                            inputs+= '<p>'+tipoInput+' '+(i+1)+': <input id="x_'+nombre+'_'+i+'" class="text" name="x_'+nombre+'_'+i+'" size="2" required> &nbsp;&nbsp;<br></p>';
                        /*}
                        else {
                            inputs+= '<input id="x_'+nombre+'_'+i+'" class="text" name="x_'+nombre+'_'+i+'" size="2" required> &nbsp;&nbsp;';
                        }*/
                        
                    } else {
                        inputs+= '<p>'+(i+1)+') CC: &nbsp;<input id="x_a_'+nombre+'_'+i+'" class="text" name="x_a_'+nombre+'_'+i+'" size="2" required/> &nbsp;&nbsp;  CF: &nbsp;<input id="x_b_'+nombre+'_'+i+'" class="text" name="x_b_'+nombre+'_'+i+'" size="2" required/> </p>&nbsp; ';
                    }
                }

                document.getElementById('inputs_'+nombre).innerHTML= inputs;
                document.getElementById('pruebas_'+nombre).style.display= 'block';
            }


            $('#bt_requerimientos').click(function(e) {
                
                e.preventDefault();

                //document.getElementById('detalle_carateristicas').style.display= 'block';//comentar!

                if(document.getElementById('peso_adecuacion').value != "" &&
                 document.getElementById('peso_eficiencia').value != "" && 
                 document.getElementById('peso_usabilidad').value != "" && 
                 document.getElementById('peso_funcionalidad').value != "" )                        
                {
                    var form= $('#pesos_requerimientos');
                    var data= form.serialize();
                    var route= form.attr('action');

                    $.post(route, data, function(result) {
                           
                        //console.log(result);
                        alert(result);

                        if(result == "exito")
                        {                   
                            //y si todo sale bien:
                            document.getElementById('detalle_carateristicas').style.display= 'block'
                        } 
                        else {
                            alert(result);
                        }
                    
                    });

                }
                else {
                    alert("Hubo un error. Vuelve a grabar los pesos de los requerimientos.  ");

                    document.getElementById('detalle_carateristicas').style.display= "none";
                }           

            });


            function hola()
            {
                alert('holaaaaaaaaaaaaaaaaaaaaaa');
            }

            
            $('#bt_calcularIntegridad').click(function(e) {
                
                e.preventDefault();
                
                funciones_faltantes= document.getElementById("funciones_faltantes").value;
                funciones_totales= document.getElementById("funciones_descritas").value;
                
                //métrica
                integridad= 1 - (funciones_faltantes/funciones_totales);
                document.getElementById("metrica_integridad").value= integridad.toFixed(2);
                //indicador elemental
                ie= integridad*100;
                document.getElementById("ie_integridad").value= ie.toFixed(2);

                //alert('int: '+integridad);

                var form= $('#integridad');
                var data= form.serialize();
                var route= form.attr('action');

                $.post(route, data, function(result) {
                        //alert(result);
                    });

            });
            

            //Cálculo de métricas e Indicadores Elementales 
           /* function calcularIntegridad(){
                funciones_faltantes= document.getElementById("funciones_faltantes").value;
                funciones_totales= document.getElementById("funciones_descritas").value;
                
                //métrica
                integridad= 1 - (funciones_faltantes/funciones_totales);
                document.getElementById("metrica_integridad").value= integridad.toFixed(2);
                //indicador elemental
                ie= integridad*100;
                document.getElementById("ie_integridad").value= ie.toFixed(2);

                alert('int: '+integridad);

                var form= $('#integridad');
                var data= form.serialize();
                var route= form.attr('action');

                $.post(route, data, function(result) {
                        alert(result);
                });

            }*/


            //function calcularCorreccionFuncional(){
            $('#bt_calcularExactitud').click(function(e) {
                
                e.preventDefault();
                funciones_con_res_diferentes= document.getElementById("crd_exactitud").value;
                funciones_totales= document.getElementById("cft_exactitud").value;

                //métrica
                exactitud=  1 - (funciones_con_res_diferentes/funciones_totales);
                document.getElementById("metrica_exactitud").value= exactitud.toFixed(2);
                //indicador elemental
                ie= exactitud*100;
                document.getElementById("ie_exactitud").value= ie.toFixed(2);   

                var form= $('#exactitud');
                var data= form.serialize();
                var route= form.attr('action');

                $.post(route, data, function(result) {
                        //alert(result);
                    });         
            });

            //function calcularComportamientoTemporal(){ //VERRR!!
            $('#bt_calcularTMR').click(function(e) {
                e.preventDefault();

                //CAMBIARRRRRRRRRRRRRR!!!!!!!!!!!!!
                document.getElementById("metrica_tiempo_rta").value= 0.122;
                //indicador elemental
                ie= 87.80;
                document.getElementById("ie_tiempo_rta").value= ie.toFixed(2);

                var form= $('#tiempo_rta');
                var data= form.serialize();
                var route= form.attr('action');

                $.post(route, data, function(result) {
                        //alert(result);
                    });  
            });

            //function calcularUtilizacionDeRecursos(){
            $('#bt_calcularOcurrenciaErrorM').click(function(e) {
                e.preventDefault();

                cant_pruebas= document.getElementById("cant_pruebas_oem").value;
                cant_maxima_errores= document.getElementById("cant_maxima_errores").value;

                suma_total= 0;
                var i=0; 
                for(i=0; i<cant_pruebas; i++)
                {
                    cant_errores= document.getElementById("x_oem_"+i).value;
                    c_errores_sobre_c_max_errores= cant_errores / cant_maxima_errores;

                    suma_total+= c_errores_sobre_c_max_errores;
                }

                //métrica
                ocurrencia_error_memoria= suma_total / cant_pruebas;
                document.getElementById("metrica_oem").value= ocurrencia_error_memoria.toFixed(2);
                //indicador elemental
                ie= (1-ocurrencia_error_memoria)*100;
                document.getElementById("ie_oem").value= ie.toFixed(2);

                var form= $('#oem');
                var data= form.serialize();
                var route= form.attr('action');

                $.post(route, data, function(result) {
                        //alert(result);
                    });  
            });

            //function calcularInteligibilidad()
            $('#bt_calcularComprensionES').click(function(e) 
            {
                e.preventDefault();

                cant_es_interfaz= document.getElementById("cant_es_interfaz").value;
                cant_usuarios_ces= document.getElementById("cant_pruebas_ces").value;

                suma_total= 0;
                var i=0; 
                for(i=0; i<cant_usuarios_ces; i++)
                {
                    cant_es_no_entendidos= document.getElementById("x_ces_"+i).value;
                    calculo_intermedio= (1 - (cant_es_no_entendidos/cant_es_interfaz));

                    suma_total+= calculo_intermedio;
                }

                //métrica
                inteligibilidad= suma_total / cant_usuarios_ces;
                document.getElementById("metrica_ces").value= inteligibilidad.toFixed(2);

                //indicador elemental
                ie= inteligibilidad*100;
                document.getElementById("ie_ces").value= ie.toFixed(2);

                var form= $('#ces');
                var data= form.serialize();
                var route= form.attr('action');

                $.post(route, data, function(result) {
                        //alert(result);
                    });  
            });

            //function calcularAprendizaje()
            $('#bt_calcularFacilidadAprendizaje').click(function(e) 
            {
                e.preventDefault();

                cant_func_totales= document.getElementById("cant_func_total").value;
                cant_usuarios_fa= document.getElementById("cant_pruebas_fa").value;

                suma_total= 0;
                var i=0; 
                for(i=0; i<cant_usuarios_fa; i++)
                {
                    cant_func_entendidas= document.getElementById("x_fa_"+i).value;
                    calculo_intermedio= (cant_func_entendidas/cant_func_totales);

                    suma_total+= calculo_intermedio;
                }

                //métrica
                aprendizaje= suma_total / cant_usuarios_fa;
                document.getElementById("metrica_fa").value= aprendizaje.toFixed(2);

                //indicador elemental
                ie= aprendizaje*100;
                document.getElementById("ie_fa").value= ie.toFixed(2);

                var form= $('#fa');
                var data= form.serialize();
                var route= form.attr('action');

                $.post(route, data, function(result) {
                        //alert(result);
                    });  
            });

            //function calcularOperabilidad()
            $('#bt_calcularCapacidadEntendido').click(function(e) 
            {
                e.preventDefault();

                //ce = capacidad para ser entendido el msj en uso
                cant_msjs_total= document.getElementById("cant_msjs_total").value;
                cant_usuarios_ce= document.getElementById("cant_pruebas_ce").value;

                suma_total= 0;
                var i=0; 
                for(i=0; i<cant_usuarios_ce; i++)
                {
                    cant_msj_no_entendidos= document.getElementById("x_ce_"+i).value;
                    calculo_intermedio= (1 - (cant_msj_no_entendidos/cant_msjs_total));

                    suma_total+= calculo_intermedio;
                }

                //métrica
                operabilidad= suma_total / cant_usuarios_ce;
                document.getElementById("metrica_ce").value= operabilidad.toFixed(2);

                //indicador elemental
                ie= operabilidad*100;
                document.getElementById("ie_ce").value= ie.toFixed(2);

                var form= $('#ce');
                var data= form.serialize();
                var route= form.attr('action');

                $.post(route, data, function(result) {
                        //alert(result);
                    });  
            });

            //function calcularEstetica()
            $('#bt_calcularInteraccionAtractiva').click(function(e) 
            {
                e.preventDefault();

                cant_usuarios_ia= document.getElementById("cant_pruebas_ia").value;

                suma_total= 0;
                var i=0; 
                for(i=0; i<cant_usuarios_ia; i++)
                {
                    puntuacion_usuario= document.getElementById("x_ia_"+i).value;

                    suma_total+= puntuacion_usuario/1; //para que tome numerico
                }

                //métrica
                estetica= suma_total / cant_usuarios_ia;
                document.getElementById("metrica_ia").value= estetica.toFixed(2);

                //indicador elemental
                ie= estetica*100/10;
                document.getElementById("ie_ia").value= ie.toFixed(2);

                var form= $('#ia');
                var data= form.serialize();
                var route= form.attr('action');

                $.post(route, data, function(result) {
                        //alert(result);
                    });  
            });

            //function calcularAccesiblidad()
            $('#bt_calcularAccesibilidadFisica').click(function(e) {           

                e.preventDefault();

                cant_func_accesibles= document.getElementById("cant_func_accesibles").value;
                cant_func_totales= document.getElementById("cant_func_totales").value;

                //métrica
                accesibilidad= cant_func_accesibles / cant_func_totales;
                document.getElementById("metrica_af").value= accesibilidad.toFixed(2);

                //indicador elemental
                ie= accesibilidad*100;
                document.getElementById("ie_af").value= ie.toFixed(2);

                var form= $('#af');
                var data= form.serialize();
                var route= form.attr('action');

                $.post(route, data, function(result) {
                        //alert(result);
                    });  
            }); 

            //function calcularBeneficio()
            $('#bt_calcularEficaciaDatos').click(function(e) 
            {
                e.preventDefault();

                cant_datos_beneficiosos= document.getElementById("cant_datos_beneficiosos").value;
                cant_datos_totales= document.getElementById("cant_datos_totales").value;

                //métrica
                beneficio= cant_datos_beneficiosos / cant_datos_totales;
                document.getElementById("metrica_ed").value= beneficio.toFixed(2);

                //indicador elemental
                ie= beneficio*100;
                document.getElementById("ie_ed").value= ie.toFixed(2);

                var form= $('#ed');
                var data= form.serialize();
                var route= form.attr('action');

                $.post(route, data, function(result) {
                        //alert(result);
                    });  
            });

            //function calcularInterpretabilidad()
            $('#bt_calcularCapacidadPersonalizacion').click(function(e) 
            {
                e.preventDefault();

                cant_funciones_personalizadas= document.getElementById("cant_funciones_personalizadas").value;
                cant_funciones_totales= document.getElementById("cant_func_totales_cp").value;

                //métrica
                interpretabilidad= cant_funciones_personalizadas / cant_funciones_totales;
                document.getElementById("metrica_cp").value= interpretabilidad.toFixed(2);

                //indicador elemental
                ie= interpretabilidad*100;
                document.getElementById("ie_cp").value= ie.toFixed(2);

                var form= $('#cp');
                var data= form.serialize();
                var route= form.attr('action');

                $.post(route, data, function(result) {
                        //alert(result);
                    });  
            });

            //function calcularMadurez()
            $('#bt_calcularDensidadFallas').click(function(e) 
            {
                e.preventDefault();

                cant_func_totales= document.getElementById("cant_func_total_df").value;
                cant_pruebas= document.getElementById("cant_pruebas_df").value;

                suma_total= 0;
                var i=0; 
                for(i=0; i<cant_pruebas; i++)
                {
                    cant_fallas= document.getElementById("x_df_"+i).value;

                    suma_total+= (cant_fallas/cant_func_totales); 
                }

                //métrica
                madurez= suma_total / cant_pruebas;
                document.getElementById("metrica_df").value= madurez.toFixed(2);

                //indicador elemental
                ie= (1- madurez)*100;
                document.getElementById("ie_df").value= ie.toFixed(2);

                var form= $('#df');
                var data= form.serialize();
                var route= form.attr('action');

                $.post(route, data, function(result) {
                        //alert(result);
                    });  
            });

            //function calcularDisponibilidad()
            $('#bt_calcularDisponibilidad').click(function(e) 
            {
                e.preventDefault();

                cant_intentos_total= document.getElementById("cant_intentos_total").value;
                cant_pruebas= document.getElementById("cant_pruebas_d").value;

                suma_total= 0;
                var i=0; 
                for(i=0; i<cant_pruebas; i++)
                {
                    cant_intentos_satisfactorios= document.getElementById("x_d_"+i).value;

                    suma_total+= (cant_intentos_satisfactorios/cant_intentos_total); 
                }

                //métrica
                disponibilidad= suma_total / cant_pruebas;
                document.getElementById("metrica_d").value= disponibilidad.toFixed(2);

                //indicador elemental
                ie= disponibilidad*100;
                document.getElementById("ie_d").value= ie.toFixed(2);

                var form= $('#d');
                var data= form.serialize();
                var route= form.attr('action');

                $.post(route, data, function(result) {
                        //alert(result);
                    });  
            });

            //function calcularToleranciaFallos()
            $('#bt_calcularPrevencionCaidas').click(function(e) 
            {
                e.preventDefault();

                cant_pruebas= document.getElementById("cant_pruebas_pc").value;

                 suma_total= 0;
                var i=0; 
                for(i=0; i<cant_pruebas; i++)
                {
                    cant_caidas= document.getElementById("x_a_pc_"+i).value;
                    cant_fallos= document.getElementById("x_b_pc_"+i).value;

                    suma_total+= (1-(cant_caidas/cant_fallos));
                }

                //métrica
                toleranciaFallos= suma_total / cant_pruebas;
                document.getElementById("metrica_pc").value= toleranciaFallos.toFixed(2);

                //indicador elemental
                ie= toleranciaFallos*100;
                document.getElementById("ie_pc").value= ie.toFixed(2);

                var form= $('#pc');
                var data= form.serialize();
                var route= form.attr('action');

                $.post(route, data, function(result) {
                        //alert(result);
                    });                  
            });

            function ocultarArbolRequerimientos()
            {
                document.getElementById("detalle_carateristicas").style.display= "none";
                document.getElementById("operadores_y_pesos_atributos").style.display= "block";
            }

            $('#bt_guardar_operadores_pesos').click(function(e)
            {
                e.preventDefault();
                
                if(document.getElementById('peso_1').value != "" &&
                 document.getElementById('peso_2').value != "" && 
                 document.getElementById('peso_3').value != "" && 
                 document.getElementById('peso_4').value != "" )                        
                {
                    var form= $('#operadores_y_pesos');
                    var data= form.serialize();
                    var route= form.attr('action');

                    $.post(route, data, function(result) {
                           
                        //console.log(result);
                        /*alert(result);

                        if(result == "exito")
                        {  */                 
                            //y si todo sale bien:
                            document.getElementById("operadores_y_pesos_atributos").style.display= "none";
                            document.getElementById('pesos_atributos').style.display= 'block';
                        /*} 
                        else {
                            alert(result);
                        }*/
                    
                    });

                }
                else {
                    alert("Debe colocar un valor en el peso de cada requerimiento");
                }           

            });

            $('#bt_guardar_pesos').click(function(e)
            {
                e.preventDefault();
                
                /*if(document.getElementById('peso_1').value != "" &&
                 document.getElementById('peso_2').value != "" && 
                 document.getElementById('peso_3').value != "" && 
                 document.getElementById('peso_4').value != "" )                        
                {*/
                    var form= $('#pesos');
                    var data= form.serialize();
                    var route= form.attr('action');

                    $.post(route, data, function(result) {
                           
                        //console.log(result);
                        //alert(result);

                        /*if(result == "exito")
                        { */                  
                            //y si todo sale bien:
                            document.getElementById('pesos_atributos').style.display= 'none';
                            document.getElementById('div_rangos_desicion').style.display= 'block';
                       /* } 
                        else {
                            alert(result);
                        }*/
                    
                    });

                /*}
                else {
                    alert("Debe colocar un valor en el peso de cada requerimiento");
                } */          

            });

            function mostrarRangos(){
        
                cant_rangos= document.getElementById('cant_rangos').value;
                div_rangos= '';

                for(i=0; i< cant_rangos;i++)
                {
                   /* div_rangos+= '<p><b>RANGO '+(i+1)+':</b></p>  <p>Valoracion  <input id="valoracion_'+(i+1)+'" class="text" name="valoracion_'+(i+1)+'" size="40" required> &nbsp;&nbsp;<br</p>';
                   div_rangos+= '<p>Descripción  <textarea id="descripcion_'+(i+1)+'" class="text" name="descripcion_'+(i+1)+'" required> &nbsp;&nbsp;</textarea></p>';
                    div_rangos+='<p>Valor mínimo: <input id="min_'+(i+1)+'" class="text" name="min_'+(i+1)+'" size="40" required> &nbsp;&nbsp;<br></p>';
                    div_rangos+='<p>Valor máximo: <input id="max_'+(i+1)+'" class="text" name="max_'+(i+1)+'" size="40" required> &nbsp;&nbsp;<br></p>';
                    div_rangos+='<p>Color <input id="color_'+(i+1)+'" class="text" name="color_'+(i+1)+'" size="40" required> &nbsp;&nbsp;<br></p> <br><br>';*/


                    div_rangos+= '<div class="panel-body">'+
                                        '<div class="form-group">'+
                                            '<label for="nombre" class="col-md-10 control-label">RANGO' +(i+1)+'</label>'+
                                        '</div>'+

                                        '<div class="form-group">'+
                                            '<label for="val_' +(i+1)+'" class="col-md-4 control-label">Valoración</label>'+

                                            '<div class="col-md-6">'+
                                                '<input id="valoracion_'+(i+1)+'" type="text" class="form-control" name="valoracion_' +(i+1)+'" value='+'"" required autofocus>'+
                                            '</div>'+
                                       ' </div>'+
                                        '<div class="form-group">'+
                                            '<label for="desc_' +(i+1)+'" class="col-md-4 control-label">Descripción</label>'+

                                            '<div class="col-md-6">'+
                                                '<textarea id="descripcion_' +(i+1)+'" class="form-control" name="descripcion_' +(i+1)+'" required>'+           
                                                '</textarea> ' +
                                           ' </div>'+
                                        '</div>'+
                                       ' <div class="form-group">'+
                                            '<label for="mi_' +(i+1)+'" class="col-md-4 control-label">Valor mínimo </label>'+

                                            '<div class="col-md-6">'+
                                                '<input id="min_' +(i+1)+'" type="text" class="form-control" name="min_' +(i+1)+'" value="" required autofocus>'+
                                           ' </div>'+
                                        '</div>'+
                                        '<div class="form-group">'+
                                            '<label for="ma_' +(i+1)+'" class="col-md-4 control-label">Valor máximo </label>'+

                                            '<div class="col-md-6">'+
                                                '<input id="max_' +(i+1)+'" type="text" class="form-control" name="max_' +(i+1)+'" value="" required autofocus>'+
                                            '</div>'+
                                        '</div>'+
                                        '<div class="form-group">'+
                                            '<label for="col_' +(i+1)+'" class="col-md-4 control-label">Color </label>'+

                                           ' <div class="col-md-6">'+
                                                '<input id="color_' +(i+1)+'" type="text" class="form-control" name="color_' +(i+1)+'" value="" required autofocus>'+
                                           ' </div>'+
                                       ' </div>'
                                +'</div> <br>';



                }

                boton= '<button class="btn btn-primary" id="bt_guardar_rangos"  onclick="cargandoRangos();"><b>Guardar</b></button>';

                img_cargando= '<br><div class="form-group" align="center" style="display: none; align-content: center" id="img_cargando_rangos" ><img src="images/cargando.gif"/></div><br>';


                div_rangos+= boton+img_cargando;

                //div_rangos+= boton;

                document.getElementById('rangos_desicion').innerHTML= div_rangos;
                document.getElementById('rangos_desicion').style.display= 'block';
            }

            function abrir(idMetricaReferencia) {
                url='/consultaMetrica/'+idMetricaReferencia;
                open(url,'','top=300,left=300,width=750,height=500') ;
            } 

            function cargando()
            {
                document.getElementById('img_cargando').style.display='block';
            }   

            function cargandoRangos()
            {
                document.getElementById('img_cargando_rangos').style.display='block';
            }  

        </script>
@endsection