<?php
// app\livewire\forms\isActive.php
namespace App\Livewire\Forms;
use Livewire\Attributes\Modelable;

use Livewire\Component;

class OpcionesFiltro extends Component
{
    #[Modelable]
    public $opciones = 0;
    public $titulo = 'Activos ?';

    public function updatingOpciones()
    {
        $this->dispatch('opcionUpdated', $this->opciones);
    }

    protected $listeners = ['opcionReset'];
    public function opcionReset()
    {
        $this->opciones = 0;
    }

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
}
