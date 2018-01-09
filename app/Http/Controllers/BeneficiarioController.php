<?php

namespace SGS\Http\Controllers;

use Illuminate\Http\Request;
use SGS\Beneficiario;
use SGS\Http\Requests;
use Illuminate\Support\Facades\Redirect;
use SGS\Http\Requests\BeneficiarioFormRequest;
use DB;
class BeneficiarioController extends Controller
{
  
   public function __construct()
    {
        $this->middleware('auth');
    }

    
    public function index(Request $request)
    
    {
        if ($request)
        {
            $query=trim($request->get('searchText'));
            $beneficiarios=DB::table('beneficiario')
            ->where('descripcion','LIKE','%'.$query.'%')
            ->where ('tipo_beneficiario','=','Cliente')
            ->where ('estado','=','Activa')
            ->orwhere('clase','LIKE','%'.$query.'%')
            ->where ('tipo_beneficiario','=','Cliente')
            ->where ('estado','=','Activa')
            ->orderBy('idbeneficiario','desc')
            ->paginate(7);
          
            return view('ventas.beneficiario.index',["beneficiarios"=>$beneficiarios,"searchText"=>$query]);
        }
    }

 public function create()
    {
    	return view ("ventas.beneficiario.create");
    }

   public function store(BeneficiarioFormRequest $request)
    {
    	$beneficiario=new Beneficiario;
    	$beneficiario->descripcion=$request->get('descripcion');
    //	$beneficiario->clase=$request->get('clase');
    //	$beneficiario->valor=$request->get('valor');
        $beneficiario->tipo_documento=$request->get('tipo_documento');
        $beneficiario->num_documento=$request->get('num_documento');       
        $beneficiario->direccion=$request->get('direccion');
        $beneficiario->telefono=$request->get('telefono');   
        $beneficiario->email=$request->get('email');
        $beneficiario->tipo_beneficiario='Cliente';	
        $beneficiario->estado='Activa';
        $beneficiario->save();
    	return Redirect::to('ventas/beneficiario');
    }

    public function show($id)
    {	
    	return view ("ventas.beneficiario.show",["beneficiario"=>Beneficiario::findOrFail($id)]);
    }

   public function edit($id)
    {
    	return view ("ventas.beneficiario.edit",["beneficiario"=>Beneficiario::findOrFail($id)]);
    }


  public function update(BeneficiarioFormRequest $request, $id)
    {
    	$beneficiario=Beneficiario::findOrFail($id);
        $beneficiario->descripcion=$request->get('descripcion');
        //implementar el foreach y el if
       // $beneficiario->clase=$request->get('clase');
       // $beneficiario->valor=$request->get('valor');
        $beneficiario->tipo_documento=$request->get('tipo_documento');
        $beneficiario->num_documento=$request->get('num_documento');       
        $beneficiario->direccion=$request->get('direccion');
        $beneficiario->telefono=$request->get('telefono');   
        $beneficiario->email=$request->get('email');
        $beneficiario->tipo_beneficiario=$request->get('tipo_beneficiario');
        $beneficiario->update();
        return Redirect::to('ventas/beneficiario');
    }

   public function destroy($id)
    {
    	$beneficiario=beneficiario::findOrFail($id);
	    $beneficiario->estado='Inactivo';
    	$beneficiario->update();
    	return Redirect::to('ventas/beneficiario');
    }


public function obtenerPrecio(BeneficiarioFormRequest $request, $id)
    {
        $precio=Beneficiario::findOrFail($id);
        $precio->valor=$request->get('valor');
        $precio->update();
        return Redirect::to('ventas/beneficiario');
    }


}
