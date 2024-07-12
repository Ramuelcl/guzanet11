<?php
// UserCampos.php

return [
    'id' => [
        // lista
        'titulo1' => 'Id',
        'visible1' => true,
        // ingreso
        'titulo2' => 'Id',
        'visible2' => false,
        // tipo de campo
        'tipo' => 'integer',
        'decimal' => 0,
    ],

    'name' => [
        // lista
        'titulo1' => 'Nombre',
        'visible1' => true,
        // ingreso
        'titulo2' => 'Nombre',
        'visible2' => true,
        // tipo de campo
        'tipo' => 'string',
        // restricciones de campo
        'rules' => 'required|string|min:3|max:128',
        'messages' => [
            'required.attributes.name' => 'El campo :attribute es obligatorio.',
            'string.attributes.name' => 'El campo :attribute debe ser una cadena de texto.',
            'min.attributes.name' => 'El campo :attribute debe tener al menos 3 caracteres.',
            'max.attributes.name' => 'El campo :attribute debe tener como máximo 100 caracteres.',
        ],
    ],

    'email' => [
        // lista
        'titulo1' => 'eMail',
        'visible1' => true,
        // ingreso
        'titulo2' => 'eMail',
        'visible2' => true,
        // tipo de campo
        'tipo' => 'mail',
        // restricciones de campo
        'rules' => 'required|email|min:6|max:128|unique:users,email,', //. Auth::id(), agregarlo cuando se carga
        // 'rules' => 'required|email|unique:users,email,' . Auth::id() . '|max:255|regex:/(.+)@(.+)\.[a-z]{2,}/',
        'messages' => [
            'required.attributes.email' => 'El campo :attribute es obligatorio.',
            'email.attributes.email' => 'El campo :attribute debe ser una dirección de correo electrónico válida.',
            'unique.attributes.email' => 'El email ya está en uso.',
            'min.attributes.email' => 'El campo :attribute debe tener al menos 6 caracteres.',
            'max.attributes.email' => 'El campo :attribute debe tener como máximo 128 caracteres.',
            'regex.attributes.email' => 'El formato del email no es válido.',
        ],
    ],

    'password' => [
        // lista
        'titulo1' => '',
        'visible1' => false,
        // ingreso
        'titulo2' => 'Contraseña',
        'visible2' => true,
        // tipo de campo
        'tipo' => 'password',
        // restricciones de campo
        'rules' => [
            'password' => 'required|min:6|max:128|confirmed',
            'password_confirmation' => 'required',
            // 'password' => 'required|min:8|regex:/[a-z]+[A-Z]+[0-9]+[@#$%^&*()_+\-=\[\]{};':"\\|,.<>\/?]+/',
            'messages' => [
                'regex' => 'La contraseña debe contener al menos una minúscula, una mayúscula, un número y un carácter especial.',
            ],
        ],
    ],

    'profile_photo_path' => [
        // lista
        'titulo1' => 'Foto',
        'visible1' => true,
        // ingreso
        'titulo2' => 'Foto',
        'visible2' => true,
        // tipo de campo
        'tipo' => 'image',
        // restricciones de campo
        'rules' => 'required|max:2048|mimetypes:image/jpg,image/png,image/jpeg', // foto
        // 'rules' => 'required|max:10240|mimetypes:video/mp4,video/avi,video/webm', // video
    ],

    'is_active' => [
        // lista
        'titulo1' => 'Activo',
        'visible1' => true,
        // ingreso
        'titulo2' => 'Activo',
        'visible2' => true,
        // tipo de campo
        'tipo' => 'checkit',
    ],

    'created_at' => [
        // lista
        'titulo1' => 'Creado',
        'visible1' => true,
        // ingreso
        'titulo2' => 'Creado',
        'visible2' => false,
        // tipo de campo
        'tipo' => 'date',
    ],
];
