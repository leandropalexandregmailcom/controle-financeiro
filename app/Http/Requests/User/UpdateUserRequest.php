<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function rules()
    {
        return [
            'email' 	    => 'required|regex:/^[\S]+$/',
            'name' 		    => 'required|min:2',
            'date_of_birth' => 'required|date'
        ];
    }

    public function messages()
    {
        return [
            'name.required'         => 'O campo nome é obrigatório.',
            'email.required'        => 'O campo email é obrigatório.',
            'type.required'         => 'O campo type é obrigatório.',
            'email.regex'           => 'Email inválido.',
            'email.unique'          => 'Email inválido.',
            'date_of_birth.required'=> 'O campo data de nascimento é obrigatório.',
            'date_of_birth.date'    => 'O campo data de nascimento deve ser enviado em formato de data.'
        ];
    }
}
