<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\backend\Category;
use App\Models\backend\Tags;
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
        dd($this->categories);
        $this->tags = Tag::all();
        return view('livewire.formulario', ['categories' => $this->categories, 'tags' => $this->tags]);
    }
}
