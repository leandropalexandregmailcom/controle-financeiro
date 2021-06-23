<?php

namespace App\Http\Requests\TipoFinanca;

use Illuminate\Foundation\Http\FormRequest;

class UpdateTipoFinancaRequest extends FormRequest
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
            'nome' 	    => 'required|unique:tipo_financa,nome',
            'descricao' => 'required|min:10|max:255',
        ];
    }

    public function messages()
    {
        return [
            'name.required'      => 'O campo nome é obrigatório.',
            'name.min'           => 'Minímo de 10 caractéres.',
            'name.max'           => 'Máximo de 255 caractéres.',
            'descrição.required' => 'O campo descrição é obrigatório.',
        ];
    }
}
