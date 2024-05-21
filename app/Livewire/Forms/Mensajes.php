<?php

namespace App\Livewire\Forms;

use Livewire\Component;

class Mensajes extends Component
{
    public $mensajes = ['artículo 1 creado', 'artículo 2 creado', 'artículo 3 creado'];
    public function render()
    {
        return view('livewire.forms.mensajes');
    }

    public function nuevoMensaje($mensaje)
    {
        array_unshift($this->mensajes, $mensaje);
    }
}
