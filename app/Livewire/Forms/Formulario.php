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
    public $stKey;
    public $filas;
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
    // modal
    public $titulo,
        $abrir = false;

    public function mount()
    {
        $this->stKey = Str::random($length = 5);
        $this->accion = 'listar';
        $this->titulo = 'Listado';
        $this->categories = Category::all();
        // dd($this->categories);
        $this->tags = Tag::all();
        $this->filas = Post::all();
    }

    public function render()
    {
        return view('livewire.forms.formulario', ['filas' => $this->filas, 'categories' => $this->categories, 'tags' => $this->tags]);
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
        // $post->tags()->sync($this->selectedTags);
        $post->tags()->attach($this->selectedTags);
        // $this->slug = Str::slug($this->title);
        $this->reset('item_id', 'title', 'slug', 'content', 'image_path', 'is_published', 'categoryId', 'selectedTags');
        $this->reset();
        $this->mount();
    }

    public function btnCrear()
    {
        $this->titulo = 'Crear registro';
        $this->accion = 'crear';
        $this->fncLimpiarDatos($post);
    }
    public function btnEditar(Post $post)
    {
        $this->titulo = 'Editar registro';
        $this->accion = 'editar';
        $this->fncLlenarDatos($post);
    }
    public function btnEliminar($id)
    {
        $this->titulo = 'Eliminar registro';
        $this->accion = 'eliminar';
        $this->fncLlenarDatos($post);
    }
    public function fncLlenarDatos($post)
    {
        $this->title = $post->title;
        $this->content = $post->content;
        $this->image_path = $post->image_path;
        $this->is_published = $post->is_published;
        $this->category_id = $post->category_id;
        // $this->selectedTags = $post->tags();
    }
    public function fncLimpiarDatos()
    {
        $this->title = '';
        $this->content = '';
        $this->image_path = '';
        $this->is_published = false;
        $this->category_id = '';
        $this->selectedTags = [];
    }
}
