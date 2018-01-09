@extends ('layouts.admin')
@section ('contenido')

<div class="row">
 	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
 	<h3>Nueva Venta</h3>
 	
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

{!! Form::open(array('url'=>'ventas/venta','method'=>'POST','autocomplete'=>'off')) !!}
{{ Form::token()}}
  <div class="row">
    <div class="col-lg-10 col-md-10 col-sm-10 col-xs-12">
		<div class="form-group">
			<label for="plataforma">Plataforma</label>
			<select name="idbeneficiario" id="idbeneficiario" class="form-control selectpicker" data-live-search="true">
			<option disabled="disabled" selected="selected">---Seleccione la Plataforma---</option>	
			@foreach($beneficiarios as $beneficiario)
				<option value="{{$beneficiario->idbeneficiario}}">{{$beneficiario->descripcion}}</option>
			@endforeach
			</select>
		</div>
	</div>

    <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
		<div class="form-group">
			<label for="fecha_hora">Fecha Venta</label>
			<input type="date" name="fecha_hora" id="fecha_ingreso" required value="{{old('fecha_hora')}}" class="form-control">
		</div>
	</div>

	 <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
	 	<div class="form-group">
	 		<label>Tipo Comprobante</label>
	 		<select name="tipo_comprobante" class="form-control">
	 			<option disabled="disabled" selected="selected">---Seleccione el tipo---</option>
	 			<option value="Venta">Venta</option>
	 			<option value="Bonificacion">Bonificación</option>
	 			<option value="Concurso">Concurso</option>
	 		</select>
	 	</div>
	 </div>

 	<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
 		<div class="form-group">
 			<label for="serie_comprobante">Serie Comprobante</label>
 			<input type="text" id ="numserie" name="serie_comprobante" readonly value="{{old('serie_comprobante')}}" class="form-control" placeholder="Serie Comprobante...">
 		</div>			
	</div>

 	<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
 		<div class="form-group">
 			<label for="num_comprobante">Número Comprobante</label>
 			<input type="text" name="num_comprobante"  id="consecutivo" readonly value="{{old('num_comprobante')}}" class="form-control" placeholder="Numero Comprobante...">
 		</div>			
	</div>
</div>

<div class="row">
	<div class="panel panel-primary">
		<div class="panel-body">
			<div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
				<div class="form-group">
					<label>Tipo Ingreso</label>
				 		<select name="ptipo_ingreso" id="ptipo_ingreso" class="form-control" onchange="asignarValores();">
				 			<option disabled="disabled" selected="selected">---Seleccione el tipo---</option>
				 			<option value="Token">Token</option>
				 			<option value="USD">USD</option>
				 			<option value="Premio">Premio</option>
				 		</select>
				</div>
			</div>	

			<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
				<div class="form-group">
					<label>Modelo</label>
						<select name="pidmodelo" id="pidmodelo" class="form-control selectpicker" data-live-search="true">
						<option disabled="disabled" onchange="deshabilita()" selected="selected">---Seleccione Modelo---</option>
						@foreach($modelos as $modelo)
							<option value="{{$modelo->idmodelo}}">{{$modelo->modelo}}</option>
						@endforeach
						</select>
				</div>
			</div>	

			<div class="col-lg-1 col-md-1 col-sm-1 col-xs-12">
				<div class="form-group">
					<label for="cant">Cantidad</label>
 					<input type="number" name="pcant" id="pcant" onkeyup="deshabilita()" class="form-control" placeholder="Cantidad...">
				</div>	
			</div>


			<div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
				<div class="form-group">
					<label for="valor" >Valor</label>
 					<input type="number" name="pvalor" id="pvalor" onkeyup="deshabilita()" class="form-control" placeholder="Valor...">
				</div>	
			</div>


			<div class="col-lg-1 col-md-1 col-sm-1 col-xs-12">
				<div class="form-group">
					<label for="tasa_cambio">TRM</label>
 					<input type="number" name="ptasa_cambio" id="ptasa_cambio" onkeyup="deshabilita()" class="form-control" placeholder="TRM del dia...">
				</div>	
			</div>

			<div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
				<div class="form-group">
					<br>
					<button type="button" id="bt_add" name ="adicionadetalle" class="btn btn-primary" disabled>Agregar</button>
				</div>	
			</div>

			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<table id="detalles" class="table table-striped table-bordered table-condensed table-hover">
					<thead style="background-color: #A9D0F5">
						<th>Opciones</th>
						<th>Tipo Ingreso</th>
						<th>Modelo</th>
						<th>Cantidad</th>	
						<th>Valor</th>
						<th>TRM</th>
						<th>Subtotal</th>
					</thead>	
					<tfoot>
						<th>TOTAL</th>
						<th></th>
						<th></th>
						<th></th>
						<th></th>	
						<th></th>
						<th><h4 id="total">US$ 0.00</h4><input type="hidden" name ="total_venta" id="total_venta"></th>
					</tfoot>
					<tbody>
					</tbody>
				</table>
			</div>		
		</div>
	</div>

	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12" id="guardar">
			<div class="form-group">
				<input name="_token" value ="{{ csrf_token() }}" type="hidden"></input>
				<button class="btn btn-primary" type="submit" onclick="limpiarValor()">Guardar</button>
				<button class="btn btn-danger" type="reset">Cancelar</button>
			</div>	
		</div>
