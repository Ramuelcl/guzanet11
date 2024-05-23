<?php
// app/livewire/forms/search.php
namespace App\Livewire\Forms;

use Livewire\Component;
use Illuminate\Support\Str;

class Search extends Component
{
    public $search;

    public function render()
    {
        return view('livewire.forms.search');
    }

    public function updatedSearch()
    {
        $this->dispatch('searchUpdated', $this->search);
    }
    public function queBuscar()
    {
        $this->updatedSearch();
    }

    public function updating($attribute, $value)
    {
        if ($attribute === 'search' && Str::length($value) === 0) {
            $this->updatedSearch();
        }
    }
}
