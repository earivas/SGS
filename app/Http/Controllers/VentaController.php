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


class VentaController extends Controller
{
 public function _construct()
 {
          $this->middleware('auth');
 }   //

 public function index (Request $request)
 {
 	if($request)
 	{

 		$query=trim($request->get('searchText'));

 		$ventas=DB::table('venta as v')
 		->join('beneficiario as b', 'v.idbeneficiario','=','b.idbeneficiario')
 		->join('detalle_venta as dv', 'v.idventa','=','dv.idventa')
 		->join('modelo as md', 'dv.idmodelo','=','md.idmodelo')
 		->select('v.idventa','v.fecha_hora','b.descripcion','v.tipo_comprobante','v.serie_comprobante','v.num_comprobante','v.estado','v.total_venta',DB::raw('SUM(dv.cant) as cant'), 'md.nombre',  'md.apellido')
 		->where('v.num_comprobante','LIKE','%'.$query.'%')
 		->orwhere('md.apellido','LIKE','%'.$query.'%')
        ->orwhere('md.nombre','LIKE','%'.$query.'%')
        ->orwhere('b.descripcion','LIKE','%'.$query.'%')
 		->orderBy ('v.idventa','desc')
 		->groupBy ('v.idventa','v.estado','v.fecha_hora','b.descripcion','v.tipo_comprobante','v.serie_comprobante','v.num_comprobante')
 		->paginate(15);
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

 	 $numcomprobante=DB::table('venta')
 	->select (DB::raw('MAX(num_comprobante)+1 as numero'))
 	->where('tipo_comprobante','=','Venta')	
 	//->groupBy('tipo_comprobante') 
 	->get();	

	return view('ventas.venta.create',["beneficiarios"=>$beneficiarios,"modelos"=>$modelos,"numcomprobante"=>$numcomprobante]);

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
			$detalle->status='P'; // O=OPEN C=CLOSED
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
		->select('m.nombre as modelo','dv.tipo_ingreso','dv.cant','dv.valor','dv.tasa_cambio','dv.status', 'm.nombre','m.apellido',
            DB::raw('(CASE WHEN dv.tipo_ingreso="Token" THEN dv.cant*dv.valor ELSE dv.valor END) as valor_venta'))
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





