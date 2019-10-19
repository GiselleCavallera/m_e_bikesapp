@extends('layouts.app')

@section('content')

 <p style="text-align: center">
 <h1 style="text-align: center"> MÓDULO WEB para la automatización y aplicación de un Modelo de Calidad para flotas dinámicas en una Smart City </h1>

<div class="inicioapp" id="inicioapp">      

    <div style="width: 100%; align-content: center">
        <img src="images/fondo_inicial.jpg"  style="float: center">

    </div>
    
    <div style=" text-decoration: none;
        	position: fixed;
        	bottom: 0.3px;
        	overflow: hidden;
        	width: 100%;
        	height: 250px;
        	border: none; 
        	text-align: center;
        	font-size= 30px;">
       
        <div class="dummy">
            <div class="col-sm-4" style="text-align: center; display: inline-block; width: 33%; float: left; background-color: black">
                <a href="{{ route('medicion') }}" style="text-decoration: none; float: center">
                    <div style="text-decoration: none; float:center">
                    	<!-- <img src="images/iconos/hospedaje150_z.png"  style="float: center"> -->
                    	Nuevo Proyecto de M&E
                    </div>
                </a>
            </div>
            <div class="col-sm-4" style="text-align: center; text-decoration: none; display: inline-block; width: 33%; float: left;  background-color: black">
                <a href="{{ route('listadoMediciones') }}" style="text-decoration: none; float: center">
                    <div style="text-decoration: none; float:center">
                    	<!--<img src="images/iconos/oradores150_z.png" style="float: center"> -->
                    	Ver Proyectos
                    </div>
                </a>
            </div> 
             <div class="col-sm-4" style="text-align: center; background-color: black; display: inline-block; width: 34%; float: left;">
                <a href="{{ route('nuevaMedicion') }}" style="text-decoration: none; float: center">
                    <div style="text-decoration: none; float:center">
                    Prueba Nueva Medicion
                    	<!--<img src="images/iconos/talleres150_z.png"  style="float: center"> -->                    	
                    </div>
                </a>
            </div>                  
        </div>
    </div>
</div>

@endsection