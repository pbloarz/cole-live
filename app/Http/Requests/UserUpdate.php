<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UserUpdate extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name'  => ['required','min:8','string'],
            'email' => "required|unique:users,email,{$this->selected_id}",
            'role'  => 'required|not_in:Elegir'
        ];
    }

    public function messages()
    {
        return[
            'name.required' => 'Nombre requerido',
            'name.min' => 'Caracteres insuficientes',
            'email.required' => 'Email requerido',
            'email.unique' => 'Este email ya existe',
            'email.email' => 'No es un email',
            'role.required' => 'Rol requerido',
            'role.not_in' => 'Rol debe ser diferente de Eligir',

        ];
    }
}
