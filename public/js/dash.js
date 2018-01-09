Morris.Line({
  // ID of the element in which to draw the chart.
  element: 'myfirstchart',
  // Chart data records -- each entry in this array corresponds to a point on
  // the chart.
  data: [
  // @foreach($ventasplataforma as $vta)
  //   { Plataforma: '{{$vta->descripcion}}', Value: '{{$vta->Total}}'}
  //  @endforeach
  { year: '2008', value: 20, value2:32 },
  { year: '2009', value: 10 , value2:5},
   { year: '2010', value: 5, value2:11 },
   { year: '2011', value: 5 , value2:3},
  { year: '2012', value: 20 , value2:15}
  ],
  // The name of the data record attribute that contains x-values.
  xkey: 'year',
  // A list of names of data record attributes that contain y-values.
  ykeys: ['value', 'value2'],
  lineWidth:1,
  // Labels for the ykeys -- will be displayed when you hover over the
  // chart.
  labels: ['CB46','MFC'],

  resize:true,

  lineColors:['#C14D9F','#2CB4AC','#2CB4AC']

});

new Morris.Area({
  element: 'graficaClientes',
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
  lineWidth:1,
});

new Morris.Donut({
  element: 'Cumplimiento',
  data: [
    {value: 70, label: 'foo'},
    {value: 15, label: 'bar'},
    {value: 10, label: 'baz'},
    {value: 5, label: 'A really really long label'}
  ],
  formatter: function (x) { return x + "%"}
}).on('click', function(i, row){
  console.log(i, row);
});

// Use Morris.Bar
new Morris.Bar({
  element: 'comparativa',
  data: [
    {x: '2011 Q1', y: 3, z: 2, a: 3},
    {x: '2011 Q2', y: 2, z: null, a: 1},
    {x: '2011 Q3', y: 0, z: 2, a: 4},
    {x: '2011 Q4', y: 2, z: 4, a: 3}
  ],
  xkey: 'x',
  ykeys: ['y', 'z', 'a'],
  labels: ['Y', 'Z', 'A'],
  barColors:['#C14D9F','#2CB4AC','#2CB4AC'],
  stacked: true
});