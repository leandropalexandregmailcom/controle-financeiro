<?php

namespace App\Http\Requests\Despesa;

use Illuminate\Foundation\Http\FormRequest;

class EditDespesaRequest extends FormRequest
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
            'id' => 'required|integer|min:1',
        ];
    }

    public function messages()
    {
        return [
            'id.required'      => 'O campo id é obrigatório.',
        ];
    }
}
