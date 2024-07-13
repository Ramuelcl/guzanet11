<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class userRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
                $rules = [
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'password' => 'nullable|string|min:8'
                ->when($this->password, [
                    'required',
                    Password::min(8)
                        ->letters()
                        ->numbers()
                        ->symbols(),
                    'confirmed',
                ]),
            'profile_photo_path' => 'nullable|file|image|max:2048',
            'is_active' => 'required|boolean',
        ];

        if ($this->method() === 'POST') {
            // Es una creación de usuario
            $rules['email'] .= '|unique:users,email';
            $rules['password'] .= '|required';
        } else {
            // Es una edición de usuario
            $rules['email'] .= '|unique:users,email,'.$this->userId; // Excluir el usuario actual de la validación de unicidad
        }

        return $rules;

    }
public function attributes()
    {
        return [
            'name' => 'Nombre completo',
            'email' => 'Correo electrónico',
            'password' => 'Contraseña',
'profile_photo_path'=>__('photo'),
        ];
    }

    public function messages()
    {
        return [
            'required.attributes.name' => 'El campo :attribute es obligatorio.',
            'string.attributes.name' => 'El campo :attribute debe ser una cadena de texto.',
            'min.attributes.name' => 'El campo :attribute debe tener al menos 3 caracteres.',
            'max.attributes.name' => 'El campo :attribute debe tener como máximo 255 caracteres.',
            // ... mensajes personalizados para otros campos y reglas
        ];
    }
}
