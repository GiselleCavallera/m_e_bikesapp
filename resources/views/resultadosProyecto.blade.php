@extends('layouts.app')

@section('content')

<br>
<div class="panel-heading" align="center">
<h2>PROYECTO DE M&E NRO.: {{$medicion->nroReferencia}}</h2>
        Nombre:&nbsp; {{$medicion->nombre}} <br>
        Fecha: &nbsp; {{$medicion->fecha}} <br>
        Entidad: &nbsp; {{$medicion->entidad}} <br>
        Objejto: &nbsp; {{$medicion->objeto}} <br>
        Foco: &nbsp; {{$medicion->foco}} <br>


</div>
<br>

<p>  <b><font size="4px">INDICADORES ELEMENTALES</font></b></p>

<div id="grafico_1" class="col-md-6"  style="display:inline-block;">
   
    
    
</div>
<?= Lava::render('ColumnChart', 'EWA', 'grafico_1'); ?>


<div id="grafico_2" class="col-md-6" style="display:inline-block;">
   
    
    
</div>
<?= Lava::render('ColumnChart', 'iee', 'grafico_2'); ?>

<br><br><br><br><br><br><br>
<div id="grafico_3" class="col-md-6" style="display:inline-block;">
   
    
    
</div>
<?= Lava::render('ColumnChart', 'usabilidad', 'grafico_3'); ?>

<br>
<div id="grafico_4" class="col-md-6" style="display:inline-block;">
   
    
    
</div>
<?= Lava::render('ColumnChart', 'fiabilidad', 'grafico_4'); ?>

<br>
<p>  <b><font size="4px">INDICADORES DERIVADOS</font></b></p>
<div id="grafico_5" align="center">
   
    
    
</div>
<?= Lava::render('GaugeChart', 'Temps', 'grafico_5'); ?>

<br>
<div id="grafico_6"  align="center">
   
    
    
</div>
<?= Lava::render('GaugeChart', 'Calidad', 'grafico_6'); ?>


<br><br>
<p><label for="comentarios" class="col-md-4 control-label"> Recomendaciones/Comentarios </label></p>
       
<textarea id="contexto" class="form-control" name="comentarios" rows="8" value="" >
    {{$medicion->comentarios}}
</textarea>                 
@if ($errors->has('contexto'))
    <span class="help-block">
        <strong>{{ $errors->first('contexto') }}</strong>
    </span>
@endif                    
<br>

<div class="form-group" align="right">
        <a href="{{ route('listadoMediciones') }}" class="btn btn-primary btn-s">
                Atrás
        </a>
</div>

<br>

@endsection