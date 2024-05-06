<?php

namespace App\Livewire\Forms;

use Livewire\Component;
use Livewire\Attributes\On;
//
use Illuminate\Support\Str;

class FrmPaises extends Component // escuchas
{
    public $seleccionActualizada;
    public $pais;
    public $paises = [['id' => 1, 'name' => 'Peru'], ['id' => 2, 'name' => 'Colombia'], ['id' => 5, 'name' => 'Argentina']];
    public $seleccionadas = [2];

    public function mount()
    {
        //
    }

    public function render()
    {
        return view('livewire.forms.frm-paises', ['opciones' => $this->paises, 'seleccionadas' => [2]]);
    }

    public function submitForm()
    {
        $this->pais = Str::ucfirst($this->pais);
        // $this->fncVerifica($this->pais);
        $id = max(array_column($this->paises, 'id')) + 1;

        array_push($this->paises, ['id' => $id, 'name' => $this->pais]);
        $this->reset(['pais']);
        $this->pais = '';
        if ($id == 10) {
            dump(['paises' => $this->paises]);
        }
        // Envía el formulario (simplemente actualiza el componente en este ejemplo)
        $this->dispatch('select2', 'refresh');
    }

    #[On('seleccionActualizada')]
    public function seleccionActualizada($array)
    {
        $this->seleccionadas = $array;
    }
}
