@extends ('layouts.admin')
@section ('contenido')

 <div class="row">
 	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
 		<h3>Listado de Proveedor <a href="proveedor/create"><button class="btn btn-success">Nuevo</button></a></h3>
		@include('compras.proveedor.search')
	 </div> 	
 </div> 

<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive">
			<table class="table table-striped table-bordered table-condensed table-hover">
				<thead>
					<th>Id</th>
					<th>Descripción</th>
					<th>Tipo Beneficiario</th>
					<th>Tipo Dcto</th>
					<th>Nro. Dcto</th>  
					<th>Clase</th>
					<th>Valor</th>  
					<th>Dirección</th>  
					<th>Télefono</th> 
					<th>Email</th>  
					<th>Estado</th>  
					<th>Opciones</th> 
				</thead>

 			   @foreach ($beneficiarios as $ben)
				<tr>
					<td>{{ $ben->idbeneficiario}}</td>
					<td>{{ $ben->descripcion}}</td>
					<td>{{ $ben->tipo_beneficiario}}</td>
					<td>{{ $ben->tipo_documento}}</td>
					<td>{{ $ben->num_documento}}</td>
					<td>{{ $ben->clase}}</td>
					<td>{{ $ben->valor}}</td>	
					<td>{{ $ben->direccion}}</td>
					<td>{{ $ben->telefono}}</td>	
					<td>{{ $ben->email}}</td>	
					<td>{{ $ben->estado}}</td>				
					<td>
						<a href="{{URL::action('ProveedorController@edit',$ben->idbeneficiario)}}"><button class="btn btn-info">Editar</button></a>
                        <a href="" data-target="#modal-delete-{{$ben->idbeneficiario}}" data-toggle="modal"><button class="btn btn-danger">Eliminar</button></a>
					</td>
				</tr>
			  @include('compras.proveedor.modal')
			  @endforeach		
			</table>
		</div> 
		{{ $beneficiarios->render()}}
	 </div> 
</div> 
@endsection