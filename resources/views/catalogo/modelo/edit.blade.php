@extends ('layouts.admin')
@section ('contenido')

<div class="row">
 	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
 	<h3>Editar Modelo :{{ $modelo->nick}} </h3>
 	
 	@if (count($errors)>0)
 	<div class="alert alert-danger">
 		<ul>
 	    @foreach ($errors->all() as $error)
 	    	<li>{{$error}}</li>
        @endforeach
 		</ul>	
 	</div>
	@endif
 </div>
</div>

{!! Form:: model($modelo,['method'=>'PATCH','route'=>['modelo.update',$modelo->idmodelo],'files'=>'true'])!!}

	{{ Form::token()}}


<div class="row">
	
	<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
		<div class="form-group">
			<label for="cedula">Cédula</label>
			<input type="text" name="cedula" required value="{{$modelo->cedula}}" class="form-control">
		</div>
   </div>

	<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
		<div class="form-group">
			<label for="nick">NickName</label>
			<input type="text" name="nick" required value="{{$modelo->nick}}" class="form-control">
		</div>	
   </div>

	<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
		<div class="form-group">
			<label for="nombre">Nombre</label>
			<input type="text" name="nombre" required value="{{$modelo->nombre}}" class="form-control">
		</div>	
   </div>

 	<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
		<div class="form-group">
			<label for="apellido">Apellido</label>
			<input type="text" name="apellido" required value="{{$modelo->apellido}}" class="form-control">
		</div>	
   </div>

<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
		<div class="form-group">
			<label for="direccion">Dirección</label>
			<input type="text" name="direccion" required value="{{$modelo->direccion}}" class="form-control">
		</div>	
  </div>

  	<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
		<div class="form-group">
			<label>Ciudad</label>
			<select name="idciudad" class="form-control">
				 @foreach ($ciudad as $ciu)
				  @if ($ciu->idciudad==$modelo->idciudad)
					  <option value="{{$ciu->idciudad}}" selected>{{$ciu->descripcion}}</option>
				  @else
					  <option value="{{$ciu->idciudad}}">{{$ciu->descripcion}}</option> 
				  @endif
				 @endforeach
			</select>
		</div>	
   </div>


 	<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
		<div class="form-group">
			<label for="telefono">Teléfono</label>
			<input type="text" name="telefono" required value="{{$modelo->telefono}}" class="form-control">
		</div>	
   </div>

 	<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
		<div class="form-group">
			<label for="email">Email</label>
			<input type="email" name="email" required value="{{$modelo->email}}" class="form-control">
		</div>	
   </div>

 	<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
		<div class="form-group">
			<label for="fechanacimiento">Fecha Nacimiento</label>
			<input type="date" name="fechanacimiento" required value="{{$modelo->fechanacimiento}}" class="form-control">
		</div>	
   </div>

 	<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
		<div class="form-group">
			<label for="fechaingreso">Fecha Ingreso</label>
			<input type="date" name="fechaingreso" required value="{{$modelo->fechaingreso}}" class="form-control">
		</div>	
   </div>


	<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
		<div class="form-group">
			<label>Categoría</label>
			<select name="idcategoria" class="form-control">
				 @foreach ($categoria as $cat)
				   @if ($cat->idcategoria==$modelo->idcategoria)
					 <option value="{{$cat->idcategoria}}" selected>{{$cat->nombre}}</option>
				   @else
				     <option value="{{$cat->idcategoria}}">{{$cat->nombre}}</option>
				   @endif 
				 @endforeach
			</select>
		</div>	
   </div> 

	<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
		<div class="form-group">
			<label for="imagen">Imagen</label>
			<input type="file" name="imagen" class="form-control">
			  @if(($modelo->imagen)!="")
			   <img src="{{asset('imagenes/modelos/'.$modelo->imagen)}}" height="300px" width="300px">
			  @endif
		</div>	
   </div>

<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
	<div class="form-group">
		<button class="btn btn-primary" type="submit">Guardar</button>
		<button class="btn btn-danger" type="reset">Cancelar</button>
	</div>
</div>

	{!! Form::close()!!}

@endsection 