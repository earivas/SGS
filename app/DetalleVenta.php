<?php

namespace SGS;

use Illuminate\Database\Eloquent\Model;

class DetalleVenta extends Model
{
    protected $table='detalle_venta';

    protected $primaryKey='iddetalle_venta';
    public $timestamps=false;

    protected $fillable =[
     'idventa',
     'idmodelo',
     'tipo_ingreso',
     'cant',
     'valor',
     'tasa_cambio',
     'status'
    ];
    protected $guarded =[
    ];
}
