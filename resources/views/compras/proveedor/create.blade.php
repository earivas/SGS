@extends ('layouts.admin')
@section ('contenido')

<div class="row">
 	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
 	<h3>Nueva Proveedor</h3>
 	
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

{!! Form::open(array('url'=>'compras/proveedor','method'=>'POST','autocomplete'=>'off')) !!}
{{ Form::token()}}
  <div class="row">
    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
		<div class="form-group">
			<label for="descripcion">Nombre Proveedor</label>
			<input type="text" name="descripcion" required value="{{old('descripcion')}}" class="form-control" placeholder="Nombre proveedor ...">
		</div>
	</div>

    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
		<div class="form-group">

			<label for="tipo_documento">Tipo Documento</label>
			<select name="tipo_documento" class="form-control" >
				<option value ="">---Seleccione tipo documento---</option>
				<option value="Pagina">Página</option>
				<option value="Cedula">Cédula</option>
				<option Value="Nit">Nit</option>
				<option Value="Pasaporte">Pasaporte</option>
			</select>
		</div>	

	</div>

    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
		<div class="form-group">

			<label for="num_documento">NÚmero Documento</label>
			<input type="text" name="num_documento" required value="{{old('num_documento')}}" class="form-control" placeholder="Numero de documento ...">
		</div>

	</div>


    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
		<div class="form-group">
			<label for="direccion">Dirección</label>
			<input type="text" name="direccion" required value="{{old('direccion')}}" class="form-control" placeholder="Dirección ...">
		</div>

	</div>

    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">

		<div class="form-group">
			<label for="telefono">Télefono</label>
			<input type="text" name="telefono" required value="{{old('telefono')}}" class="form-control" placeholder="Télefono ...">
		</div>	

	</div>

    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
		<div class="form-group">
			<label for="email">Email</label>
			<input type="text" name="email" required value="{{old('email')}}" class="form-control" placeholder="Email ...">
		</div>

	</div>


    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
	 <div class="form-group">
		<button class="btn btn-primary" type="submit">Guardar</button>
		<button class="btn btn-danger" type="reset">Cancelar</button>
	</div>
</div>


</div>

{!! Form::close()!!}

@endsection 