<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ArticuloRequest extends FormRequest
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
            'titulo'        => 'min:8|max:120|required|unique:articulos',
            'categoria_id'  => 'required',
            'contenido'     => 'min:20|max:720|required',
            'imagen'        => 'image|required',
            'video'         => 'required',
            'descripcion'   => 'min:20|max:200|required',
            
        ];
    }
}
