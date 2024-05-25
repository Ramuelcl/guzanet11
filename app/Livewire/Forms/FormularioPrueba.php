<?php
// app\livewire\forms\FormularioPrueba.php
namespace App\Livewire\Forms;

use Livewire\Component;
use App\Models\post\Post;

class FormularioPrueba extends Component
{
    public $search = '';
    public $filas;

    public function resetSearch()
    {
        $this->searchUpdated();
        $this->dispatch('searchReset');
    }

    protected $listeners = ['searchUpdated'];
    public function searchUpdated($search = '')
    {
        $this->search = $search;
        $this->filter();
    }

    public function mount()
    {
        $this->filter();
    }

    public function render()
    {
        return view('livewire.forms.formulario-prueba', [
            'fields' => $this->filas,
        ]);
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
