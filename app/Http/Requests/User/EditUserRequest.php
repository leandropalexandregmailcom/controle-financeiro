<?php

namespace App\Http\Requests\User;

use Illuminate\Http\Request;
use Illuminate\Foundation\Http\FormRequest;

class EditUserRequest extends FormRequest
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
    public function rules(Request $request)
    {
        return [
            'id' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'id.required' => 'O campo id é obrigatório.',
        ];
    }
}
