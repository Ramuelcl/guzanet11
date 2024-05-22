<?php

namespace App\Livewire\Forms;

use Livewire\Component;
use Livewire\Attributes\On;

class Mensajes extends Component
{
    public $mensajes = [];

    public function render()
    {
        return view('livewire.forms.mensajes');
    }

    #[On('mensaje-nuevo')]
    public function nuevoMensaje($tipo = 'success', $mensaje)
    {
        array_unshift($this->mensajes, [$tipo, $mensaje]);
    }
}
