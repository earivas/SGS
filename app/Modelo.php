<?php

namespace SGS;

use Illuminate\Database\Eloquent\Model;

class Modelo extends Model
{
    protected $table='modelo';
 
    protected $primaryKey ='idmodelo';

    public $timestamps=false;

  
    protected $fillable =[
    	'cedula',
    	'nombre',
    	'apellido',
        'nick',
    	'direccion',
    	'idciudad',
    	'telefono',    	
    	'email',
    	'fechaingreso',
    	'fechanacimiento',
    	'idcategoria',
    	'estado',
    	'imagen'

    ];

    protected $guarded = [
  
    ];
}
