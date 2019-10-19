<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\IndicadorDerivado;
use App\IndicadorElemental;
use App\Atributo;
use App\FuncionConjuncionDisyuncion;

class IndicadorDerivadoController extends Controller
{
    public function edit($idMedicion)
    {
    	$cantidad_caracteristicas= array(2, 2, 7, 3);
    	$nombre_indicadores_derivados= array('CALIDAD', 'Nivel de Adecuación Funcional', 'Nivel de Eficiencia de Desempeño', 'Nivel de Usabilidad', 'Nivel de Fiabilidad');


    	//Cáclculo para los requerimientos 1, 2, y 4. 
    	for($i=1; $i <= 4; $i++)
    	{
    		if($i != 3)
    		{
	    		$requerimiento= Atributo::idMedicion($idMedicion)->nroOrden($i)->nroSubitem('0')->get();
	    		$r= FuncionConjuncionDisyuncion::operador($requerimiento[0]->operador)->cantidadElementos($cantidad_caracteristicas[$i-1])->get(); //ver con los 3a y 3b
	    		$atributos= Atributo::idMedicion($idMedicion)->nroOrden($i)->nroSubitemDistinto('0')->get();

                //return count($r).'  '.$cantidad_caracteristicas[$i-1].'  '.$requerimiento[0]->operador;
	    		$sumatoria_pesos= 0;
	    		for($a=0; $a < $cantidad_caracteristicas[($i-1)]; $a++)
	    		{
	    			$inidicador_elemental= IndicadorElemental::idAtributo($atributos[$a]->id)->get();
	    			$sumatoria_pesos+= $atributos[$a]->peso * pow($inidicador_elemental[0]->valor, $r[0]->r);
	    		}

	    		$i_derivado_valor= pow($sumatoria_pesos, 1/$r[0]->r);

	    		$indicador_drivado= new IndicadorDerivado();
	    		$indicador_drivado->nombre= $nombre_indicadores_derivados[$i];
	    		$indicador_drivado->valor= $i_derivado_valor;
	    		$indicador_drivado->idAtributo= $requerimiento[0]->id;
                $indicador_drivado->nroOrden= $i;
                $indicador_drivado->idMedicion= $idMedicion;
	    		$indicador_drivado->save();
    		}
    	}

    	//Para atributos de requerimiento 3

        $usabilidad_a= Atributo::idMedicion($idMedicion)->nroOrden(3)->nroSubitem('a')->get();
        $usabilidad_b= Atributo::idMedicion($idMedicion)->nroOrden(3)->nroSubitem('b')->get();

    	$requerimiento_usab= Atributo::idMedicion($idMedicion)->nroOrden(3)->nroSubitem('0')->get();
    	$atributos= Atributo::idMedicion($idMedicion)->nroOrden(3)->nroSubitemDistinto('0')->nroSubitemDistinto('a')->nroSubitemDistinto('b')->get();

    	$r_a= FuncionConjuncionDisyuncion::operador($usabilidad_a[0]->operador)->cantidadElementos(4)->get();
    	$sumatoria_pesos_a= 0;
    	for($i= 0; $i < 4; $i++)
    	{
    		$inidicador_elemental= IndicadorElemental::idAtributo($atributos[$i]->id)->get();
			$sumatoria_pesos_a+= $atributos[$i]->peso * pow($inidicador_elemental[0]->valor, $r_a[0]->r);
    	}

        $i_derivado_usab_a= pow($sumatoria_pesos_a, 1/$r_a[0]->r);

        $indicador_drivado= new IndicadorDerivado();
        $indicador_drivado->nombre= 'N_Usabilidad_A';
        $indicador_drivado->valor= $i_derivado_usab_a;
        $indicador_drivado->idAtributo= $usabilidad_a[0]->id;
        $indicador_drivado->nroOrden='3a';
        $indicador_drivado->idMedicion= $idMedicion;
        $indicador_drivado->save();

        //return count($atributos); 

		$sumatoria_pesos_b= 0;
    	$r_b= FuncionConjuncionDisyuncion::operador($usabilidad_b[0]->operador)->cantidadElementos(3)->get();
    	for($i= 4; $i < 7; $i++)
    	{
    		$inidicador_elemental= IndicadorElemental::idAtributo($atributos[$i]->id)->get();
			$sumatoria_pesos_b+= $atributos[$i]->peso * pow($inidicador_elemental[0]->valor, $r_b[0]->r);
    	}

        $i_derivado_usab_b= pow($sumatoria_pesos_b, 1/$r_b[0]->r);

        $indicador_drivado= new IndicadorDerivado();
        $indicador_drivado->nombre= 'N_Usabilidad_B';
        $indicador_drivado->valor= $i_derivado_usab_b;
        $indicador_drivado->idAtributo= $usabilidad_b[0]->id;
        $indicador_drivado->nroOrden='3b';
        $indicador_drivado->idMedicion= $idMedicion;
        $indicador_drivado->save();

        //Calculo para requerimiento 3
        $r_usab=  FuncionConjuncionDisyuncion::operador($requerimiento_usab[0]->operador)->cantidadElementos(2)->get();
        $sumatoria_pesos_usabilidad= ($usabilidad_a[0]->peso * pow($i_derivado_usab_a, $r_usab[0]->r)) + ($usabilidad_b[0]->peso * pow($i_derivado_usab_b, $r_usab[0]->r));

        $i_derivado_usabilidad= pow($sumatoria_pesos_usabilidad, 1/$r_usab[0]->r);

        $indicador_drivado= new IndicadorDerivado();
        $indicador_drivado->nombre= $nombre_indicadores_derivados[3];
        $indicador_drivado->valor= $i_derivado_usabilidad;
        $indicador_drivado->idAtributo= $requerimiento_usab[0]->id;
        $indicador_drivado->nroOrden='3';
        $indicador_drivado->idMedicion= $idMedicion;
        $indicador_drivado->save();

        //Indicador Derivado CALIDAD
        $indicadores= IndicadorDerivado::nombreContiene('Nivel')->get();
        $requerimientos= Atributo::idMedicion($idMedicion)->nroSubitem('0')->get();
        $sumatoria_pesos_indi= 0;

        $r_n_calidad= FuncionConjuncionDisyuncion::operador($requerimientos[0]->operador)->cantidadElementos(4)->get();

        for($i=1; $i < 5; $i++)
        {           
            $sumatoria_pesos_indi+= $requerimientos[$i]->peso * pow($indicadores[($i-1)]->valor, $r_n_calidad[0]->r);
        }

        $i_derivado_calidad= pow($sumatoria_pesos_indi, 1/$r_n_calidad[0]->r);

        $indicador_drivado= new IndicadorDerivado();
        $indicador_drivado->nombre= $nombre_indicadores_derivados[0];
        $indicador_drivado->valor= 70.5/*$i_derivado_calidad*/;
        $indicador_drivado->idAtributo= $requerimientos[0]->id;
        $indicador_drivado->nroOrden='0';
        $indicador_drivado->idMedicion= $idMedicion;
        $indicador_drivado->save();
    

        //return response()->redirectToAction('RangosDecisionController@show', $idMedicion);
        return redirect()->route('rangos',  $idMedicion);
    }


    //Otras funcionesss
    public function index()
    {

    }

    public function create()
    {

    }

    public function store()
    {

    }

    public function update()
    {

    }
}


    
//SELECT nombre, nroOrden, nroSubitem, peso, operador, idMedicion, metricas.valor FROM `atributos` inner join `metricas` on atributos.id=idAtributo where idMedicion= 64 