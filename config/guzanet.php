<?php

// config/guzanet.php
return [
    'clave' => 'valor',
    'aplicacion' => 'Guzanet',
    'idioma' => 'es-CL',
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
