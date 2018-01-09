<?php

namespace SGS\Http\Controllers;

use Illuminate\Http\Request;
use SGS\Http\Requests;
use SGS\Categoria;
use Illuminate\Support\Facades\Redirect;
use SGS\Http\Requests\CategoriaFormRequest;
use DB;

class CategoriaController extends Controller
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
            $categorias=DB::table('categoria')->where('nombre','LIKE','%'.$query.'%')
            ->where ('condicion','=','1')
            ->orderBy('idcategoria','desc')
            ->paginate(7);
          
            return view('catalogo.categoria.index',["categorias"=>$categorias,"searchText"=>$query]);
        }
    }

 public function create()
    {
    	return view ("catalogo.categoria.create");
    }

   public function store(CategoriaFormRequest $request)
    {
    	$categoria=new Categoria;
    	$categoria->nombre=$request->get('nombre');
    	$categoria->descripcion=$request->get('descripcion');
    	$categoria->condicion='1';
    	$categoria->save();
    	return Redirect::to('catalogo/categoria');
    }

    public function show($id)
    {	
    	return view ("catalogo.categoria.show",["categoria"=>Categoria::findOrFail($id)]);
    }

   public function edit($id)
    {
    	return view ("catalogo.categoria.edit",["categoria"=>Categoria::findOrFail($id)]);
    }


  public function update(CategoriaFormRequest $request, $id)
    {
    	$categoria=Categoria::findOrFail($id);
    	$categoria->nombre=$request->get('nombre');
        $categoria->descripcion=$request->get('descripcion');
        $categoria->update();
        return Redirect::to('catalogo/categoria');
    }

   public function destroy($id)
    {
    	$categoria=Categoria::findOrFail($id);
    	$categoria->condicion='0';
    	$categoria->update();
    	return Redirect::to('catalogo/categoria');
    }

}

