<?php

namespace App\Livewire\Forms;

use Livewire\Attributes\Modelable;
use Livewire\Component;

class Lwsearch extends Component
{
    #[Modelable]
    public $search = '';

    public function updatingSearch()
    {
        $this->dispatch('searchUpdated', $this->search);
    }

    protected $listeners = ['searchReset'];
    public function searchReset()
    {
        $this->search = '';
        // $this->reset('search');
    }

    public function queBuscar()
    {
        $this->updatingSearch();
    }

    public function render()
    {
        return view('livewire.forms.lwsearch');
    }
}
