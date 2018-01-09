@extends ('layouts.admin')
@section ('contenido')

<div class="row">
	 <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
	 	<div class="form-group">
	 		<label for="plataforma">Plataforma</label>
	 		<p>{{$venta->descripcion}}</p>
	 	</div>
	 </div>	

	 <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
	 	<div class="form-group">
	 		<label>Fecha</label>
	 		<p>{{$venta->fecha_hora}}</p>
	 	</div>
	 </div>	


	 <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
	 	<div class="form-group">
	 		<label>Tipo Comprobante</label>
	 		<p>{{$venta->tipo_comprobante}}</p>
	 	</div>
	 </div>	


	 <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
	 	<div class="form-group">
	 		<label >Serie Comprobante</label>
	 		<p>{{$venta->serie_comprobante}}</p>
	 	</div>
	 </div>	

	 <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
	 	<div class="form-group">
	 		<label>Numero Comprobante</label>
	 		<p>{{$venta->num_comprobante}}</p>
	 	</div>
	 </div>	
</div>

<div class="row">
	<div class="panel panel-primary">
		<div class="panel-body">
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<table id="detalles" class="table table-striped table-bordered table-condensed table-hover">
					<thead style="background-color: #A9D0F5">
						<th>Modelo</th>
						<th>Cantidad</th>
						<th>Valor</th>
						<th>TRM</th>
						<th>Subtotal</th>
					</thead>
					<tfoot>
						<th>TOTAL COMPROBANTE</th>
						<th></th>
						<th></th>
						<th></th>	
						<th><h4 id="total">{{number_format($venta->total_venta,2)}}</h4></th>
					</tfoot>
					<tbody>
						@foreach($detalles as $det)
						<tr>
							<td>{{$det->nombre.' '.$det->apellido}}</td>
							<td>{{number_format($det->cant,0)}}</td>
							<td>{{number_format($det->valor,2)}}</td>
							<td>{{number_format($det->tasa_cambio,2)}}</td>
							<td>{{number_format($det->valor_venta,2)}}</td>	
						<!--	<td>{{number_format($det->cant*$det->valor,2)}}</td> -->
						</tr>
						@endforeach
					</tbody>
				</table>
			</div>	
		</div>
	</div>
	
</div>

@endsection	