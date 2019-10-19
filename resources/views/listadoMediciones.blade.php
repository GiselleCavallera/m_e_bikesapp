@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="bootstrap.css"/>
<!--<<link href="//cdnjs.cloudflare.com/ajax/libs/font-awesome/3.2.1/css/font-awesome.min.css" rel="stylesheet" />
link rel="stylesheet" href="awesome-bootstrap-checkbox.css"/>
<link href="css/improve/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
<link href="css/improve/style.css" rel="stylesheet" type="text/css" media="all" />
<link href="css/improve/font-awesome.css" rel="stylesheet">
<link rel="stylesheet" href="css/improve/flexslider.css" type="text/css" media="screen" /> -->

<br>
<h1 style="text-align: center;">LISTADO DE MEDICIONES REALIZADAS</h1> 
<!--<<div class="heading">
    <h3 class="w3l-titles tes" style="color: black">LISTADO DE MEDICIONES REALIZADAS</h3>
</div> --> 

<div class="container">
     <!--<div class="row">-->  
        <div class="col-md-12">  <!-- col-md-offset-1  -->  

        	{!! Form::open([ 'route' => 'comparacion', 'method' => 'POST', 'id'=>'mediciones']) !!}
	        	<table class="table table-bordered" id="MyTable">   		
		      		<thead>
		        		<tr>
		        			<th class="text-center">Nro. de Referencia</th>
				            <th class="text-center">Medición</th>
				            <th class="text-center">Fecha</th>
				            <th class="text-center">Descripción</th>
				            <th class="text-center">Evaluadores</th>			            
				            <th class="text-center">Entidad</th>
				            <th class="text-center">Ver Detalle</th>
				            <th class="text-center">Seleccionar para informe</th>
		        		</tr>
		      		</thead>
		      		<tbody>	
		      			@foreach($mediciones as $medicion)		       		 	
		            	<tr>
		            	    <td class="text-left">{{ $medicion->nroReferencia }}</td>
			                <td class="text-left">{{ $medicion->nombre }}</td>
			                <td class="text-left">{{ $medicion->fecha }}</td>
			                <td class="text-left">{{ $medicion->descripcion }}</td>
			                <td class="text-left">{{ $medicion->evaluadores }}</td>
			                <td class="text-left">{{ $medicion->entidad }}</td>
			                <td class="text-left">
			                	&nbsp;&nbsp;<a href="{{ url('/consultaProyecto/'.$medicion->id) }}" class="btn btn-primary btn-xs">
	                                <span class="glyphicon glyphicon-search" aria-hidden="true"></span>
	                            </a>
	                        </td>
	                        <td class="text-center">
	                        	<div class="checkbox checkbox-primary">
		                        	<span class="button-checkbox">
		                            	<input type="checkbox" class="styled" id="check_{{$medicion->id}}" value="{{$medicion->id}}" onclick="seleccionar({{$medicion->id}});">
		                        	</span>
	                        	</div>
			                </td>
		            	</tr>
		            	@endforeach
		      		</tbody>      		
		    	</table>

		    	<br><br>
		    	<input id="ids_mediciones" name="ids_mediciones" value="">

		    	<button type="submit" class="btn btn-primary">
	                Comparar
	            </button>
	    	{!! Form::close() !!}

        </div>
     <!--    
    </div>   -->  
</div>


<script>	

	function seleccionar(idMedicion) {

		ids= document.getElementById('ids_mediciones').value; 

		//Si seleccionan check,lo sumamos a la cadena de mediciones para evaluar
        if(document.getElementById('check_'+idMedicion).checked)
        {   
	        ids+= idMedicion+'.';

	        document.getElementById('ids_mediciones').value= ids;
        } //SI sacan el check, la sacamos de la cadena
        else {        	
	        
	        partes_medicion= ids.split(idMedicion+'.');
	        document.getElementById('ids_mediciones').value= partes_medicion[0]+partes_medicion[1];
		} 
    }

</script>


@endsection