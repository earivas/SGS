@extends ('layouts.admin')
@section ('contenido')

<div class="row">
 	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
 	<h3>Editar Proveedor :{{ $beneficiario->descripcion}} </h3>
 	
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

{!! Form:: model($beneficiario,['method'=>'PATCH','route'=>['proveedor.update',$beneficiario->idbeneficiario]])!!}

	{{ Form::token()}}

 <div class="row">
   <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
	<div class="form-group">
			<label for="descripcion">Nombre Proveedor</label>
			<input type="text" name="descripcion" required value="{{$beneficiario->descripcion}}" class="form-control" placeholder="Nombre proveedor ...">
		</div>
	</div>

   <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
		<div class="form-group">
			<label for="tipo_beneficiario">Tipo Beneficiario</label>
			
			<select name="tipo_beneficiario" class="form-control" >
				@if($beneficiario->tipo_beneficiario=='Plataforma') 
					<option value="Plataforma" selected>Plataforma</option>
					<option value="Cliente">Cliente</option>
					<option Value="Proveedor">Proveedor</option>
				@elseif($beneficiario->tipo_beneficiario=='Cliente') 
				    <option value="Plataforma">Plataforma</option>
					<option value="Cliente" selected >Cliente</option>
					<option Value="Proveedor">Proveedor</option>	
				@else
				    <option value="Plataforma">Plataforma</option>
					<option value="Cliente"  >Cliente</option>
					<option Value="Proveedor" selected>Proveedor</option>	
				@endif		
			</select>
		
		</div>	
	</div>

   <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
	<div class="form-group">
			<label for="tipo_documento">Tipo Documento</label>
				<select name="tipo_documento" class="form-control" >
					@if($beneficiario->tipo_documento=='Pagina') 
						<option value="Pagina" selected>Página</option>
						<option value="Cedula">Cédula</option>
						<option Value="Nit">Nit</option>
						<option Value="Pasaporte">Pasaporte</option>
					@elseif($beneficiario->tipo_documento=='Cedula')
						<option value="Pagina">Página</option>
						<option value="Cedula" selected>Cédula</option>
						<option Value="Nit">Nit</option>
						<option Value="Pasaporte">Pasaporte</option>		
					@elseif($beneficiario->tipo_documento=='Nit')
                        <option value="Pagina">Página</option>
						<option value="Cedula" >Cédula</option>
						<option Value="Nit" selected>Nit</option>
						<option Value="Pasaporte">Pasaporte</option>			
					@else
					    <option value="Pagina">Página</option>
						<option value="Cedula" >Cédula</option>
						<option Value="Nit" >Nit</option>
						<option Value="Pasaporte" selected>Pasaporte</option>	
					@endif 
				</select>
		</div>
	</div>

   <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
	<div class="form-group">
			<label for="num_documento">Tipo Documento</label>
			<input type="text" name="num_documento" required value="{{$beneficiario->num_documento}}" class="form-control" placeholder="Número documento ...">
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
			<label for="direccion">Dirección</label>
			<input type="text" name="direccion" required value="{{$beneficiario->direccion}}" class="form-control" placeholder="Dirección ...">
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