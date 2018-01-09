@extends ('layouts.admin')
@section ('contenido')

<div class="row">
 	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
 	<h3>Editar Plataforma :{{ $beneficiario->descripcion}} </h3>
 	
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

{!! Form:: model($beneficiario,['method'=>'PATCH','route'=>['plataforma.update',$beneficiario->idbeneficiario]])!!}

	{{ Form::token()}}

 <div class="row">
   <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
	<div class="form-group">
			<label for="descripcion">Nombre Plataforma</label>
			<input type="text" name="descripcion" required value="{{$beneficiario->descripcion}}" class="form-control" placeholder="Nombre plataforma ...">
		</div>
	</div>


   <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
		<div class="form-group">
			<label for="clase">Clase</label>
			
			<select name="clase" class="form-control" >
				@if($beneficiario->clase=='Privado') 
					<option value="Privado" selected>Privado</option>
					<option value="Tokens">Tokens</option>
					<option Value="Mixta">Mixta</option>
				@elseif($beneficiario->clase=='Tokens') 
				    <option value="Privado">Privado</option>
					<option value="Tokens" selected >Tokens</option>
					<option Value="Mixta">Mixta</option>	
				@else
				    <option value="Privado">Privado</option>
					<option value="Tokens"  >Tokens</option>
					<option Value="Mixta" selected>Mixta</option>	
				@endif		
			</select>
		
		</div>	
	</div>


	 <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
		<div class="form-group">
			<label for="valor">Valor</label>
			<input type="number" name="valor" step="any" required value="{{$beneficiario->valor}}" class="form-control" placeholder="Valor del token o pago ...">
	    </div>	
	</div>

   <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
	<div class="form-group">
			<label for="telefono">Télefono</label>
			<input type="text" name="telefono" required value="{{$beneficiario->telefono}}" class="form-control" placeholder="Télefono ...">
		</div>
	</div>


   <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
	<div class="form-group">
			<label for="email">Email</label>
			<input type="text" name="email" required value="{{$beneficiario->email}}" class="form-control" placeholder="Email ...">
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