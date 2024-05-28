<?php
// app/Http/Controllers/PrincipalController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\{App, Artisan, File, Route};

class PrincipalController extends Controller
{
    public function acercaDe()
    {
        return view('principal.acercaDe');
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
    public function linkStorage()
    {
        Artisan::call('storage:link');

        // Crear directorios si no existen
        $directories = ['app', 'avatars', 'flags'];
        foreach ($directories as $directory) {
            $target = '../../storage/app/public/images/' . $directory;
            $shortcut = public_path('storage/images/' . $directory);

            // Crear el directorio si no existe
            if (!File::isDirectory($shortcut)) {
                File::makeDirectory($shortcut, 0777, true, true);
            }

            // Crear el enlace simbólico si no existe
            if (!File::exists($shortcut)) {
                symlink($target, $shortcut);
            }
        }
        $source = public_path('images/app/logo/guzanet.png');
        $target = public_path('storage/images/app/guzanet.png');

        // Cargar y crear el archivo SVG con el contenido
        // $target = public_path('images/guzanet.svg');
        // $svgContent = file_get_contents($target);
        // file_put_contents($source, $svgContent);

        // Copiar el archivo a guzanet.svg
        copy($source, $target);

        return "Enlace simbólico y directorios creados correctamente.
        <br><br>
        <a href='/'>Volver a la página principal</a>
        <br>
        <a href='/readstorage'>mostrarlos</a>";
    }
    public function readStorage()
    {
        $directories = ['app', 'avatars', 'flags'];
        foreach ($directories as $directory) {
            $target = '/storage/app/public/images/' . $directory;
            $targetFolder = base_path() . $target;
            if (File::isDirectory($targetFolder)) {
                echo $targetFolder . '<br>';
            }
        }
        $linkFolder = $_SERVER['DOCUMENT_ROOT'] . '\\storage';
        // dump( $linkFolder);
        return "Enlaces: \n linkFolder=$linkFolder \n. <br> <a href='/'>Volver a la página principal</a>";
    }
}
