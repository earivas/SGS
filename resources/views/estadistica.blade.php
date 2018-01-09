@extends ('layouts.admin')
@section ('contenido')
<!DOCTYPE doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title> Grafica de Lineas</title>
        <!-- Fonts 
        <link href="{{asset('css/app.css')}}" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.3/css/bootstrap-select.min.css">
-->
    </head>
    <body>
        <h1>
            Estadísticas
        </h1>
        <div class="row">


            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                <div class="info-box bg-aqua">
                    <span class="info-box-icon">
                        <i class="fa fa-thumbs-o-up">
                        </i>
                    </span>
                    <div class="info-box-content">
                        <span class="info-box-text">
                            Venta mes Actual 
                        </span>
                        <span class="info-box-number">
                            {{number_format($ventasperiodoact->TotalAct,2) }}
                        </span>
                        <!-- The progress section is optional -->
                        <div class="progress">
                            <div class="progress-bar" style="width: 100%">
                            </div>
                        </div>
                        <span class="progress-description">
                            Mes Anterior :  {{number_format($ventasperiodoant->TotalAnt,2) }}
                        </span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>

            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                <div class="info-box bg-orange">
                    <span class="info-box-icon">
                        <i class="fa fa-star-o">
                        </i>
                    </span>
                    <div class="info-box-content">
                        <span class="info-box-text">
                            Tokens mes Actual
                        </span>
                        <span class="info-box-number">
                            {{number_format($ventasperiodoact->CantidadAct,0) }}
                        </span>
                        <!-- The progress section is optional -->
                        <div class="progress">
                            <div class="progress-bar" style="width: 100%">
                            </div>
                        </div>
                        <span class="progress-description">
                             Mes Anterior :  {{number_format($ventasperiodoant->CantidadAnt,0) }}
                        </span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>

            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                <div class="info-box bg-blue">
                    <span class="info-box-icon">
                        <i class="fa fa-bookmark-o">
                        </i>
                    </span>
                    <div class="info-box-content">
                        <span class="info-box-text">
                            Presupuesto
                        </span>
                        <span class="info-box-number">
                           <!-- {{number_format($ventasperiodoact->TotalAct,2) }} -->
                           3,200
                        </span>
                        <!-- The progress section is optional -->
                        <div class="progress">
                            <div class="progress-bar" style="width: {{number_format($ventasperiodoact->TotalAct/3200*100,2) .'%' }} ">
                            </div>
                        </div>
                        <span class="progress-description">
                            Cumpl. Presupuesto :  {{number_format($ventasperiodoact->TotalAct/3200*100,2) .'%' }}   <!--Reemplazar datos para ppto -->
                        </span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>


<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                <div class="info-box bg-darken-3">
                    <span class="info-box-icon">
                        <i class="fa fa-flag-o">
                        </i>
                    </span>
                    <div class="info-box-content">
                        <span class="info-box-text">
                            TRM 
                        </span>
                        <span class="info-box-number" disabled>
                            <script src="https://www.dolar-colombia.com/widget.js?t=1&c=1"></script>
                        </span>
                        <!-- The progress section is optional -->
                        <div class="progress">
                            <div class="progress-bar" style="width: 0%">
                            </div>
                        </div>
                        <span class="progress-description">
                            Dólar Colombia hoy
                        </span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box --> 
            </div>

        </div>
        <div class="container">
            <hr>
                <div class="row">
                    <div class="col-md-6">
                        <h2>
                           Ventas Por Plataforma
                        </h2>
                        <hr>
                            <div id="barras">
                            </div>
                        </hr>
                    </div>
                    <div class="col-md-6">
                        <h2>
                            Ventas por día (Mes Actual)
                        </h2>
                        <hr>
                            <div id="lineas">
                            </div>
                        </hr>
                    </div>
                    <div class="col-md-6">
                        <h2>
                            Grafica Area
                        </h2>
                        <hr>
                            <div id="area">
                            </div>
                        </hr>
                    </div>
                    <div class="col-md-6">
                        <h2>
                            Análisis por Modelo
                        </h2>
                        <hr>
                            <div id="Donut">
                              
                            </div>
                        </hr>
                    </div>

                    <!-- 
                    <script charset="utf-8" src="dash.js">
                    </script>
       
                    <Script para graficas de morris
 
                -->

                    <!--Fin scripts graficas -->
                </div>
            </hr>
        </div>

