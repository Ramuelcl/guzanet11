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
'rules'=>'string|required|min:1|max:100|unique:users',
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
'rules' => 'required|email|unique:users,email,' . Auth::id(),
// 'rules' => 'required|email|unique:users,email,' . Auth::id() . '|max:255|regex:/(.+)@(.+)\.[a-z]{2,}/',
 'messages' = [
    'required' => 'El campo email es obligatorio.',
    'email' => 'Introduce una dirección de correo electrónico válida.',
    'unique' => 'El email ya está en uso.',
    'max' => 'El email no puede superar los 255 caracteres.',
    'regex' => 'El formato del email no es válido.',
  ];
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
'rules' = [
    'password' => 'required|min:6|confirmed',
    'password_confirmation' => 'required',
// 'password' => 'required|min:8|regex:/[a-z]+[A-Z]+[0-9]+[@#$%^&*()_+\-=\[\]{};':"\\|,.<>\/?]+/',
$messages = [
    'regex' => 'La contraseña debe contener al menos una minúscula, una mayúscula, un número y un carácter especial.',
];
];

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
