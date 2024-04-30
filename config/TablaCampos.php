<?php
// UserCampos.php

return [
    'tabla' => [
        // lista
        'titulo1' => 'tabla',
        'visible1' => false,
        // ingreso
        'titulo2' => 'tabla',
        'visible2' => false,
        // tipo de campo
        'tipo' => 'integer',
        'decimal' => 0,
    ],

    'tabla_id' => [
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

    'nombre' => [
        // lista
        'titulo1' => 'Nombre',
        'visible1' => true,
        // ingreso
        'titulo2' => 'Nombre',
        'visible2' => true,
        // tipo de campo
        'tipo' => 'string',
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

    'valor0' => [
        // lista
        'titulo1' => 'Valor',
        'visible1' => true,
        // ingreso
        'titulo2' => 'Valor',
        'visible2' => true,
        // tipo de campo
        'tipo' => 'string',
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
