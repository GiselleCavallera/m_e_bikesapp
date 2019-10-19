@extends('layouts.app')

<br>
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading"><h4>INFORMACiÓN DE LA MÉTRICA: {{ $metrica_referencia[0]-> nombre }}</h4></div>

                <div class="panel-body">

                	<h4 style="text-align: left;"><b>Descripcion</b></h4>
                	<p style="text-align: justify;">{{$metrica_referencia[0]->descripcion}}</p> 

                	<br>
                	<h4 style="text-align: left;"><b>Escala</b></h4>
                	<p>{{$metrica_referencia[0]->escala}}</p> 

                	<br>
                	<h4 style="text-align: left;"><b>Es Promedio</b></h4>
                	<p>{{$metrica_referencia[0]->esPromedio}}</p> 

                	<!-- <table class="table table-bordered" id="MyTable">      		
			      		<thead>
			        		<tr>
					            <th class="text-center">Descripcion</th>
					            <th class="text-center">Escala</th>
					            <th class="text-center">Es Promedio</th>
			        		</tr>
			      		</thead>
			      		<tbody>			       		 	
			            	<tr>
			            	    <td class="text-left">{{$metrica_referencia[0]->descripcion}}</td>
				                <td class="text-left">{{ $metrica_referencia[0]->escala}}</td>
				                <td class="text-left">{{ $metrica_referencia[0]->esPromedio}}</td>
			            	</tr>
			      		</tbody>      		
			    	</table>-->
                </div>

            </div>
        </div>
    </div>
</div>

@endsection