@extends('layouts.app')

<br><br><br>
@section('my_styles')
        <!-- Fonts -->
        <link href="https://
        fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
        <link href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
        <script src="//netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
@endsection


@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-11 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading"><h4>INFORME </h4></div>  <!--{{$cantidad_rangos}} --> 
               
                <!--<div class="panel-body">

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

                    {!! Form::open([ 'route' => ['saveRangos', $idMedicion], 'method' => 'POST', 'id'=>'rangos']) !!}
	                   <div id="rangos_desicion" style="display: none">


	                   </div>
                    {!! Form::close() !!}
            	
                </div>  --> 

                <div class="tab-pane fade active in">
                    <br><br> 

                    <p>  <b><font size="4px">INDICADORES ELEMENTALES</font></b></p>
                    
                    <div id="grafico_1" class="col-md-6"  style="display:inline-block;">
                       
                        
                        
                    </div>
                    <?= Lava::render('ColumnChart', 'EWA', 'grafico_1') ?>

                    
                    <div id="grafico_2" class="col-md-6" style="display:inline-block;">
                       
                        
                        
                    </div>
                    <?= Lava::render('ColumnChart', 'iee', 'grafico_2') ?>

                    <br><br><br><br><br><br><br>
                    <div id="grafico_3" class="col-md-6" style="display:inline-block;">
                       
                        
                        
                    </div>
                    <?= Lava::render('ColumnChart', 'usabilidad', 'grafico_3') ?>

                    <br>
                    <div id="grafico_4" class="col-md-6" style="display:inline-block;">
                       
                        
                        
                    </div>
                    <?= Lava::render('ColumnChart', 'fiabilidad', 'grafico_4') ?>

                    <br>
                    <p>  <b><font size="4px">INDICADORES DERIVADOS</font></b></p>
                    <br>

                    <table class="table table-bordered" style="width: 100%">
                        <thead>
                            <tr>
                                <th>
                                    Concepto calculable  
                                </th>
                                <th class="text-center">
                                    I.D. (%)  
                                </th>                    
                                                     
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="text-left">
                                   1. CALIDAD DEL SOFTWARE  -- VER RANGOS!!!
                                </td>
                                <td class="text-center">
                                    @if ($indicadores_derivados[6]->valor < 40)  
                                            <span class="label label-danger">{{$indicadores_derivados[6]->valor}} %</span>
                                            @elseif ($indicadores_derivados[6]->valor < 70 && $indicadores_derivados[6]->valor > 40)
                                            <span class="label label-warning">{{$indicadores_derivados[6]->valor}} %</span>
                                            @else
                                            <span class="label label-success">{{$indicadores_derivados[6]->valor}} %</span>
                                    @endif
                                   
                                   
                                </td>                                
                            </tr>  
                            <tr>
                                <td class="text-left">
                                   &nbsp;&nbsp; 1.1. ADECUACIÓN FUNCIONAL  
                                </td>
                                <td class="text-center">
                                    @if ($indicadores_derivados[0]->valor < 40)  
                                            <span class="label label-danger">{{$indicadores_derivados[0]->valor}} %</span>
                                            @elseif ($indicadores_derivados[0]->valor < 70 && $indicadores_derivados[0]->valor > 40)
                                            <span class="label label-warning">{{$indicadores_derivados[0]->valor}} %</span>
                                            @else
                                            <span class="label label-success">{{$indicadores_derivados[0]->valor}} %</span>
                                    @endif
                                </td>                                
                            </tr>
                            
                            <tr>
                                <td class="text-left">
                                   &nbsp;&nbsp; 1.2. EFICIENCIA DE DESEMPEÑO  
                                </td>
                                <td class="text-center">
                                     @if ($indicadores_derivados[1]->valor < 40)  
                                            <span class="label label-danger">{{$indicadores_derivados[1]->valor}} %</span>
                                            @elseif ($indicadores_derivados[1]->valor < 70 && $indicadores_derivados[1]->valor > 40)
                                            <span class="label label-warning">{{$indicadores_derivados[1]->valor}} %</span>
                                            @else
                                            <span class="label label-success">{{$indicadores_derivados[1]->valor}} %</span>
                                    @endif
                                </td>
                                                         
                            </tr>                           
                            <tr>
                                <td class="text-left">
                                   &nbsp;&nbsp; 1.3. USABILIDAD  
                                </td>
                                <td class="text-center">
                                     @if ($indicadores_derivados[5]->valor < 40)  
                                            <span class="label label-danger">{{$indicadores_derivados[5]->valor}} %</span>
                                            @elseif ($indicadores_derivados[5]->valor < 70 && $indicadores_derivados[5]->valor > 40)
                                            <span class="label label-warning">{{$indicadores_derivados[5]->valor}} %</span>
                                            @else
                                            <span class="label label-success">{{$indicadores_derivados[5]->valor}} %</span>
                                    @endif
                                </td>
                                                         
                            </tr>
                            <tr>
                                <td class="text-left">
                                   &nbsp;&nbsp; 1.4. FIABILIDAD  
                                </td>&nbsp;&nbsp;
                                <td class="text-center">
                                     @if ($indicadores_derivados[2]->valor < 40)  
                                            <span class="label label-danger">{{$indicadores_derivados[2]->valor}} %</span>
                                            @elseif ($indicadores_derivados[2]->valor < 70 && $indicadores_derivados[2]->valor > 40)
                                            <span class="label label-warning">{{$indicadores_derivados[2]->valor}} %</span>
                                            @else
                                            <span class="label label-success">{{$indicadores_derivados[2]->valor}} %</span>
                                    @endif
                                </td>                                                           
                            </tr>
                            
                        </tbody>
                    </table>
                    <br><br>

                    <div id="grafico_5" align="center">
                       
                        
                        
                    </div>
                    <?= Lava::render('GaugeChart', 'Temps', 'grafico_5') ?>

                    <br>
                    <div id="grafico_6"  align="center">
                       
                        
                        
                    </div>
                    <?= Lava::render('GaugeChart', 'Calidad', 'grafico_6') ?>           

                    <br>

                    {!! Form::open([ 'route' => ['saveComentarios', $idMedicion], 'method' => 'POST', 'id'=>'comentarios']) !!}
                        <p><label for="comentarios" class="col-md-4 control-label"> Recomendacione/Comentarios </label></p>
                       
                        <textarea id="contexto" class="form-control" name="comentarios" rows="8" value="" autofocus>
                            
                        </textarea>                 
                        @if ($errors->has('contexto'))
                            <span class="help-block">
                                <strong>{{ $errors->first('contexto') }}</strong>
                            </span>
                        @endif                    
                        <br>

                        <div class="form-group" align="right">
                            <button class="btn btn-primary" id="bt_finalizar">
                                <b>Finalizar</b>
                            </button>
                        </div>

                        <br>
                    {!! Form::close() !!}

                </div>
                
            </div>
        </div>	
    </div>
</div>

<script type="text/javascript"> 
$('#bt_finalizar').click(function(e) 
{
    e.preventDefault();

    var form= $('#comentarios');
    var data= form.serialize();
    var route= form.attr('action');

    $.post(route, data, function(result) {
            //alert(result);
        });  
});
    

</script>

@endsection