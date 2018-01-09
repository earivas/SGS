@extends ('layouts.admin')
@section ('contenido')

 <div class="row">
 	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
 	<h3>Listado de Modelos <a href="modelo/create"><button class="btn btn-success">Nuevo</button></a></h3>
		@include('catalogo.modelo.search')
	 </div> 	
 </div> 

<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive">
			<table class="table table-striped table-bordered table-condensed table-hover">
				<thead>
					<th>Id</th>
					<th>cedula</th>
					<th>Nombres</th>
					<th>Apellidos</th>
					<th>NickName</th>					
					<th>Email</th>
					<th>Ciudad</th>
					<th>Categoria</th>	
					<th>Estado</th>	
					<th>Imagen</th>	
					<th>Opciones</th>	    
				</thead>

 			 @foreach ($modelos as $mod)
				<tr>
					<td>{{ $mod->idmodelo}}</td>
					<td>{{ $mod->cedula}}</td>
					<td>{{ $mod->nombre}}</td>
					<td>{{ $mod->apellido}}</td>
					<td>{{ $mod->nick}}</td>
					<td>{{ $mod->email}}</td>
					<td>{{ $mod->ciudad}}</td>
					<td>{{ $mod->categoria}}</td>
					<td>{{ $mod->estado}}</td>					
					<td>
						<img src="{{ asset('imagenes/modelos/'.$mod->imagen)}}" alt="{{ $mod->nick}}" height="50px" width="50px" class="img-thumbnail">
					</td>	
					<td>
						<a href="{{URL::action('ModeloController@edit',$mod->idmodelo)}}"><button class="btn btn-info">Editar</button></a>
                        <a href="" data-target="#modal-delete-{{$mod->idmodelo}}" data-toggle="modal"><button class="btn btn-danger">Eliminar</button></a>
					</td>
				</tr>
			  @include('catalogo.modelo.modal')
			  @endforeach		
			</table>
		</div> 
		{{ $modelos->render()}}
	 </div> 
</div> 
@endsection