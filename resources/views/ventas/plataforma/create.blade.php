@extends ('layouts.admin')
@section ('contenido')

<div class="row">
 	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
 	<h3>Nueva Plataforma</h3>
 	
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

{!! Form::open(array('url'=>'ventas/plataforma','method'=>'POST','autocomplete'=>'off')) !!}
{{ Form::token()}}
  <div class="row">
    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
		<div class="form-group">
			<label for="descripcion">Nombre Plataforma</label>
			<input type="text" name="descripcion" required value="{{old('descripcion')}}" class="form-control" placeholder="Nombre plataforma ...">
		</div>
	</div>




    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
		<div class="form-group">

			<label for="clase">Clase</label>
			<select name="clase" class="form-control" >
				<option value ="">---Seleccione la clase---</option>
				<option value="Privado">Privado</option>
				<option value="Tokens">Tokens</option>
				<option Value="Mixta">Mixta</option>
			</select>
		</div>	

	</div>

    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
		<div class="form-group">

			<label for="valor">Valor</label>
			<input type="number" name="valor" step="any" required value="{{old('valor')}}" class="form-control" placeholder="Valor del token o pago ...">
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