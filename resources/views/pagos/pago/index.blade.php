@extends ('layouts.admin')
@section ('contenido')

<div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<h3>Listado de Pagos <a href="pago/create"><button
		class="btn btn-success">Nuevo</button></a></h3> 
		@include('pagos.pago.search')

	</div>
</div>

<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive">
			<table class="table table-striped table-bordered table-condensed table-hover">
				<thead>
					<th>Fecha</th>
					<th>Periodo</th>
					<th>Comprobante</th>	
					<th>Pagos</th>
					<th>Estado</th>
					<th>Opciones</th>					
				</thead>
		
				@foreach($pagos as $pag)

				<tr>
					<td>{{ $pag->fecha_documento}}</td>
					<td>{{ $pag->serie}}</td>
					<td>{{ $pag->num_comprobante}}</td>
					<td>{{ $pag->Pago}}</td>
					<td>{{ $pag->estado}}</td>

					<td>
						<a href="{{URL::action('PagoController@show',$pag->idpago_encabezado)}}"><button class="btn btn-primary">Detalles</button></a>
						<a href="" data-target="#modal-delete-{{$pag->idpago_encabezado}}" data-toggle="modal"><button class="btn btn-danger">Anular</button></a>
					</td>
				</tr>
				@include('pagos.pago.modal')
				@endforeach
			</table>
		</div>
		{{$pagos->render()}}
	</div>	
</div>	
@endsection

