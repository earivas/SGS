<?php

namespace SGSVentas;

use Illuminate\Database\Eloquent\Model;

class Venta extends Model
{
    protected $table='pago_encabezado';
 
    protected $primaryKey ='idpago_encabezado';

    public $timestamps=false;

  
    protected $fillable =[
    	'tipo_comprobante',
        'num_comprobante',
    	'idperiodoliquidacion',
    	'fecha_documento',
        'total_pago',
    	'estado'  

    ];

    protected $guarded = [
  
    ];
}
