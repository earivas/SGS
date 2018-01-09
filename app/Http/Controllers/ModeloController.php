<?php

namespace SGS\Http\Controllers;

use Illuminate\Http\Request;
use SGS\Http\Requests;
use SGS\Modelo;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use SGS\Http\Requests\ModeloFormRequest;
use DB;

class ModeloController extends Controller
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
            $modelos=DB::table('modelo as m')
            ->join ('categoria as c','m.idcategoria','=','c.idcategoria')
            ->join ('ciudad as u','m.idciudad','=','u.idciudad')
            ->select
               ('m.idmodelo',
               	'm.cedula',
		    	'm.nombre',
		    	'm.apellido',
		        'm.nick',
		    	'm.direccion',
		    	'm.idciudad',
		    	'm.telefono',    	
		    	'm.email',
		    	'm.fechaingreso',
		    	'm.fechanacimiento',
		    	'm.idcategoria',
		    	'm.estado',
		    	'm.imagen',
		    	'u.descripcion as ciudad',
		    	'c.nombre as categoria'
            )
            ->where('m.nombre','LIKE','%'.$query.'%')
            ->orwhere('m.apellido','LIKE','%'.$query.'%')
            ->orwhere('m.nick','LIKE','%'.$query.'%')
             ->orderBy('m.idmodelo','desc')
            ->paginate(7);
          
            return view('catalogo.modelo.index',["modelos"=>$modelos,"searchText"=>$query]);
        }
    }

 public function create()
    {
    	$categorias=DB::table('categoria')->where ('condicion','=','1')->get();
    	$ciudades=DB::table('ciudad')->get();
    	
    	return view ("catalogo.modelo.create",["categorias"=>$categorias,"ciudades"=>$ciudades]);
    	//return view("catalogo.modelo.create", compact($categorias,$ciudades))
    }

   public function store(ModeloFormRequest $request)
    {
    	$modelo=new Modelo;
    	$modelo->cedula=$request->get('cedula');
    	$modelo->nombre=$request->get('nombre');
    	$modelo->apellido=$request->get('apellido');
    	$modelo->fechanacimiento=$request->get('fechanacimiento');    	
    	$modelo->nick=$request->get('nick');
    	$modelo->direccion=$request->get('direccion');
    	$modelo->idciudad=$request->get('idciudad');
    	$modelo->telefono=$request->get('telefono');
    	$modelo->email=$request->get('email');
    	$modelo->fechaingreso=$request->get('fechaingreso');
		$modelo->idcategoria=$request->get('idcategoria');
    	$modelo->estado='Activo';

    	if(Input::hasfile('imagen'))
    		{
    		 $file=Input::file('imagen');
    		 $file->move(public_path().'/imagenes/modelos/',$file->getClientOriginalName());
    		 $modelo->imagen=$file->getClientOriginalName();
    		}
    	$modelo->save();
    	return Redirect::to('catalogo/modelo');
    }

    public function show($id)
    {	
    	return view ("catalogo.modelo.show",["Modelo"=>Modelo::findOrFail($id)]);
    }

   public function edit($id)
    {
    	$modelo=Modelo::findOrFail($id);
    	$categorias=DB::table('categoria')->where ('condicion','=','1')->get();
    	$ciudades=DB::table('ciudad')->get();
    	return view ("catalogo.modelo.edit",["modelo"=>$modelo, "categoria"=>$categorias,"ciudad"=>$ciudades]);
    }


  public function update(ModeloFormRequest $request, $id)
    {
    	$modelo=Modelo::findOrFail($id);
    	$categorias=DB::table('categoria')->where ('condicion','=','1')->get();
    	$ciudades=DB::table('ciudad')->get();

        $modelo->cedula=$request->get('cedula');
    	$modelo->nombre=$request->get('nombre');
    	$modelo->apellido=$request->get('apellido');
    	$modelo->fechanacimiento=$request->get('fechanacimiento');    	
    	$modelo->nick=$request->get('nick');
    	$modelo->direccion=$request->get('direccion');
    	$modelo->idciudad=$request->get('idciudad');
    	$modelo->telefono=$request->get('telefono');
    	$modelo->email=$request->get('email');
    	$modelo->fechaingreso=$request->get('fechaingreso');
		$modelo->idcategoria=$request->get('idcategoria');
		if(Input::hasfile('imagen'))
    		{
    		 $file=Input::file('imagen');
    		 $file->move(public_path().'/imagenes/modelos/',$file->getClientOriginalName());
    		 $modelo->imagen=$file->getClientOriginalName();
    		}

        $modelo->update();
        return Redirect::to('catalogo/modelo');
    }

   public function destroy($id)
    {
    	$modelo=Modelo::findOrFail($id);
    	$modelo->estado='Inactivo';
    	$modelo->update();
    	return Redirect::to('catalogo/modelo');
    }
}
