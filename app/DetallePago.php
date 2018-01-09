<?php

namespace SGSVentas;

use Illuminate\Database\Eloquent\Model;

class DetalleVenta extends Model
{
    protected $table='pago_detalle';

    protected $primaryKey='idpago_detalle';
    public $timestamps=false;

    protected $fillable =[
     'idpago_encabezado',
     'idconcepto',
     'idmodelo',
     'cant_tokens',
     'valor_tokens',
     'tasa_cambio',
     'trm',
     'porc_liquidacion',

    ];
    protected $guarded =[
    ];
}
