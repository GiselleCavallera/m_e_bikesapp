@extends('layouts.app')

@section('content')

<br>
<p>  <b><font size="4px">COMPARACION INDICADORES ELEMENTALES</font></b></p>

<div id="grafico_1" class="col-md-6"  style="display:inline-block;">
   
    
    
</div>
<?= Lava::render('ColumnChart', 'Valores_ID', 'grafico_1') ?>



@endsection