<!--
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.3/js/bootstrap-select.min.js" charset="utf-8"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.6.0/Chart.bundle.js" charset="utf-8"></script>
-->
     <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">
		 <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
		 <script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
		 <script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>
         <script>
        

 Morris.Bar({
  // ID of the element in which to draw the chart.
  element: 'barras',
  // Chart data records -- each entry in this array corresponds to a point on
  // the chart.
  data: [
     @foreach($ventasplataforma as $vta)
     { Plataforma: '{{$vta->descripcion}}', Value: '{{$vta->Total}}'},
     @endforeach
  ],
  // The name of the data record attribute that contains x-values.
  xkey: 'Plataforma',
  // A list of names of data record attributes that contain y-values.
  ykeys: ['Value'],
  lineWidth:1,
  // Labels for the ykeys -- will be displayed when you hover over the
  // chart.
  labels: ['Venta'],
  goals: [50.0, 50.0],
  goalLineColors:['#2CB4AC'],
  resize:true,

  barColors:['#C14D9F','#2CB4AC','#01579B']

});

Morris.Line({
  // ID of the element in which to draw the chart.
  element: 'lineas',
  // Chart data records -- each entry in this array corresponds to a point on
  // the chart.
  data: [
   @foreach($ventasperiodo as $vtaper)
   // { Plataforma: '{{$vtaper->Dia}}', Value: '{{$vtaper->Total}}'}
   { day: '{{$vtaper->Dia}}', Value: '{{$vtaper->Total}}', Value2: '{{$vtaper->Cantidad}}'},
   @endforeach
  //{ year: '2008', value: 20, value2:32 },
  //{ year: '2009', value: 10 , value2:5},
  //{ year: '2010', value: 5, value2:11 },
  //{ year: '2011', value: 5 , value2:3},
  //{ year: '2012', value: 20 , value2:15}
  ],
  // The name of the data record attribute that contains x-values.
  xkey: 'day',
  // A list of names of data record attributes that contain y-values.
  ykeys: ['Value','Value2'],
  //lineWidth:1,
  // Labels for the ykeys -- will be displayed when you hover over the
  // chart.
  labels: ['Venta','Cantidad'],
  xLabels:'day',  // etiquetas de mes en el eje x
  resize:true,
  lineWidth:1,
  parseTime:false, // Muestra el mes sin anyo
 // pointFillColors:['#01579B'],
 //pointStrokeColors :['#01579B'], 

  lineColors:['#2CB4AC','#C14D9F']

});

new Morris.Area({
  element: 'area',
  behaveLikeLine: true,
  data: [
    {x: '2011 Q1', y: 3, z: 3},
    {x: '2011 Q2', y: 2, z: 1},
    {x: '2011 Q3', y: 2, z: 4},
    {x: '2011 Q4', y: 3, z: 3}
  ],
  xkey: 'x',
  ykeys: ['y', 'z'],
  labels: ['Y', 'Z'],
  lineColors:['#C14D9F','#2CB4AC','#2CB4AC'],
  resize:true,
  lineWidth:1,
});

new Morris.Donut({
  element: 'Donut',
  data: [
  @foreach($ventasmodelo as $vtamod)
      { value: '{{$vtamod->Total}}', label: '{{$vtamod->nombre}}'},
   @endforeach
   // {value: 70, label: 'foo'},
   // {value: 15, label: 'bar'},
   // {value: 10, label: 'baz'},
   // {value: 5, label: 'A really really long label'}
  ],
   colors:['#2CB4AC','#C14D9F'],
   resize:true,
 //** formatter: function (x) { return x + "%"}
//**  }).on('click', function(i, row){
//**    console.log(i, row);
});



</script>




    </body>

</html>
 @endsection