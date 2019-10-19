 <!-- NO USA ESTA VISTA ** es un div en la vista medicion.blade !!!! -->
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

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading"><h4>RANGOS DE DESICIÓN</h4></div>
               
                <div class="panel-body">

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
            	
                </div>            	

            </div>
        </div>	
    </div>
</div>

<script type="text/javascript"> 

    
    
	function mostrarRangos(){
		
        cant_rangos= document.getElementById('cant_rangos').value;
        div_rangos= '';

        for(i=0; i< cant_rangos;i++)
        {
            div_rangos+= '<p><b>RANGO '+(i+1)':</b></p>  <p>Valoracion  <input id="valoracion_'+(i+1)+'" class="text" name="valoracion_'+(i+1)+'" size="40" required> &nbsp;&nbsp;<br</p>';
            div_rangos+= '<p>Descripción  <textarea id="descripcion_'+(i+1)+'" class="text" name="descripcion_'+(i+1)+'" required> &nbsp;&nbsp;</textarea></p>';
            div_rangos+='<p>Valor mínimo: <input id="min_'+(i+1)+'" class="text" name="min_'+(i+1)+'" size="40" required> &nbsp;&nbsp;<br></p>';
            div_rangos+='<p>Valor máximo: <input id="max_'+(i+1)+'" class="text" name="max_'+(i+1)+'" size="40" required> &nbsp;&nbsp;<br></p>';
            div_rangos+='<p>Color <input id="color_'+(i+1)+'" class="text" name="color_'+(i+1)+'" size="40" required> &nbsp;&nbsp;<br></p> <br><br>';
        }

        boton= '<button class="btn btn-primary" id="bt_guardar_rangos"  onclick="cargando();"><b>Guardar</b></button>';

        img_cargando= '<br><div class="form-group" align="center" style="display: none; align-content: center" id="img_cargando" ><img src="images/cargando.gif"/></div><br>';


        div_rangos+= boton+img_cargando;

        document.getElementById('rangos_desicion').innerHTML= div_rangos;
        document.getElementById('rangos_desicion').style.display= 'block';
	}

    function cargando()
    {
        document.getElementById('img_cargando').style.display='block';
    }  

</script>

@endsection