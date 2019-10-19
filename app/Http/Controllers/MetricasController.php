<?php

namespace App\Http\Controllers;
use App\Metrica;
use App\Atributo;
use App\MetricaReferencia;
use App\IndicadorElemental;
use App\IndicadorElementalReferencia;


use Illuminate\Http\Request;

class MetricasController extends Controller
{
    public function store(Request $request, $siglasMetrica, $idMedicion)
    {	
    	$ordenAtributo= $request->input('nroOrden');
    	$subitemAtributo= $request->input('nroSubitem');

    	$mensaje= $siglasMetrica.' * '.$idMedicion. '  * '. $ordenAtributo.' '. $subitemAtributo;

    	$atributoMedido= Atributo::idMedicion($idMedicion)->nroOrden($ordenAtributo)->nroSubitem($subitemAtributo)->get();

    	//print_r($atributoMedido);
    	//return $mensaje;

    	$metricaReferencia= MetricaReferencia::find($request->input('idMetricaReferencia'));

    	$metrica= new Metrica();
    	$metrica->idMetricaReferencia= $request->input('idMetricaReferencia');
    	$metrica->idAtributo= $atributoMedido[0]->id;
    	$metrica->valor= $request->input('metrica_'.$siglasMetrica);

    	
    	$cant_mediciones_promedio= 0;
    	if($metricaReferencia->esPromedio)
    	{
    		$cant_mediciones_promedio= $request->input('cant_pruebas_'.$siglasMetrica);
    	} else{
			$cant_mediciones_promedio= 0;
    	}

    	$metrica->cantMedicionesPromedio= $cant_mediciones_promedio;        
		$metrica->save();

        $ie= new IndicadorElemental();
        $ie->idIEREferencia= $request->input('idIEReferencia');
        $ie->idAtributo= $atributoMedido[0]->id;
        $ie->valor= $request->input('ie_'.$siglasMetrica);
        $ie->idMedicion= $idMedicion;
        $ie->save();

		if($request->ajax())
		{
			return $mensaje.'  '.' Grabó con Éxito!';
		}
		else {
			return "No es peticion ajax!";
		}

    }

    public function mostrarMetrica(Request $request, $idMetrica)
    {      
      
        $metrica_ref= MetricaReferencia::id($idMetrica)->get();
      
      
        return view('informacionMetricaReferencia')->with('metrica_referencia', $metrica_ref);
    }
}
