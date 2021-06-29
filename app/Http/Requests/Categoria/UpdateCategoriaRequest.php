<?php

namespace App\Http\Requests\Categoria;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCategoriaRequest extends FormRequest
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

    public function rules()
    {
        return [
            'nome' 	    => 'required',
            'descricao' => 'required|min:10|max:255',
        ];
    }

    public function messages()
    {
        return [
            'name.required'      => 'O campo nome é obrigatório.',
            'descricao.required' => 'O campo descrição é obrigatório.',
        ];
    }
}
