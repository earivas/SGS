<?php

namespace SGS\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ModeloFormRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            
            'idcategoria'=>'required',
            'cedula'=>'required|max:20',
            'nombre'=>'required|max:45',
            'apellido'=>'required|max:45',
            'nick'=>'required|max:45',
            'direccion'=>'required|max:100',
            'idciudad'=>'required|numeric',
            'telefono'=>'required|max:45',    
            'email'=>'required|max:45',
            'fechaingreso'=>'required|date',
            'fechanacimiento'=>'required|max:45',
            'imagen'=>'mimes:jpeg,bmp,png'
        ];
    }
}
