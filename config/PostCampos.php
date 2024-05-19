<?php
// PostCampos.php

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

    'title' => [
        // lista
        'titulo1' => 'Título',
        'visible1' => true,
        // ingreso
        'titulo2' => 'Título',
        'visible2' => true,
        // tipo de campo
        'tipo' => 'string',
    ],

    'content' => [
        // lista
        'titulo1' => 'Contenido',
        'visible1' => true,
        // ingreso
        'titulo2' => 'Contenido',
        'visible2' => true,
        // tipo de campo
        'tipo' => 'string',
    ],

    'category_id' => [
        // lista
        'titulo1' => 'Categoria',
        'visible1' => true,
        // ingreso
        'titulo2' => 'Categoria',
        'visible2' => true,
        // tipo de campo
        'tipo' => 'combo-box',
        'table' => 'categories',
    ],

    'tag_id' => [
        // lista
        'titulo1' => 'tag',
        'visible1' => true,
        // ingreso
        'titulo2' => 'tag',
        'visible2' => true,
        // tipo de campo
        'tipo' => 'tags',
        'table' => 'tags',
    ],

    'image_path' => [
        // lista
        'titulo1' => 'Imagen',
        'visible1' => false,
        // ingreso
        'titulo2' => 'Imagen',
        'visible2' => false,
        // tipo de campo
        'tipo' => 'image',
    ],

    'is_published' => [
        // lista
        'titulo1' => 'Pub',
        'visible1' => true,
        // ingreso
        'titulo2' => 'Pub',
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
