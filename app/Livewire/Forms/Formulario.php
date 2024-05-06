<?php

namespace App\Livewire\Forms;

use Livewire\Component;
use Illuminate\Support\Str;
//
use App\Models\backend\Category;
use App\Models\backend\Tag;
use App\Models\post\Post;

class Formulario extends Component
{
    public $categories;
    public $tags;
    public $accion;
    public $item_id = 0,
        $title,
        $slug,
        $content,
        $image_path = null,
        $is_published = false,
        $categoryId = '',
        $selectedTags = [];

    public function mount()
    {
        $this->accion = 'crear';
    }

    public function render()
    {
        $this->categories = Category::all();
        // dd($this->categories);
        $this->tags = Tag::all();
        return view('livewire.forms.formulario', ['categories' => $this->categories, 'tags' => $this->tags]);
    }

    public function fncAccion($accion = null)
    {
        // dd([
        //     'accion' => $this->accion,
        //     'title' => $this->title,
        //     'slug' => Str::slug($this->title),
        //     'content' => $this->content,
        //     'image_path' => $this->image_path,
        //     'is_published' => $this->is_published,
        //     'categoryId' => $this->categoryId,
        //     'selectedTags' => $this->selectedTags,
        // ]);
        $post = Post::updateOrCreate([
            'title' => $this->title,
            'slug' => Str::slug($this->title),
            'content' => $this->content,
            'image_path' => $this->image_path,
            'is_published' => $this->is_published,
            'category_id' => $this->categoryId,
        ]);
        $post->tags()->attach($this->selectedTags);
        // $this->slug = Str::slug($this->title);
    }
}
