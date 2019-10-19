<?php

namespace App\Http\Controllers;
use App\Medicion;
use App\Requerimiento;
use App\Subcaracteristica;
use App\Atributo;
use App\RangoDecision;
use App\IndicadorDerivado;
use App\IndicadorElemental;

use Illuminate\Http\Request;

use Khill\Lavacharts\Lavacharts;

class MedicionesController extends Controller
{
   
    public function store(Request $request)
    {
    	$mensaje= 'exito';

    	$medicion= new Medicion();
    	$medicion->nombre= substr($request->input('nombre'), 0, 300);
    	$medicion->fecha= date('Y/m/d H:i:s');
        $medicion->descripcion= substr($request->input('descripcion'), 0, 300);
        $medicion->nroReferencia= $request->input('nro_referencia');
        $medicion->evaluadores= substr($request->input('evaluadores'), 0, 300);
        $medicion->proposito= substr($request->input('proposito'), 0, 300);
        $medicion->objeto= substr($request->input('objeto'), 0, 300);
        $medicion->entidad= substr($request->input('entidad'), 0, 300);
        $medicion->foco= substr($request->input('foco'), 0, 300);
        $medicion->contexto = substr($request->input('contexto'), 0, 300);

    	$medicion->save();

        //Se guardan los requerimientos //Siempre los mismos  -- Pertenecen al Modelo de Caidad utilizado
        $requerimientos= array("CALIDAD DE PRODUCTO", "Adecuación Funcional", "Eficiencia Desempeño", "Usabilidad", "Fiabilidad");   

        $subcaracteristicas[0]= array("Completitud Funcional", "Corrección Funcional");
        $subcaracteristicas[1]= array("Comportamiento temporal", "Utilización de recursos");
        $subcaracteristicas[2]= array("Inteligibilidad", "Aprendizaje", "Operabilidad", "Estética", "Accesibilidad", "Beneficio", "Interpretabilidad");
        $subcaracteristicas[3]= array("Madurez", "Disponibilidad", "Tolerancia a fallos");
        $subcaracteristicas[4]= array( "Usabilidad A", "Usabilidad B");

        for($i=0; $i<5; $i++)
        {
            $requerimiento= new Atributo();
            $requerimiento->nombre= $requerimientos[$i];
            $requerimiento->idMedicion= $medicion->id;
            $requerimiento->nroOrden= $i; //ver si está bien !!!!!!!!!!!!! ------------------
            $requerimiento->nroSubitem= '0';

            $requerimiento->save();

            if($i != 0)
            {    
                for($subcar= 0; $subcar < count($subcaracteristicas[$i-1]); $subcar++)
                {
                    $subcaracteristica= new Atributo();
                    $subcaracteristica->nombre= $subcaracteristicas[$i-1][$subcar];
                    $subcaracteristica->idMedicion= $medicion->id;
                    $subcaracteristica->nroOrden= $i;
                    $subcaracteristica->nroSubitem= ''.($subcar+1).'';
                    $subcaracteristica->save();
                }
            }
        }

        $char_subcarac_especiales= array('a', 'b');
        //atributos especiales para trabajar con r= 7
        for($i=0; $i<2; $i++)
        {
            $subcaracteristica= new Atributo();
            $subcaracteristica->nombre= $subcaracteristicas[4][$i];
            $subcaracteristica->idMedicion= $medicion->id;
            $subcaracteristica->nroOrden= 3;
            $subcaracteristica->nroSubitem= $char_subcarac_especiales[$i];
            $subcaracteristica->save();
        } 


        /* Comentado el 20/6/19
        for($i=0; $i<5; $i++)
        {
            $requerimiento= new Requerimiento();
            $requerimiento->nombre= $requerimientos[$i];
            $requerimiento->idMedicion= $medicion->id;
            $requerimiento->nroOrden= $i; //ver si está bien !!!!!!!!!!!!! ------------------

            $requerimiento->save();

            if($i !=0)
            {    
                for($subcar= 0; $subcar < count($subcaracteristicas[$i-1]); $subcar++)
                {
                    $subcaracteristica= new Subcaracteristica();
                    $subcaracteristica-nombre= $subcaracteristicas[$i-1][$subcar];
                    $subcaracteristica->idRequerimiento= $requerimiento->id;
                    $subcaracteristica->nroOrden= $subcar+1;
                    $subcaracteristica->save();
                }>
            }
        }*/
       

        //$lava = new Lavacharts; // See note below for Laravel

        /*$votes  = \Lava::DataTable(); //$lava->DataTable();

        $votes->addStringColumn('Food Poll')
              ->addNumberColumn('Votes')
              ->addRow(['Tacos',  rand(1000,5000)])
              ->addRow(['Salad',  rand(1000,5000)])
              ->addRow(['Pizza',  rand(1000,5000)])
              ->addRow(['Apples', rand(1000,5000)])
              ->addRow(['Fish',   rand(1000,5000)]);

        $graph= \Lava::BarChart('Votes_1', $votes); 


        $levels  = \Lava::DataTable(); //$lava->DataTable();

        $levels->addStringColumn('Drink Poll')
              ->addNumberColumn('Levels')
              ->addRow(['Water',  1000])
              ->addRow(['Coca',  2300])
              ->addRow(['Sprite',  3400])
              ->addRow(['Fanta', 1800])
              ->addRow(['RedBUll',  4200]);

        $graphh= \Lava::BarChart('Levels_1', $levels);*/


        //Gráficos  ***************************************************************/  
        //RAngos
        $rangos= RangoDecision::idMedicion(99)->orderBy('orden')->get();
        $cantidad_rangos= count($rangos);


        $ie_adecu = \DB::table('indicadores_elementales')
                                    ->where('idMedicion', 99)
                                    ->whereBetween('idIEReferencia', array(1, 2))->get();

        /*$adecu  = \Lava::DataTable(); //$lava->DataTable();

        $adecu->addDateColumn('Year')
        //->addStringColumn('Ind Elemet Adecuacion')
              ->addNumberColumn('%IF')
              ->addNumberColumn('%EE')
              ->setDateTimeFormat('Y')
              //->addRow(['%lF',  $ie_adecu[0]->valor])              
              ->addRow(['2005',  $ie_adecu[0]->valor,  $ie_adecu[1]->valor ]);

        $graphhh= \Lava::ColumnChart('Nivel_1', $adecu, 
            ['colors'   => array('red', 'green'),
                'title' => 'Indicadores Elementales Addecuación']);*/
        $colores_ad= array();

        for($i=0; $i < count($ie_adecu); $i++)
        {    
            if($cantidad_rangos == 3)
            {              

                if($ie_adecu[$i]->valor > $rangos[0]->valorMinimo and  $ie_adecu[$i]->valor < $rangos[0]->valorMaximo)
                {
                    array_push($colores_ad, "#fc2b2b");
                }
                else if($ie_adecu[$i]->valor >= $rangos[1]->valorMinimo and  $ie_adecu[$i]->valor < $rangos[1]->valorMaximo)
                {
                    array_push($colores_ad, "#ffde4a");
                }
                else {
                    array_push($colores_ad, "#5ef778");
                }
            }
        }

        $ewa = \Lava::DataTable();
        $ewa->addStringColumn('Infraction')
            ->addNumberColumn('Porcentaje')
            ->addRoleColumn('string', 'style')
            ->addRoleColumn('string', 'annotation');

        $ewa->addRows([
            ['%IF', $ie_adecu[0]->valor, $colores_ad[0]/*'#5e5ebd'*/],
            ['%EE', $ie_adecu[1]->valor, $colores_ad[1]/*'#1c0469'*/]
        ]);

        $grap= \Lava::ColumnChart('EWA', $ewa, [
            'title' => "INDICADORES ELEMENTALES ADECUACIÓN FUNCIONAL",
            'legend' => 'none',
            'vAxis' => [
                'title'=>'Nivel (%)'
            ],
            'height' => 300,
            'width' => 450
        ]);



        $ie_efi = \DB::table('indicadores_elementales')
                                    ->where('idMedicion', 99)
                                    ->whereBetween('idIEReferencia', array(3, 4))->get();
        
        $colores_efi= array();

        for($i=0; $i < count($ie_efi); $i++)
        {    
            if($ie_efi[$i]->valor > $rangos[0]->valorMinimo and  $ie_efi[$i]->valor < $rangos[0]->valorMaximo)
            {
                array_push($colores_efi, "#fc2b2b");
            }
            else if($ie_efi[$i]->valor >= $rangos[1]->valorMinimo and  $ie_efi[$i]->valor < $rangos[1]->valorMaximo)
            {
                array_push($colores_efi, "#ffde4a");
            }
            else {
                array_push($colores_efi, "#5ef778");
            }
        }

        $ie_eficiencia  = \Lava::DataTable(); //$lava->DataTable();
        /*
        $ie_eficiencia->addStringColumn('ie_efi')
              ->addNumberColumn('nivel')
              ->addRow(['%TMR',  $ie_efi[0]->valor])
              ->addRow(['%OEM',  $ie_efi[1]->valor]);

        $graph_efi= \Lava::BarChart('iee', $ie_eficiencia); //, ['colors'   => array( 'green')]*/

        $ie_eficiencia->addStringColumn('Infraction')
            ->addNumberColumn('Porcentaje')
            ->addRoleColumn('string', 'style')
            ->addRoleColumn('string', 'annotation');
        $ie_eficiencia->addRows([
            ['%TMR',  $ie_efi[0]->valor, $colores_efi[0]/*'#ebd465'*/],
            ['%OEM',  $ie_efi[1]->valor, $colores_efi[1]/*'#c9b200'*/]
        ]);

        $grap= \Lava::ColumnChart('iee', $ie_eficiencia, [
            'title' => "INDICADORES ELEMENTALES EFICIENCIA DE DESEMPEÑO",
            'legend' => 'none',
            'vAxis' => [
                'title'=>'Nivel (%)'
            ],
            'height' => 300,
            'width' => 450
        ]);

        $ie_usab=  \DB::table('indicadores_elementales')
                                    ->where('idMedicion', 99)
                                    ->whereBetween('idIEReferencia', array(5, 11))->get();

        $colores_usa= array();

        for($i=0; $i < count($ie_usab); $i++)
        {    
            if($ie_usab[$i]->valor > $rangos[0]->valorMinimo and  $ie_usab[$i]->valor < $rangos[0]->valorMaximo)
            {
                array_push($colores_usa, "#fc2b2b");
            }
            else if($ie_usab[$i]->valor >= $rangos[1]->valorMinimo and  $ie_usab[$i]->valor < $rangos[1]->valorMaximo)
            {
                array_push($colores_usa, "#ffde4a");
            }
            else {
                array_push($colores_usa, "#5ef778");
            }
        }

        $ie_usabilidad = \Lava::DataTable();
        $ie_usabilidad->addStringColumn('Infraction')
            ->addNumberColumn('Porcentaje')
            ->addRoleColumn('string', 'style')
            ->addRoleColumn('string', 'annotation');

        $ie_usabilidad->addRows([
            ['%Ces', $ie_usab[0]->valor, $colores_usa[0]/*'#f5edd7'*/],
            ['%FA', $ie_usab[1]->valor, $colores_usa[1]/*'#f0ddaa'*/],
            ['%CE', $ie_usab[2]->valor, $colores_usa[2]/*'#e47c5d'*/],
            ['%IA', $ie_usab[3]->valor, $colores_usa[3]/*'#e42d40'*/],
            ['%AF', $ie_usab[4]->valor, $colores_usa[4]/*'#8f0e33'*/],
            ['%ED', $ie_usab[5]->valor, $colores_usa[5]/*'#142b3b'*/],
            ['%CP', $ie_usab[6]->valor, $colores_usa[6]/*'#2b143b'*/]
        ]);

        $grap= \Lava::ColumnChart('usabilidad', $ie_usabilidad, [
            'title' => "INDICADORES ELEMENTALES USABILIDAD",
            'legend' => 'none',
            'vAxis' => [
                'title'=>'Nivel (%)'
            ],
            'height' => 300,
            'width' => 450
        ]);


        $ie_fiab=  \DB::table('indicadores_elementales')
                                    ->where('idMedicion', 99)
                                    ->whereBetween('idIEReferencia', array(12, 14))->get();

        $colores_fia= array();

        for($i=0; $i < count($ie_fiab); $i++)
        {    
            if($ie_fiab[$i]->valor > $rangos[0]->valorMinimo and  $ie_fiab[$i]->valor < $rangos[0]->valorMaximo)
            {
                array_push($colores_fia, "#fc2b2b");
            }
            else if($ie_fiab[$i]->valor >= $rangos[1]->valorMinimo and  $ie_fiab[$i]->valor < $rangos[1]->valorMaximo)
            {
                array_push($colores_fia, "#ffde4a");
            }
            else {
                array_push($colores_fia, "#5ef778");
            }
        }

        $ie_fiabilidad = \Lava::DataTable();
        $ie_fiabilidad->addStringColumn('Infraction')
            ->addNumberColumn('Porcentaje')
            ->addRoleColumn('string', 'style')
            ->addRoleColumn('string', 'annotation');

        $ie_fiabilidad->addRows([
            ['%Ces', $ie_fiab[0]->valor, $colores_fia[0]/*'#72a189'*/],
            ['%FA', $ie_fiab[1]->valor, $colores_fia[1]/*'#7affa9'*/],
            ['%CE', $ie_fiab[2]->valor, $colores_fia[2]/*'#335c30'*/]
        ]);

        $grap= \Lava::ColumnChart('fiabilidad', $ie_fiabilidad, [
            'title' => "INDICADORES ELEMENTALES FIABILIDAD",
            'legend' => 'none',
            'vAxis' => [
                'title'=>'Nivel (%)'
            ],
            'height' => 300,
            'width' => 450
        ]);


        $id=  \DB::table('indicadores_derivados')
                        ->where('idMedicion', 99)
                        ->whereBetween('nroOrden', array(1, 4))
                        ->where('nombre', 'like', 'Nivel%')->get();

        $temps = \Lava::DataTable();

        $temps->addStringColumn('Type')
              ->addNumberColumn('Value')
              ->addRow([$id[0]->nombre, $id[0]->valor])
              ->addRow([$id[1]->nombre, $id[1]->valor])
              ->addRow([$id[2]->nombre, $id[2]->valor])
              ->addRow([$id[3]->nombre, $id[3]->valor]);

        $grap= \Lava::GaugeChart('Temps', $temps, [
            'title' => "INDICADORES DERIVADOS",
            'width'      => 600,
            'greenFrom'  => $rangos[2]->valorMinimo,
            'greenTo'    => $rangos[2]->valorMaximo,
            'yellowFrom' => $rangos[1]->valorMinimo,
            'yellowTo'   => $rangos[1]->valorMaximo,
            'redFrom'    => $rangos[0]->valorMinimo,
            'redTo'      => $rangos[0]->valorMaximo,
            'majorTicks' => [
                'No Aceptable',
                'Aceptable'
            ]
        ]);
        

        $id_calidad=  \DB::table('indicadores_derivados')
                                    ->where('idMedicion', 99)
                                    ->where('nroOrden', 0)->get();

        $calidad = \Lava::DataTable();

        $calidad->addStringColumn('Type')
              ->addNumberColumn('Value')
              ->addRow(['CALIDAD', $id_calidad[0]->valor]);

        $grap= \Lava::GaugeChart('Calidad', $calidad, [
            'title' => "NIVEL DE CALIDAD",
            'width'      => 1700,
            'greenFrom'  => $rangos[2]->valorMinimo,
            'greenTo'    => $rangos[2]->valorMaximo,
            'yellowFrom' => $rangos[1]->valorMinimo,
            'yellowTo'   => $rangos[1]->valorMaximo,
            'redFrom'    => $rangos[0]->valorMinimo,
            'redTo'      => $rangos[0]->valorMaximo,
            'majorTicks' => [
                'No Aceptable',
                'Aceptable'
            ]
        ]);

        /**************************************************************************/ 

        //return $ie_adecu;

        return view('medicion')->with('medicion', $medicion)->with('msj', 'Se grabó la MEDICIÓN.')->with('id_calidad', $id_calidad[0]->valor)/*->with('graph', $graph)*/;

		//return $mensaje;
    	/*if($request->ajax())
		{
			return $mensaje;
		}
		else 
		{
			return 'mal';
		}*/

    }


