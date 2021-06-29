<?php

namespace App\Http\Requests\Categoria;

use Illuminate\Foundation\Http\FormRequest;

class CreateCategoriaRequest extends FormRequest
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
            'nome' 	    => 'required|unique:categoria,nome',
            'descricao' => 'required|min:10|max:255',
        ];
    }

    public function messages()
    {
        return [
            'name.required'      => 'O campo nome é obrigatório.',
            'name.unique'        => 'Nome já existe.',
            'descricao.required' => 'O campo descrição é obrigatório.',
        ];
    }
}
