<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
            'name'  => 'required|min:200',
            'email' => 'required|unique:user|email',
            'password'  => 'required|min:8',
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
            'password.required' => 'Contraseña requerida',
            'password.min' => 'la contraseña debe tener como mínimo 8 caracteres',
            'role.required' => 'Rol requerido',
            'role.not_in' => 'Rol debe ser diferente de Eligir',

        ];
    }
}