    public function index()
    {

    }

    public function edit()
    {

    }

    public function create()
    {

    }

    public function update()
    {

    }

    //grabar los operadore y los pesos de los requerimientos
    function grabarOperadoresYPesosRequerimientos(Request $request, $idMedicion)
    {

        $atributos= Atributo::idMedicion($idMedicion)->get();

        $mensaje= '';
        //$nros_orden= array(0,1,2,3,4);
        $cant_atributos= count($atributos);

        for($i=0; $i < $cant_atributos; $i++)
        {
           if( $atributos[$i]->nroSubitem == 0 || ctype_alpha($atributos[$i]->nroSubitem))
           {
                if($atributos[$i]->nroOrden <= 4)
                {
                    if($atributos[$i]->nroOrden > 0)
                    {
                        if(!ctype_alpha($atributos[$i]->nroSubitem))
                        {   
                            $atributos[$i]->operador= $request->input('operadores_'.$atributos[$i]->nroOrden);
                        
                            $atributos[$i]->peso= $request->input('peso_'.$atributos[$i]->nroOrden);
                        }
                        else 
                        {
                            $atributos[$i]->operador= $request->input('operadores_'.$atributos[$i]->nroOrden.$atributos[$i]->nroSubitem);
                        }
                        
                        $mensaje.= $atributos[$i]->nroOrden.') '. $request->input('peso_'.$atributos[$i]->nroOrden).'  *  ';
                    }
                    else {
                        $atributos[$i]->operador= $request->input('operadores_'.$i);
                    }
                    $atributos[$i]->save();
                }
                
            }

        } 

        if($request->ajax())
        {
            return $mensaje.'  /  '.'siiiiiiiiiiiiiiiiii '.$cant_atributos;
        }
        else {
            return "No es peticion ajax!";
        }

        /*for($i=0; $i < $cant_atributos; $i++)
        {
            switch ($atributos[$i]->nroOrden)
            {
                case 0:
                    $atributos[$i]->operador= $request->input('operadores_0');                    
                    break;
                case 1:
                    $atributos[$i]->operador= $request->input('operadores_1');
                    $atributos[$i]->peso= $request->input('peso_1');
                    break;
                 case 2:
                    $atributos[$i]->operador= $request->input('operadores_2');
                    $atributos[$i]->peso= $request->input('peso_2');
                    break;
                case 3:
                    $atributos[$i]->operador= $request->input('operadores_3');
                    $atributos[$i]->peso= $request->input('peso_3');
                    break;
                case 4:
                    $atributos[$i]->operador= $request->input('operadores_4');
                    $atributos[$i]->peso= $request->input('peso_4');
                    break;
                default:
                    break;
            }            
        }*/
    }

