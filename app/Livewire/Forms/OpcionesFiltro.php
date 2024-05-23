<?php
// app\livewire\forms\isActive.php
namespace App\Livewire\Forms;

use Livewire\Component;

class OpcionesFiltro extends Component
{
    public $opciones = 0;
    public $titulo = 'Activos ?';

    public function mount($titulo = null)
    {
        if (!is_null($titulo)) {
            $this->titulo = $titulo;
        }
    }

    public function render()
    {
        return view('livewire.forms.opciones-filtro');
    }

    public function updating($attributes, $value)
    {
        // $this->opciones = $value;
        // dump(['attributes' => $attributes, 'value' => $value]);
        $this->dispatch('opcionUpdated', $value);
    }

    // public function updateOpciones()
    // {
    //     $this->dispatch('opcionUpdated', $this->opciones);
    // }
}
