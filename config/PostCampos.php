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
        'filter' => true,
        'orderBy' => true,
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
        'filter' => true,
        'orderBy' => true,
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
        'filter' => true,
        'orderBy' => false,
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
        'filter' => true,
        'orderBy' => true,
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
        'filter' => true,
        'orderBy' => false,
    ],

    'image_path' => [
        // lista
        'titulo1' => 'Imagen',
        'visible1' => false,
        // ingreso
        'titulo2' => 'Imagen',
        'visible2' => true,
        // tipo de campo
        'tipo' => 'image',
        'filter' => false,
        'orderBy' => false,
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
        'filter' => false,
        'orderBy' => false,
        'is_active' => true,
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
        'filter' => true,
        'orderBy' => true,
    ],
];