    //grabat lospesos dde las subcaracteristicas. (ver los intermedios que quedan colgados)
    function grabarPesosRequerimientos(Request $request, $idMedicion)
    {
        $atributos= Atributo::idMedicion($idMedicion)->get();

        $mensaje= '';
        
        $cant_atributos= count($atributos);

        for($i=0; $i < $cant_atributos; $i++)
        {
           if( $atributos[$i]->nroSubitem != '0')
           {
                $atributos[$i]->peso= $request->input('peso_'.$atributos[$i]->nroOrden.$atributos[$i]->nroSubitem);
                
                $mensaje.= $atributos[$i]->nroOrden.') '. $request->input('peso_'.$atributos[$i]->nroOrden.$atributos[$i]->nroSubitem).'  *  ';

                $atributos[$i]->save();
           }
       }

       if($request->ajax())
        {
            return response()->redirectToAction('IndicadorDerivadoController@edit', $idMedicion);
            //return view('rangosDecision')->with('idMedicion', $idMedicion);
            //return $mensaje.'  /  '.'siiiiiiiiiiiiiiiiii '.$cant_atributos;
        }
        else {
            return "No es peticion ajax! grabar PESOS";
        }
    }

    function mostrarListado()
    {
        $mediciones= Medicion::all()->sortByDesc('fecha');

        return view('listadoMediciones')->with('mediciones', $mediciones);
    }

