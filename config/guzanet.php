<?php

// config/guzanet.php
return [
    'clave' => 'valor',
'appEmpresa'=>'Guzanet',
'appLogo'=>'images/app/guzanet.png',
'appNombre' => 'Ramuel',
'appMail' => 'Ramuelcl@gmail.com',

    'idioma' => 'es-CL',
    'icon_paths' => [
        'solid' => 'images/app/icons/solid',
        'outline' => 'images/app/icons/outline',
    ],
'appThemes'=>[
        'colores' => [
            'azul',
            'verde', 
            'amarillo', 
            'rojo',
            ],
        'fondo' => 'images/app/fondo.png',
    ],
'appTheme'=>'theme01',

];

/**
 *
// Acceder a un valor específico
$valor = config('nombre-del-archivo.clave');

// Acceder a todos los valores como un array asociativo
$configuracion = config('nombre-del-archivo');

// Obtener el valor actual de la configuración
$valorActual = config('nombre-del-archivo.clave');

// Modificar el valor en tiempo de ejecución
config(['nombre-del-archivo.clave' => 'nuevo_valor']);

 */