</div>

{!!Form::close()!!}

@push('scripts')


<script>

//Descativas boton Agregar hasta que todos los campos esten diligenciados

function deshabilita()
{
	if((pidmodelo.value!="") && (ptipo_ingreso.value!="") && (pcant.value!="") && (pvalor.value!="")  && (ptasa_cambio.value!=""))
	
	{bt_add.disabled = false;}
    else
    	{bt_add.disabled = true;}
}		



function limpiarValor()
{
	$('#pvalor').val("");
	$('#ptasa_cambio').val("");
}
//numero de compromabre
//obtiene el ultimo numero + 1 de los comprobantes de venta

// ****** ToDo : Agregar consecutivo por tipo de comprobante ****

var nuevocomprobante = "{{$numcomprobante}}";
var num = nuevocomprobante.replace(/['"{}&quotnmer;[:]+/g, '') // elimina caracatenes no imprimibles 
var num = num.slice(0, -1); // elimina el ultimo caracter ( ] )
//num  = ("0000000000" +  num).slice(-10);  // adiciona 0 al inicio del numero
//var numero_consecutivo = number(num);

if(num>0)
{
	$("#consecutivo").val(num); 
}
else
{
  $("#consecutivo").val(1); 
}


 //$('#fecha_ingreso').on('change',function(e){

 //})

// calcular el nro de serie del comprobante
$(document).ready(function(){
	$('#fecha_ingreso').on('change',function(e){
		
  $fecha = $("#fecha_ingreso").val();
  $const  =  [2,1,7,6,5,4,3]; 
  // Constantes para el calculo del primer dia de la primera semana del año
   

  if ($fecha.match(/\//)){
    $fecha   =  $fecha.replace(/\//g,"-",$fecha);
  };
  // Con lo anterior permitimos que la fecha pasada a la funcion este
  // separada por "/" al remplazarlas por "-" mediante .replace y el uso
  // de expresiones regulares
      
  $fecha  =  $fecha.split("-");
  // Partimos la fecha en trozos para obtener dia, mes y año por separado

  $ano    =  eval($fecha[0]);   
  $mes    =  eval($fecha[1]);
  $dia    =  eval($fecha[2]);
  $mesSerie  =  eval($fecha[1]);


  if ($mes!=0) {
    $mes--;
  };
  // Convertimos el mes a formato javascript 0=enero
  
  $dia_pri   =  new Date($ano,0,1); 
  
  $dia_pri   =  $dia_pri.getDay();
  // Obtenemos el dia de la semana del 1 de enero
  $dia_pri   =  eval($const[$dia_pri]);
  // Obtenemos el valor de la constante correspondiente al día
  $tiempo0   =  new Date($ano,0,$dia_pri);
  // Establecemos la fecha del primer dia de la semana del año
  $dia       =  ($dia+$dia_pri);
  // Sumamos el valor de la constante a la fecha ingresada para mantener 
  // los lapsos de tiempo
  $tiempo1   =  new Date($ano,$mes,$dia);
  // Obtenemos la fecha con la que operaremos
  $lapso     =  ($tiempo1 - $tiempo0)
  // Restamos ambas fechas y obtenemos una marca de tiempo
  $semanas   =  Math.floor($lapso/1000/60/60/24/7);
  // Dividimos la marca de tiempo para obtener el numero de semanas
   
  if ($dia_pri == 1) {
    $semanas++;
  };
  // Si el 1 de enero es lunes le sumamos 1 a la semana caso contrarios el
  // calculo nos daria 0 y nos presentaria la semana como semana 52 del 
  // año anterior
  
   //
  
  if ($semanas == 0) {
    $semanas=52;
    $ano--;
  };
  // Establecemos que si el resultado de semanas es 0 lo cambie a 52 y 
  // reste 1 al año esto funciona para todos los años en donde el 1 de 
  // Enero no es Lunes
   
  if ($ano < 10) {
    $ano = '0'+$ano;
  };
  // Por pura estetica establecemos que si el año es menor de 10, aumente 
  // un 0 por delante, esto para aquellos que ingresen formato de fecha
  // corto dd/mm/yy

// adicionar "0" delante de la semana y mes
  $semanas   = ("0" +  $semanas).slice(-2); 
  $mesSerie  = ("0" +  $mesSerie).slice(-2);

  serie= ($ano+"-"+ $mesSerie+"-"+$semanas);
   $("#numserie").val(serie);
 // $("#numserie").prop('disabled',true);	
  //alert($semanas+" - "+$ano);
  // Con esta sentencia arrojamos el resultado. Esta ultima linea puede ser
  // cambiada a gusto y conveniencia del lector 

	});
});


// busqueda de precio de token por pagina
  $('#idbeneficiario').on('change',function(e){
    console.log(e);
    var ben_id = e.target.value;
    //ajax
    $.get('/ajax-precio?ben_id=' + ben_id, function(data){
   
    //success data
     console.log(data);
     $('#pvalor').empty();
     $.each(data, function(index, precioObj){
     	$('#pvalor').val(precioObj.valor);

     });

  });	

  });	


function obtenerPrecio()
{

  var precio = document.getElemenById("idbeneficiario");
  var opcion = precio.selectedIndex;  
}


$(document).ready(function(){
	$('#bt_add').click(function(){

		agregar();
	});
});

    var cont=0;
	total=0;
	subtotal=[];
	$("#guardar").hide();

//	$("#pidmodelo").charge(mostrarValores);		

  function asignarValores()
  {

  	var tipo = $("#ptipo_ingreso").val();
   
  	if(tipo=="Token")
  	{

  	//	TRAER ESTE VALOR DEL CAMPO VALOR DEL BENEFICIARIO
     //   $("#pvalor").val(0.05);
	    $("#pcant").val(0);
	  	$("#pcant").prop('disabled',false);
  	}
  	else
  	{

	  	 $("#pcant").val(0);
	  	// $("#pvalor").val(0);
	  	 $("#pcant").prop('disabled',true);	
  	}
  	
  }

function mostrarValores()
{
	datosModelos=document.getElemenById('pidmodelo').value.split('_');
	$("#pprecio").val(datosModelos[2]);	
	$("#pstock").val(datosModelos[1]);	
}


function agregar()
{

	//tipo_ingreso=$("#ptipo_ingreso").val();
	tipo_ingreso=$("#ptipo_ingreso option:selected").text();
	idmodelo=$("#pidmodelo").val();
    modelo=$("#pidmodelo option:selected").text();
	cant=$("#pcant").val();
	valor=$("#pvalor").val();
	tasa_cambio=$("#ptasa_cambio").val();


if(idmodelo!=null && cant>=0 && valor>0  && tipo_ingreso!=null)	
{

	//if(idmodelo!="" && cant!="" && cant>0 && valor!="" && valor>0 )
//	if(idmodelo!="" && cant!="" && valor!="" && valor>0 )
  
   if(valor>0 && cant>=0)
	{
        tip_ing = tipo_ingreso=$("#ptipo_ingreso option:selected").text();
        qty = cant;

		if(tip_ing!="Token")
		  {  
		     qty = 1;
		  }
		else
		  {
            subtotal[cont]=(cant*valor);
		   //  alert("subtotal" .subtotal[cont]);
		  }
  
            //subtotal[cont]=(cant*valor);
           subtotal[cont]=(qty*valor);
		   total=total+subtotal[cont];
 
		var fila= '<tr class="selected" id="fila'+cont+'"><td><button type="button" class="btn btn-warning" onclick="eliminar('+cont+');">X</button></td><td><input type="hidden" name="tipo_ingreso[]" value="'+tipo_ingreso+'">'+tipo_ingreso+'</td><td><input type="hidden" name="idmodelo[]" value="'+idmodelo+'">'+modelo+'</td><td><input type="number" name="cant[]" value="'+cant+'"></td><td><input type="number" name="valor[]" value="'+valor+'"></td><td><input type="number" name="tasa_cambio[]" value="'+tasa_cambio+'"></td><td>'+subtotal[cont]+'</td></tr>';

		cont++;
		limpiar();
		$("#total").html("US$ " + total);
		$("#total_venta").val(total);
		evaluar();
		$('#detalles').append(fila);

	}
	else
	{

		alert("Error al ingresar el detalle de ventas, revise los datos por favor");
	}

}

else
{
	alert("Por favor diligencie todos los campos");
}

}

	function limpiar()
	{
		$("#pcant").val("");
		//$("#pvalor").val("");
		//$("#ptasa_cambio").val("");			
	}


  function evaluar()
  {
  	if(total>0)
  	{
  		$("#guardar").show();
  	}
  	else
  	{
  		$("#guardar").hide();	
  	}
  }

 function eliminar(index)
 {
 	total=total-subtotal[index];
 	$("#total").html("$ " + total);
 	$("#total_venta").val(total);
  	$("#fila" + index).remove();
  	evaluar();	
}


</script>
@endpush

@endsection
