<?php

namespace SGS\Http\Controllers;

use Illuminate\Http\Request;
use SGS\Http\Requests;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use SGS\Http\Requests\VentaFormRequest;
use SGS\Venta;
use SGS\DetalleVenta;
use DB;

use Carbon\Carbon;
use Response;
use Illuminate\Support\Collection;


class EstadisticaController extends Controller
{
 public function _construct()
 {
          $this->middleware('auth');
 }   //


public function index()
{
	// Calcular el mes de la fecha actual
   
  
   $fechaActual = Carbon::now();
   $hoy= Carbon::now();
   
   $fechaAnterior = $fechaActual->subMonth();
   $fechaAnteriorToDate = date_parse_from_format("Y-m-d", $fechaAnterior);
   $MesAnterior= $fechaAnteriorToDate["month"];
   $AnyoCalculoAnterior= $fechaAnteriorToDate["year"];


   $fechaActualToDate = date_parse_from_format("Y-m-d",$hoy);
   $MesActual= $fechaActualToDate["month"]; 
   $AnyoCalculoActual= $fechaActualToDate["year"];
  
   $AnyoCalculo = date("Y",strtotime($fechaAnterior));

   //$mesAct = date("m");		

   $totventas=DB::table('venta as v')
   ->join('detalle_venta as dv', 'v.idventa','=','dv.idventa')
   ->select(DB::raw('SUM(dv.cant) as Cantidad'), DB::raw('(SUM(CASE WHEN dv.tipo_ingreso="Token" THEN dv.cant*dv.valor ELSE dv.valor END)) as Total'))
    ->where('v.estado','=','A')
   //**** ->whereMonth ('fecha_hora',$mesAct) 
   //->get();
   ->first();	     


   $ventasplataforma=DB::table('venta as v')
   ->join('detalle_venta as dv', 'v.idventa','=','dv.idventa')
   ->join('beneficiario as b', 'v.idbeneficiario','=','b.idbeneficiario')
   //->select(DB::raw('SUM(dv.cant) as Cantidad'), DB::raw('SUM(dv.valor*dv.cant) as Total'), DB::raw('YEAR(v.fecha_hora) as anyo' ))
  ->select('b.descripcion', DB::raw('SUM(dv.cant) as Cantidad'), DB::raw('(SUM(CASE WHEN dv.tipo_ingreso="Token" THEN dv.cant*dv.valor ELSE dv.valor END)) as Total'))
   ->where('b.tipo_beneficiario','=','Plataforma')
   ->where('v.estado','=','A')
   ->whereMonth('v.fecha_hora', $MesActual)
   ->whereYear('v.fecha_hora', $AnyoCalculoActual)
  // ->whereMonth ('fecha_hora',$mesAct) 
   ->groupBy('b.descripcion')
   ->get(); // devuelve un array se debe recorrer
  

  $ventasmodelo=DB::table('venta as v')
   ->join('detalle_venta as dv', 'v.idventa','=','dv.idventa')
   ->join('modelo as m', 'm.idmodelo','=','dv.idmodelo')
   //->select(DB::raw('SUM(dv.cant) as Cantidad'), DB::raw('SUM(dv.valor*dv.cant) as Total'), DB::raw('YEAR(v.fecha_hora) as anyo' ))
  ->select('m.nombre', DB::raw('SUM(dv.cant) as Cantidad'), DB::raw('(SUM(CASE WHEN dv.tipo_ingreso="Token" THEN dv.cant*dv.valor ELSE dv.valor END)) as Total'))
   ->where('v.estado','=','A')
   ->whereMonth('v.fecha_hora', $MesActual)
   ->whereYear('v.fecha_hora', $AnyoCalculoActual)
  // ->whereMonth ('fecha_hora',$mesAct) 
   ->groupBy('m.nombre')
   ->get(); // devuelve un array se debe recorrer
  



   $ventasperiodo=DB::table('venta as v')
   ->join('detalle_venta as dv', 'v.idventa','=','dv.idventa')
   ->join('beneficiario as b', 'v.idbeneficiario','=','b.idbeneficiario')
   //->select(DB::raw('SUM(dv.cant) as Cantidad'), DB::raw('SUM(dv.valor*dv.cant) as Total'), DB::raw('YEAR(v.fecha_hora) as anyo' ))
  ->select(DB::raw('SUM(dv.cant) as Cantidad'), DB::raw('(SUM(CASE WHEN dv.tipo_ingreso="Token" THEN dv.cant*dv.valor ELSE dv.valor END)) as Total'), DB::raw('MONTH(v.fecha_hora) as anyo' ),  DB::raw('DAY(v.fecha_hora) as Dia' ))
   ->where('b.tipo_beneficiario','=','Plataforma')
   ->where('v.estado','=','A')
   ->whereMonth('v.fecha_hora', $MesActual)
   ->whereYear('v.fecha_hora', $AnyoCalculoActual)
  // ->whereMonth ('fecha_hora',$mesAct) 
 //  ->groupBy('b.descripcion',DB::raw('YEAR(v.fecha_hora)'))
   ->groupBy(DB::raw('DAY(v.fecha_hora)'))
   ->get(); // devuelve un array se debe recorrer

  //DB::raw('(SUM(CASE WHEN dv.tipo_ingreso="Token" THEN dv.cant*dv.valor ELSE dv.valor END)) as Total')
   

   $ventasperiodoant=DB::table('venta as v')
   ->join('detalle_venta as dv', 'v.idventa','=','dv.idventa')
   ->select(DB::raw('SUM(dv.cant) as CantidadAnt'),DB::raw('(SUM(CASE WHEN dv.tipo_ingreso="Token" THEN dv.cant*dv.valor ELSE dv.valor END)) as TotalAnt'))
    ->where('v.estado','=','A')
    ->whereMonth('v.fecha_hora', $MesAnterior)
    ->whereYear('v.fecha_hora', $AnyoCalculoAnterior)
 //   ->where(DB::raw('YEAR(v.fecha_hora)','=', $AnyoCalculo))
   ->first();	


   $ventasperiodoact=DB::table('venta as v')
   ->join('detalle_venta as dv', 'v.idventa','=','dv.idventa')
   ->select(DB::raw('SUM(dv.cant) as CantidadAct'), DB::raw('(SUM(CASE WHEN dv.tipo_ingreso="Token" THEN dv.cant*dv.valor ELSE dv.valor END)) as TotalAct'))
    ->where('v.estado','=','A')
    ->whereMonth('v.fecha_hora', $MesActual)
    ->whereYear('v.fecha_hora', $AnyoCalculoActual)
   
 //   ->where(DB::raw('YEAR(v.fecha_hora)','=', $AnyoCalculo))
   ->first();	   


    return view("estadistica",["totventas"=>$totventas,"ventasplataforma"=>$ventasplataforma,"ventasperiodo"=>$ventasperiodo,"ventasperiodoant"=>$ventasperiodoant,"ventasperiodoact"=>$ventasperiodoact,"ventasmodelo"=>$ventasmodelo]);
}

