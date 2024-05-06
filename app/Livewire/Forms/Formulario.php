<?php

namespace App\Livewire\Forms;

use Livewire\Component;
use App\Models\backend\Category;
use App\Models\backend\Tag;
use App\Models\post\Post;

class Formulario extends Component
{
    public $categories;
    public $tags;

    public function mount()
    {
    }

    public function render()
    {
        $this->categories = Category::all();
        // dd($this->categories);
        $this->tags = Tag::all();
        return view('livewire.forms.formulario', ['categories' => $this->categories, 'tags' => $this->tags]);
    }
}
