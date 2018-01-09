<?php

namespace SGS;

use Illuminate\Database\Eloquent\Model;

class Venta extends Model
{
    protected $table='venta';
 
    protected $primaryKey ='idventa';

    public $timestamps=false;

  
    protected $fillable =[
    	'idbeneficiario',
    	'tipo_comprobante',
    	'serie_comprobante',
        'num_comprobante',
    	'fecha_hora',
    	'total_venta',
    	'estado'    	

    ];

    protected $guarded = [
  
    ];
}
