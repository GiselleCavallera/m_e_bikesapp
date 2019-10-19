<?php

namespace App\Http\Controllers;
use App\RangoDecision;
use App\IndicadorDerivado;
use App\IndicadorElemental;

use Illuminate\Http\Request;

use Khill\Lavacharts\Lavacharts;


class RangosDecisionController extends Controller
{
    public function store(Request $request, $idMedicion)
    {
    	$cantidad_rangos= $request->input('cant_rangos');
        
        /*$out = new \Symfony\Component\Console\Output\ConsoleOutput();        
        $out->writeln("Hello from Terminal  ".$cantidad_rangos);*/

    	for($i=0; $i < $cantidad_rangos; $i++)
    	{
    		$rango_desicion= new RangoDecision();
    		$rango_desicion->valoracion= $request->input('valoracion_'.($i+1));    		
    		$rango_desicion->descripcion=$request->input('descripcion_'.($i+1));
    		$rango_desicion->valorMinimo=$request->input('min_'.($i+1));
    		$rango_desicion->valorMaximo=$request->input('max_'.($i+1));    		
    		$rango_desicion->color=$request->input('color_'.($i+1));
            $rango_desicion->orden= $i+1;
            $rango_desicion->idMedicion= $idMedicion;
    		
    		$rango_desicion->save();   	
    	}

    	$indicadores_elementales= IndicadorElemental::idMedicion($idMedicion)->get();

    	$indicadores_derivados= IndicadorDerivado::idMedicion($idMedicion)->get();

        $rangos= RangoDecision::idMedicion($idMedicion)->orderBy('orden','asc')->get();

        //Gráficos
        /*$ie_adecu = DB::table('indicadores_elementales')
                                    ->where('idMedicion', $idMedicion)
                                    ->whereBetween('idIEReferencia', array(1, 2))->get();

        $ie_adecuacion  = \Lava::DataTable(); //$lava->DataTable();

        $ie_adecuacion->addStringColumn('Indicadores Elementales')
              ->addNumberColumn('nivel')
              ->addRow(['%IF',  $ie_adecu[0]->valor])
              ->addRow(['%EE',  $ie_adecu[1]->valor]);

        $graph_ade= \Lava::BarChart('ie_adecuacion', $ie_adecuacion); 


        $ie_efi = DB::table('indicadores_elementales')
                                    ->where('idMedicion', $idMedicion)
                                    ->whereBetween('idIEReferencia', array(3, 4))->get();

        $ie_eficiencia  = \Lava::DataTable(); //$lava->DataTable();

        $ie_adecuacion->addStringColumn('Indicadores Elementales')
              ->addNumberColumn('nivel')
              ->addRow(['%TMR',  $ie_adecu[0]->valor])
              ->addRow(['%OEM',  $ie_adecu[1]->valor]);

        $graph_efi= \Lava::BarChart('ie_eficiencia', $ie_eficiencia); */

        //Gráficos  ***************************************************************/  
        //Rangos
        $rangos= RangoDecision::idMedicion($idMedicion)->orderBy('orden')->get();
        $cantidad_rangos= count($rangos);


        $ie_adecu = \DB::table('indicadores_elementales')
                                    ->where('idMedicion', $idMedicion)
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
        //return $colores_ad;

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

        /**************************************************************************/ 

               
    	return view('informe')->with('idMedicion', $idMedicion)->with('indicadores_elementales', $indicadores_elementales)->with('indicadores_derivados', $indicadores_derivados)->with('cantidad_rangos', $cantidad_rangos);
    }

    public function show($idMedicion)
    {
    	return view('rangosDecision')->with('idMedicion', $idMedicion);
    }
}
