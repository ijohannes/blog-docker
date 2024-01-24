<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProgramaRequest extends FormRequest
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
            'titulo'        => 'min:8|max:120|required|unique:programas',
            'categoria_id'  => 'required',
            'contenido'     => 'min:20|max:720|required',
            'descripcion'   => 'min:20|max:200|required',
            'video'         => 'required',
            'imagen'        => 'image|required',
    
        ];
    }
}
