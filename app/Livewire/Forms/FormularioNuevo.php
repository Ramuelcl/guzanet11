<?php

namespace App\Http\Livewire\Forms;

use Livewire\Component;
use App\Models\Post;

class FormularioNuevo extends Component
{
    public $search = '';
    public $filas;

    public function mount()
    {
        $this->filter();
    }

    public function render()
    {
        return view('class FormularioNuevo', [
            'fields' => $this->filas,
        ]);
    }

    public function updatedSearch()
    {
        $this->filter();
    }

    public function filter()
    {
        $this->filas = Post::query()
            ->when($this->search, function ($query) {
                $filter = '%' . $this->search . '%';
                $query->where('id', 'like', $filter)->orWhere('title', 'like', $filter)->orWhere('content', 'like', $filter)->orWhere('created_at', 'like', $filter);
            })
            ->get();
    }
}