 public function index_del (Request $request)
 {
 	if($request)
 	{

 		$query=trim($request->get('searchText'));

 		$ventas=DB::table('venta as v')
 		->join('beneficiario as b', 'v.idbeneficiario','=','b.idbeneficiario')
 		->join('detalle_venta as dv', 'v.idventa','=','dv.idventa')
 		->join('modelo as md', 'dv.idmodelo','=','md.idmodelo')
 		->select('v.idventa','v.fecha_hora','b.descripcion','v.tipo_comprobante','v.serie_comprobante','v.num_comprobante','v.estado','v.total_venta','dv.cant', 'md.nombre',  'md.apellido')
 		->where('v.num_comprobante','LIKE','%'.$query.'%')
 		->orwhere('md.apellido','LIKE','%'.$query.'%')
        ->orwhere('md.nombre','LIKE','%'.$query.'%')
        ->orwhere('b.descripcion','LIKE','%'.$query.'%')
 		->orderBy ('v.idventa','desc')
 		->groupBy ('v.idventa','v.estado','v.fecha_hora','b.descripcion','v.tipo_comprobante','v.serie_comprobante','v.num_comprobante')
 		->paginate(7);
 		return view('ventas.venta.index',["ventas"=>$ventas,"searchText"=>$query]);

 	}

 }