    function compararMediciones(Request $request)
    {
        $ids= explode(".", $request->input('ids_mediciones'));
        $mediciones= \DB::table('mediciones')
                                    ->whereIn('id', $ids)->get(); //ver que ande!!
        $cant_ids= count($ids);   

        $valores_adecuacion= array();
        $valores_eficiencia= array();
        $valores_usabilidad= array();    
        $valores_fiabilidad= array(); 

        for($i=0; $i< $cant_ids; $i++)
        {
            $ind_deriv_ad= IndicadorDerivado::nombreContiene('Nivel de Adecua')->idMedicion($ids[$i])->get();
            array_push($valores_adecuacion, $ind_deriv_ad[0]);

            $ind_deriv_ef= IndicadorDerivado::nombreContiene('Nivel de Eficien')->idMedicion($ids[$i])->get();
            array_push($valores_eficiencia, $ind_deriv_ef[0]);

            $ind_deriv_us= IndicadorDerivado::nombreContiene('Nivel de Usabili')->idMedicion($ids[$i])->get();
            array_push($valores_usabilidad, $ind_deriv_us[0]);

            $ind_deriv_fi= IndicadorDerivado::nombreContiene('Nivel de Fiabili')->idMedicion($ids[$i])->get();
            array_push($valores_fiabilidad, $ind_deriv_fi[0]);
        }

        //return $valores_adecuacion;

        //GRáfico de líneas comparativo
        $valores = \Lava::DataTable();

        $valores->addDateColumn('Date')
                     ->addNumberColumn('Adecuacion')
                     ->addNumberColumn('Eficiencia')
                     ->addNumberColumn('Usabilidad')
                     ->addNumberColumn('Fiabilidad');

        for($i=0; $i< $cant_ids; $i++)
        {
            $valores->addRow([$mediciones[$i]->fecha,  $valores_adecuacion[$i], $valores_eficiencia[$i], $valores_usabilidad[$i], $valores_fiabilidad[$i]]);

                 /*->addRow(['2014-10-2',  68, 65, 61])
                 ->addRow(['2014-10-3',  68, 62, 55])
                 ->addRow(['2014-10-4',  72, 62, 52])
                 ->addRow(['2014-10-5',  61, 54, 47])
                 ->addRow(['2014-10-6',  70, 58, 45])
                 ->addRow(['2014-10-7',  74, 70, 65])
                 ->addRow(['2014-10-8',  75, 69, 62])
                 ->addRow(['2014-10-9',  69, 63, 56])
                 ->addRow(['2014-10-10', 64, 58, 52])
                 ->addRow(['2014-10-11', 59, 55, 50])
                 ->addRow(['2014-10-12', 65, 56, 46])
                 ->addRow(['2014-10-13', 66, 56, 46])
                 ->addRow(['2014-10-14', 75, 70, 64])
                 ->addRow(['2014-10-15', 76, 72, 68])
                 ->addRow(['2014-10-16', 71, 66, 60])
                 ->addRow(['2014-10-17', 72, 66, 60])
                 ->addRow(['2014-10-18', 63, 62, 62]);*/
        }
        /*
        $graph= \Lava::LineChart('Valores_ID', $valores, [
            'title' => 'Valores de Indicadores Derivados'
        ]);*/

        $graph= \Lava::ColumnsChart('Valores_ID', $valores, [
            'title' => 'Valores de Indicadores Derivados'
        ]);

        //PRUEBAAAAAAAA!!!!!
        /*$temperatures = \Lava::DataTable();

        $temperatures->addDateColumn('Date')
                     ->addNumberColumn('Max Temp')
                     ->addNumberColumn('Mean Temp')
                     ->addNumberColumn('Min Temp')
                     ->addRow(['2014-10-1',  67, 65, 62])
                     ->addRow(['2014-10-2',  68, 65, 61])
                     ->addRow(['2014-10-3',  68, 62, 55])
                     ->addRow(['2014-10-4',  72, 62, 52])
                     ->addRow(['2014-10-5',  61, 54, 47])
                     ->addRow(['2014-10-6',  70, 58, 45])
                     ->addRow(['2014-10-7',  74, 70, 65])
                     ->addRow(['2014-10-8',  75, 69, 62])
                     ->addRow(['2014-10-9',  69, 63, 56])
                     ->addRow(['2014-10-10', 64, 58, 52])
                     ->addRow(['2014-10-11', 59, 55, 50])
                     ->addRow(['2014-10-12', 65, 56, 46])
                     ->addRow(['2014-10-13', 66, 56, 46])
                     ->addRow(['2014-10-14', 75, 70, 64])
                     ->addRow(['2014-10-15', 76, 72, 68])
                     ->addRow(['2014-10-16', 71, 66, 60])
                     ->addRow(['2014-10-17', 72, 66, 60])
                     ->addRow(['2014-10-18', 63, 62, 62]);

        $graphhh= \Lava::LineChart('Temps', $temperatures, [
            'title' => 'Weather in October'
        ]);*/


        //return $valores;
        return view('comparacionMediciones');

    }

