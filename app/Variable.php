<?php

namespace SGS;

use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    protected $table='variable';

    protected $primaryKey ='idvariable';

    public $timestamps=false;

  
    protected $fillable =[
    	'precio_token',
    	'porcentaje_modelo',
    	'porcentaje_multa'
    	
    ];

    protected $guarded = [
    ];

}

