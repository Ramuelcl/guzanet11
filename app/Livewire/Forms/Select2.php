<?php

namespace App\Livewire\Forms;

use Livewire\Component;
use Livewire\Attributes\On;

class Select2 extends Component
{
    public $check, $opcion, $opciones, $seleccionadas;
    public $claveUnica, $Activa;
    public $vIndex = false;

    public function mount($opciones = [], $seleccionadas = [], $multiple = true)
    {
        $this->claveUnica = substr(str_shuffle($characters = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ'), 0, $length = 5);
        // dd($this->claveUnica);
        $this->opciones = $opciones;
        $this->seleccionadas = $seleccionadas;
        $this->multiple = $multiple;
    }
    public function render()
    {
        return view('livewire.forms.select2');
    }

    public function actualizarSeleccion($opcionId)
    {
        if (in_array($opcionId, $this->seleccionadas)) {
            $this->seleccionadas = array_diff($this->seleccionadas, [$opcionId]);
        } else {
            $this->seleccionadas[] = $opcionId;
        }

        // dump($this->seleccionadas); // Solo para fines de depuración
        $this->dispatch('seleccionActualizada', seleccionadas: $this->seleccionadas)->self();
    }

    public function delete($index)
    {
        foreach ($this->opciones as $key => $value) {
            if ($index == $value['id']) {
                unset($this->opciones[$key]);
            }
        }
    }

    #[On('refresh')]
    public function refresh()
    {
        $this->check = !$this->check;
    }
    public function changeActiva($valor)
    {
        $this->Activa = $valor;
    }
}
