<?php

namespace SGS;

use Illuminate\Database\Eloquent\Model;

class Periodo extends Model
{
    protected $table='periodoliquidacion';

    protected $primaryKey ='idperiodoliquidacion';

    public $timestamps=false;

  
    protected $fillable =[
    	'serie',
    	'ano',
    	'fechainicial',
    	'fechafinal',
    	'estado'
    	
    ];

    protected $guarded = [
    ];

}

