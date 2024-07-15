<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class userRequest extends FormRequest
{
    public $nmeMin = config("guzanet.nmeMin", 6);
    public $nmeMax = config("guzanet.nmeMax", 255);
    public $emlMin = config("guzanet.emlMin", 6);
    public $emlMax = config("guzanet.emlMax", 255);
    public $pswMin = config("guzanet.pswMin", 6);
    public $pswMax = config("guzanet.pswMax", 255);
    public $pswLet = config("guzanet.pswLet", 0);
    public $pswNum = config("guzanet.pswNum", 0);
    public $pswSim = config("guzanet.pswSim", 0);
    public $pswRgx = config("guzanet.pswRgx", 0); // 0=false, 1=false

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
            "name" => "required|string|min:$this->nmeMin|max:$this->nmeMax",
            "email" => "required|email|min:$this->emlMin|min:$this->emlMin",
            "password" => "", // "required|string|min:$this->pswMin|max:$this->pswMax",
            "password_confirmation" => "required|same:password",
            "profile_photo_path" => "nullable|file|image|max:2048",
            "is_active" => "required|boolean",
        ];

        // Apply conditional rules for password
        $rules["password"] = $rules["password"]->when($this->password, function ($rules) {
            return $rules
                ->required()
                ->min($this->pswMin)
                ->min($this->pswMax)
                ->letters($this->pswLet)
                ->numbers($this->pswNum)
                ->symbols($this->pswSim)
                ->confirmed();
        });

        if ($this->method() === "POST") {
            // Es una creación de usuario
            $rules["email"] .= "|unique:users,email";
            $rules["password"] .= "|required";
        } else {
            // Es una edición de usuario
            $rules["email"] .= "|unique:users,email,$this->userId"; // Excluir el usuario actual de la validación de unicidad
        }

        return $rules;
    }

    public function attributes()
    {
        return [
            "name" => __("Name"),
            "email" => __("eMail"),
            "password" => __("Password"),
            "profile_photo_path" => __("Photo"),
            "is_active" => __("Active"),
        ];
    }

    public function messages()
    {
        return [
            // Name
            "required.attributes.name" => "El campo :attribute es obligatorio.",
            "string.attributes.name" => "El campo :attribute debe ser una cadena de texto.",
            "min.attributes.name" => "El campo :attribute debe tener al menos :min caracteres.",
            "max.attributes.name" => "El campo :attribute debe tener como máximo :max caracteres.",

            // Email
            "required.attributes.email" => "El campo :attribute es obligatorio.",
            "email.attributes.email" => "El campo :attribute debe ser un correo electrónico válido.",
            "min.attributes.email" => "El campo :attribute debe tener al menos :min caracteres.",
            "unique.attributes.email" => "El correo electrónico :attribute ya está en uso.",

            // Password
            "required.attributes.password" => "El campo :attribute es obligatorio.",
            "min.attributes.password" => "El campo :attribute debe tener al menos :min caracteres.",
            "confirmed.attributes.password" => "Las contraseñas no coinciden.",

            // Profile Photo
            "file.attributes.profile_photo_path" => "El campo :attribute debe ser un archivo.",
            "image.attributes.profile_photo_path" => "El campo :attribute debe ser una imagen.",
            "max.attributes.profile_photo_path" => "El campo :attribute no puede superar los :max KB.",

            // Is Active
            "required.attributes.is_active" => "El campo :attribute es obligatorio.",
            "boolean.attributes.is_active" => "El campo :attribute debe ser un valor booleano (verdadero o falso).",
        ];
    }
}
