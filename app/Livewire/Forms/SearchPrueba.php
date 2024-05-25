<?php
// app\livewire\forms\SearchPrueba.php

namespace App\Http\Livewire\Forms;

use Livewire\Component;

class SearchPrueba extends Component
{
    public $search;

    public function mount($search)
    {
        $this->search = $search;
    }

    public function updatedSearch()
    {
        // Aquí puedes agregar cualquier lógica adicional cuando la propiedad `search` se actualice.
        $this->dispatch('searchUpdated', $this->search);
    }

    public function render()
    {
        return view('livewire.forms.search-prueba');
    }
}
