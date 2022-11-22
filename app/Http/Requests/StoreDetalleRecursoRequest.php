<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreDetalleRecursoRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            "cantidad" => 'required',
            "recurso" => 'required'
        ];
    }
    public function messages()
    {
        return [
            "cantidad.required" => 'El campo Cantidad es obligatorio',
            "recurso.required" => 'Debe escoger un recurso'
        ];
    }
}