 public function create()
 {
 	$beneficiarios=DB::table('beneficiario')->where ('tipo_beneficiario','=','Plataforma')
 	->get();

 	$variables=DB::table('variable as vb')
 	->select (DB::raw('vb.precio_token','vb.porcentaje_modelo','vb.porcentaje_multa'))
 	->where('vb.estado','=','A')
 	->first();	


	$modelos=DB::table('modelo as mdl')
	->select (DB::raw('CONCAT(mdl.idmodelo, " " , mdl.nombre, " ", mdl.apellido) AS modelo'),
		'mdl.idmodelo')
	->where('mdl.estado','=','Activo')	
	->groupBy('modelo','mdl.idmodelo') 
	->get();
	return view('ventas.venta.create',["beneficiarios"=>$beneficiarios,"modelos"=>$modelos]);

 }

public function store(VentaFormRequest $request)
{

	try
	 {
		DB::beginTransaction();
		$venta=new Venta;
		$venta->idbeneficiario=$request->get('idbeneficiario');
		$venta->tipo_comprobante=$request->get('tipo_comprobante');
		$venta->serie_comprobante=$request->get('serie_comprobante');
		$venta->num_comprobante=$request->get('num_comprobante');
		$venta->total_venta=$request->get('total_venta');

		$mytime=Carbon::now('America/Bogota');
	//	$venta->fecha_hora=$mytime->toDateTimeString();
		$venta->fecha_hora=$request->get('fecha_hora');
		$venta->estado='A';
		$venta->save();

		
		$idmodelo=$request->get('idmodelo');
		$tipo_ingreso=$request->get('tipo_ingreso');
		$cant=$request->get('cant');
		$valor=$request->get('valor');
		$tasa_cambio=$request->get('tasa_cambio');
		//$status->'P';
		$cont=0;

		while($cont<count($idmodelo))
		{
			$detalle=new DetalleVenta();
			$detalle->idventa=$venta->idventa;
		    $detalle->tipo_ingreso=$tipo_ingreso[$cont];
			$detalle->idmodelo=$idmodelo[$cont];
			$detalle->cant=$cant[$cont];
			$detalle->valor=$valor[$cont];
			$detalle->tasa_cambio=$tasa_cambio[$cont];
			$detalle->status='P'; // P=PENDIENTE L=LIQUIDADO 
			$detalle->save();
			$cont=$cont+1;

		}	

		DB::commit();
	

	}
	 catch(\Exception $e)
	{
		DB::rollback();
	}
	return Redirect::to('ventas/venta');
}

public function show($id)
{
	$ventas=DB::table('venta as v')
		->join ('beneficiario as b','v.idbeneficiario','=','b.idbeneficiario' )
		->join ('detalle_venta as dv','v.idventa','=','dv.idventa')
		->select('v.idventa','v.fecha_hora','b.descripcion','v.tipo_comprobante','v.serie_comprobante','v.num_comprobante','v.estado','v.total_venta')
		->where ('v.idventa','=',$id)
		->first();

	$detalles=DB::table('detalle_venta as dv')
		->join ('modelo as m','dv.idmodelo','=','m.idmodelo' )
		->select('m.nombre as modelo','dv.tipo_ingreso','dv.cant','dv.valor','dv.tasa_cambio','dv.status', 'm.nombre','m.apellido')
		->where ('dv.idventa','=',$id)
		->get();

		return view('ventas.venta.show',["venta"=>$ventas,"detalles"=>$detalles]);

}
	public function destroy($id)
	{
		$venta=Venta::findOrFail($id);
		$venta->estado='C';
		$venta->update();
		return Redirect::to('ventas/venta');
	}			

}





