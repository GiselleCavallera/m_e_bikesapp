@extends('layouts.app')

<br><br><br><br>
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading"><h4>NUEVO PROYECTO DE M&E</h4></div>
                
                
                
                {!! Form::open([ 'route' => 'mediciones.store', 'method' => 'POST', 'id'=>'nueva_medicion']) !!}
                <div class="panel-body">
                    <!--<form class="form-horizontal" role="form" method="POST" action="{{ route('medicion') }}" enctype="multipart/form-data">
                        {{ csrf_field() }} -->

                        <div class="form-group">
                            <label for="nombre" class="col-md-4 control-label">Nombre</label>

                            <div class="col-md-6">
                                <input id="nombre" type="text" class="form-control" name="nombre" value="" required autofocus>

                                @if ($errors->has('nombre'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('nombre') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <br><br>

                        <div class="form-group">
                            <label for="descripcion" class="col-md-4 control-label"> Descripción </label>

                            <div class="col-md-6">
                                <textarea id="descripcion" class="form-control" name="descripcion" value="" required autofocus>
                                	
                                </textarea> 

                                @if ($errors->has('descripcion'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('descripcion') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <br><br> <br><br>

                        <div class="form-group">
                            <label for="nro_referencia" class="col-md-4 control-label">Nro. de referencia </label>

                            <div class="col-md-6">
                                <input id="nro_referencia" type="text" class="form-control" name="nro_referencia" value="" required autofocus>

                                @if ($errors->has('nro_referencia'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('nro_referencia') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <br><br>

                        <div class="form-group">
                            <label for="evaluadores" class="col-md-4 control-label">Evaluadores</label>

                            <div class="col-md-6">
                               	
                            	<input id="evaluadores" type="text" class="form-control" name="evaluadores" value="" required autofocus>

                                @if ($errors->has('evaluadores'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('evaluadores') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <br><br>
                        
                        <div class="form-group">
                            <label for="proposito" class="col-md-4 control-label">Propósito </label>

                            <div class="col-md-6">
                                <textarea id="proposito" type="text" class="form-control" name="proposito" value="" required autofocus>
                                
                                </textarea>

                                @if ($errors->has('proposito'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('proposito') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <br><br> <br><br>

                        <div class="form-group">
                            <label for="objeto" class="col-md-4 control-label">Objeto </label>

                            <div class="col-md-6">
                                <input id="objeto" type="text" class="form-control" name="objeto" value="" required autofocus>

                                @if ($errors->has('objeto'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('objeto') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <br><br>
                        
                        <div class="form-group">
                            <label for="entidad" class="col-md-4 control-label">Entidad </label>

                            <div class="col-md-6">
                                <input id="entidad" type="text" class="form-control" name="entidad" value="" required autofocus>

                                @if ($errors->has('entidad'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('entidad') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <br><br>

                        <div class="form-group">
                            <label for="foco" class="col-md-4 control-label">Foco </label>

                            <div class="col-md-6">
                                <input id="foco" type="text" class="form-control" name="foco" value="" required autofocus>

                                @if ($errors->has('foco'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('foco') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <br><br>

                        <div class="form-group">
                            <label for="contexto" class="col-md-4 control-label">Contexto </label>

                            <div class="col-md-6">
                                <textarea id="contexto" class="form-control" name="contexto" value="" required autofocus>
                                	
                                </textarea> 
                                <!--
                                <input id="contexto" type="text" class="form-control" name="contexto" value="" required autofocus> -->

                                @if ($errors->has('contexto'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('contexto') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <br><br><br><br><br><br>

                        <div class="form-group">
                            <div class="col-xs-3"></div>
                            <div class="col-xs-3">
                                <button type="submit" class="btn btn-primary" onclick="cargando();">
                                    Grabar
                                </button>
                            </div>
                            <div class="col-xs-3">
                                <a href="{{ route('home')}}" class="btn btn-primary">
                                    Menú Principal
                                </a>
                            </div>
                            <div class="col-xs-3"></div>
                        </div>
                        <br><br>

                        <div class="form-group" align="center" style="display: none; align-content: center" id="img_cargando" >
                            <img src="images/cargando.gif"/>
                        </div>
                        <br><br>
                        
                    <!-- </form> -->
                </div>
                {!! Form::close() !!}

            </div>
        </div>
    </div>
</div>

<script type="text/javascript"> 
function cargando()
{
    document.getElementById('img_cargando').style.display='block';
}

</script>script>
@endsection