    function saveComentarios(Request $request, $idMedicion){
        $medicion= Medicion::find($idMedicion);
        $medicion->comentarios= $request->input('comentarios');

        $medicion->save();

        return view('inicio');

    }

    function obtenerResultadosProyecto($idMedicion){

        $indicadores_elementales= IndicadorElemental::idMedicion($idMedicion)->get();

        $indicadores_derivados= IndicadorDerivado::idMedicion($idMedicion)->get();

        $rangos= RangoDecision::idMedicion($idMedicion)->orderBy('orden','asc')->get();


        $rangos= RangoDecision::idMedicion($idMedicion)->orderBy('orden')->get();
        $cantidad_rangos= count($rangos);


        $ie_adecu = \DB::table('indicadores_elementales')
                                    ->where('idMedicion', $idMedicion)
                                    ->whereBetween('idIEReferencia', array(1, 2))->get();

        $colores_ad= array();

        for($i=0; $i < count($ie_adecu); $i++)
        {    
            if($cantidad_rangos == 3)
            {              

                if($ie_adecu[$i]->valor > $rangos[0]->valorMinimo and  $ie_adecu[$i]->valor < $rangos[0]->valorMaximo)
                {
                    array_push($colores_ad, "#fc2b2b");
                }
                else if($ie_adecu[$i]->valor >= $rangos[1]->valorMinimo and  $ie_adecu[$i]->valor < $rangos[1]->valorMaximo)
                {
                    array_push($colores_ad, "#ffde4a");
                }
                else {
                    array_push($colores_ad, "#5ef778");
                }
            }
        }

        $ewa = \Lava::DataTable();
        $ewa->addStringColumn('Infraction')
            ->addNumberColumn('Porcentaje')
            ->addRoleColumn('string', 'style')
            ->addRoleColumn('string', 'annotation');

        $ewa->addRows([
            ['%IF', $ie_adecu[0]->valor, $colores_ad[0]], /*'#5e5ebd'*/
            ['%EE', $ie_adecu[1]->valor, $colores_ad[1]] /*'#1c0469'*/
        ]);

        $grap= \Lava::ColumnChart('EWA', $ewa, [
            'title' => "INDICADORES ELEMENTALES ADECUACIÓN FUNCIONAL",
            'legend' => 'none',
            'vAxis' => [
                'title'=>'Nivel (%)'
            ],
            'height' => 300,
            'width' => 450
        ]);



        $ie_efi = \DB::table('indicadores_elementales')
                                    ->where('idMedicion', $idMedicion)
                                    ->whereBetween('idIEReferencia', array(3, 4))->get();
        
        $colores_efi= array();

        for($i=0; $i < count($ie_efi); $i++)
        {    
            if($ie_efi[$i]->valor > $rangos[0]->valorMinimo and  $ie_efi[$i]->valor < $rangos[0]->valorMaximo)
            {
                array_push($colores_efi, "#fc2b2b");
            }
            else if($ie_efi[$i]->valor >= $rangos[1]->valorMinimo and  $ie_efi[$i]->valor < $rangos[1]->valorMaximo)
            {
                array_push($colores_efi, "#ffde4a");
            }
            else {
                array_push($colores_efi, "#5ef778");
            }
        }

        $ie_eficiencia  = \Lava::DataTable(); //$lava->DataTable();
        /*
        $ie_eficiencia->addStringColumn('ie_efi')
              ->addNumberColumn('nivel')
              ->addRow(['%TMR',  $ie_efi[0]->valor])
              ->addRow(['%OEM',  $ie_efi[1]->valor]);

        $graph_efi= \Lava::BarChart('iee', $ie_eficiencia); //, ['colors'   => array( 'green')]*/

        $ie_eficiencia->addStringColumn('Infraction')
            ->addNumberColumn('Porcentaje')
            ->addRoleColumn('string', 'style')
            ->addRoleColumn('string', 'annotation');
        $ie_eficiencia->addRows([
            ['%TMR',  $ie_efi[0]->valor, $colores_efi[0]/*'#ebd465'*/],
            ['%OEM',  $ie_efi[1]->valor, $colores_efi[1]/*'#c9b200'*/]
        ]);

        $grap= \Lava::ColumnChart('iee', $ie_eficiencia, [
            'title' => "INDICADORES ELEMENTALES EFICIENCIA DE DESEMPEÑO",
            'legend' => 'none',
            'vAxis' => [
                'title'=>'Nivel (%)'
            ],
            'height' => 300,
            'width' => 450
        ]);

        $ie_usab=  \DB::table('indicadores_elementales')
                                    ->where('idMedicion', $idMedicion)
                                    ->whereBetween('idIEReferencia', array(5, 11))->get();

        $colores_usa= array();

        for($i=0; $i < count($ie_usab); $i++)
        {    
            if($ie_usab[$i]->valor > $rangos[0]->valorMinimo and  $ie_usab[$i]->valor < $rangos[0]->valorMaximo)
            {
                array_push($colores_usa, "#fc2b2b");
            }
            else if($ie_usab[$i]->valor >= $rangos[1]->valorMinimo and  $ie_usab[$i]->valor < $rangos[1]->valorMaximo)
            {
                array_push($colores_usa, "#ffde4a");
            }
            else {
                array_push($colores_usa, "#5ef778");
            }
        }

        $ie_usabilidad = \Lava::DataTable();
        $ie_usabilidad->addStringColumn('Infraction')
            ->addNumberColumn('Porcentaje')
            ->addRoleColumn('string', 'style')
            ->addRoleColumn('string', 'annotation');

        $ie_usabilidad->addRows([
            ['%Ces', $ie_usab[0]->valor, $colores_usa[0]/*'#f5edd7'*/],
            ['%FA', $ie_usab[1]->valor, $colores_usa[1]/*'#f0ddaa'*/],
            ['%CE', $ie_usab[2]->valor, $colores_usa[2]/*'#e47c5d'*/],
            ['%IA', $ie_usab[3]->valor, $colores_usa[3]/*'#e42d40'*/],
            ['%AF', $ie_usab[4]->valor, $colores_usa[4]/*'#8f0e33'*/],
            ['%ED', $ie_usab[5]->valor, $colores_usa[5]/*'#142b3b'*/],
            ['%CP', $ie_usab[6]->valor, $colores_usa[6]/*'#2b143b'*/]
        ]);

        $grap= \Lava::ColumnChart('usabilidad', $ie_usabilidad, [
            'title' => "INDICADORES ELEMENTALES USABILIDAD",
            'legend' => 'none',
            'vAxis' => [
                'title'=>'Nivel (%)'
            ],
            'height' => 300,
            'width' => 450
        ]);


        $ie_fiab=  \DB::table('indicadores_elementales')
                                    ->where('idMedicion', $idMedicion)
                                    ->whereBetween('idIEReferencia', array(12, 14))->get();

        $colores_fia= array();

        for($i=0; $i < count($ie_fiab); $i++)
        {    
            if($ie_fiab[$i]->valor > $rangos[0]->valorMinimo and  $ie_fiab[$i]->valor < $rangos[0]->valorMaximo)
            {
                array_push($colores_fia, "#fc2b2b");
            }
            else if($ie_fiab[$i]->valor >= $rangos[1]->valorMinimo and  $ie_fiab[$i]->valor < $rangos[1]->valorMaximo)
            {
                array_push($colores_fia, "#ffde4a");
            }
            else {
                array_push($colores_fia, "#5ef778");
            }
        }

        $ie_fiabilidad = \Lava::DataTable();
        $ie_fiabilidad->addStringColumn('Infraction')
            ->addNumberColumn('Porcentaje')
            ->addRoleColumn('string', 'style')
            ->addRoleColumn('string', 'annotation');

        $ie_fiabilidad->addRows([
            ['%Ces', $ie_fiab[0]->valor, $colores_fia[0]/*'#72a189'*/],
            ['%FA', $ie_fiab[1]->valor, $colores_fia[1]/*'#7affa9'*/],
            ['%CE', $ie_fiab[2]->valor, $colores_fia[2]/*'#335c30'*/]
        ]);

        $grap= \Lava::ColumnChart('fiabilidad', $ie_fiabilidad, [
            'title' => "INDICADORES ELEMENTALES FIABILIDAD",
            'legend' => 'none',
            'vAxis' => [
                'title'=>'Nivel (%)'
            ],
            'height' => 300,
            'width' => 450
        ]);


        $id=  \DB::table('indicadores_derivados')
                        ->where('idMedicion', $idMedicion)
                        ->whereBetween('nroOrden', array(1, 4))
                        ->where('nombre', 'like', 'Nivel%')->get();

        $temps = \Lava::DataTable();

        $temps->addStringColumn('Type')
              ->addNumberColumn('Value')
              ->addRow([$id[0]->nombre, $id[0]->valor])
              ->addRow([$id[1]->nombre, $id[1]->valor])
              ->addRow([$id[2]->nombre, $id[2]->valor])
              ->addRow([$id[3]->nombre, $id[3]->valor]);

        $grap= \Lava::GaugeChart('Temps', $temps, [
            'title' => "INDICADORES DERIVADOS",
            'width'      => 600,
            'greenFrom'  => $rangos[2]->valorMinimo,
            'greenTo'    => $rangos[2]->valorMaximo,
            'yellowFrom' => $rangos[1]->valorMinimo,
            'yellowTo'   => $rangos[1]->valorMaximo,
            'redFrom'    => $rangos[0]->valorMinimo,
            'redTo'      => $rangos[0]->valorMaximo,
            'majorTicks' => [
                'No Aceptable',
                'Aceptable'
            ]
        ]);
        

        $id_calidad=  \DB::table('indicadores_derivados')
                                    ->where('idMedicion', $idMedicion)
                                    ->where('nroOrden', 0)->get();

        $calidad = \Lava::DataTable();

        $calidad->addStringColumn('Type')
              ->addNumberColumn('Value')
              ->addRow(['CALIDAD', $id_calidad[0]->valor]);

        $grap= \Lava::GaugeChart('Calidad', $calidad, [
            'title' => "NIVEL DE CALIDAD",
            'width'      => 1700,
            'greenFrom'  => $rangos[2]->valorMinimo,
            'greenTo'    => $rangos[2]->valorMaximo,
            'yellowFrom' => $rangos[1]->valorMinimo,
            'yellowTo'   => $rangos[1]->valorMaximo,
            'redFrom'    => $rangos[0]->valorMinimo,
            'redTo'      => $rangos[0]->valorMaximo,
            'majorTicks' => [
                'No Aceptable',
                'Aceptable'
            ]
        ]);

        $medicion= Medicion::find($idMedicion);

        return view('resultadosProyecto')->with('medicion', $medicion)->with('indicadores_elementales', $indicadores_elementales)->with('indicadores_derivados', $indicadores_derivados)->with('cantidad_rangos', $cantidad_rangos);

    }
}
