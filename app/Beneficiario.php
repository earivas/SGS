<?php

namespace SGS;

use Illuminate\Database\Eloquent\Model;

class beneficiario extends Model
{
    protected $table='beneficiario';

    protected $primaryKey ='idbeneficiario';

    public $timestamps=false;

  
    protected $fillable =[
    	 'descripcion',
    	 'valor',
    	 'clase',
    	 'estado',
         'tipo_documento',
         'num_documento',
         'direccion',
         'telefono',
         'email',
         'tipo_beneficiario'
    ];

    protected $guarded = [
    ];

}
