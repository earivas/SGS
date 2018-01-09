<?php

namespace SGS\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PagoFormRequest extends FormRequest
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
        'tipo_comprobante'=>'required',,
        'num_comprobante'=>'required|max:10',
        'idperiodoliquidacion'=>'required',
        'fecha_documento'=>'required',
        'total_pago'=>'required'

        ];
    }
}

