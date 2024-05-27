<?php
// app/Http/Controllers/PrincipalController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PrincipalController extends Controller
{
    public function acercaDe()
    {
        return view('principal.acercaDe');
    }
    public function prueba()
    {
        return view('principal.prueba');
    }

    public function iconos($typeIcon = 'solid')
    {
        $directory = public_path("images/app/icons/$typeIcon"); // Asegúrate de que esta ruta es correcta
        $icons = scandir($directory);
        $svgIcons = [];

        foreach ($icons as $icon) {
            if (pathinfo($icon, PATHINFO_EXTENSION) === 'php') {
                $icon = str_replace('.blade.php', '', $icon);
                $svgIcons[] = $icon;
            }
        }

        return view('principal.iconos', ['svgIcons' => $svgIcons, 'typeIcon' => $typeIcon]);
    }
}
