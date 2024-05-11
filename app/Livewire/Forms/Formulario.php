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
    public $filas;
    public $categories;
    public $tags;
    public $accion;
    public $post_id = 0,
        $title,
        $slug,
        $content,
        $image_path = null,
        $is_published = false,
        $categoryId = '',
        $selectedTags = [];

    protected $rules = [
        'titulo' => 'required',
        'contenido' => 'required',
        'slug' => 'required|unique:posts,slug',
    ];

    // modal
    public $titulo,
        $abrir = false;

    public function mount()
    {
        $this->reset();
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

    public function fncSave()
    {
        $slug = Str::slug($this->title);
        // // Verificar si el slug ya existe en la base de datos
        // if (Post::where('slug', $slug)->exists()) {
        //     return back()
        //         ->withErrors(['slug' => 'El slug ya está en uso. Por favor, elige otro.'])
        //         ->withInput();
        // }

        // CREATE
        if ($this->accion == 'crear') {
            // Crear el nuevo registro
            $post = Post::Create([
                'title' => $this->title,
                'slug' => $slug,
                'content' => $this->content,
                'image_path' => $this->image_path,
                'is_published' => $this->is_published,
                'category_id' => $this->categoryId,
            ]);
            $post->tags()->sync($this->selectedTags);
            session()->flash('success', 'Post creado exitosamente.');

            // UPDATE
        } elseif ($this->accion == 'editar') {
            $post = Post::find($this->post_id);
            // Generar el nuevo slug
            $nuevoSlug = $this->generarSlug($slug);

            // Verificar si el nuevo slug es diferente y único
            if ($post->slug != $nuevoSlug && !$this->existeSlug($nuevoSlug, $this->post_id)) {
                $post->slug = $nuevoSlug;
            }
            // Actualizar los demás campos del post
            $post->update([
                'title' => $this->title,
                'content' => $this->content,
                'image_path' => $this->image_path,
                'is_published' => $this->is_published,
                'category_id' => $this->categoryId,
            ]);
            $post->tags()->sync($this->selectedTags);
            session()->flash('success', 'Post editado exitosamente.');

            // DESTROY
        } elseif ($this->accion == 'eliminar') {
            $post = Post::find($this->post_id);
            $post->delete();
            session()->flash('success', 'Post eliminado exitosamente.');
        }

        $this->reset('post_id', 'title', 'slug', 'content', 'image_path', 'is_published', 'categoryId', 'selectedTags');

        // $this->mount();
        return redirect()->route('dashboard');
    }

    public function updatedTitulo()
    {
        $this->slug = Str::slug($this->titulo);
        $this->validateOnly('slug');
    }

    public function btnCrear()
    {
        $this->titulo = 'Crear registro';
        $this->accion = 'crear';
        $this->fncAbrir();
        // $this->fncLimpiarDatos($post);
    }
    public function btnEditar(Post $postId)
    {
        $this->titulo = 'Editar registro';
        $this->accion = 'editar';
        $this->post_id = $postId->id;
        $this->fncLlenarDatos($postId);

        $this->fncAbrir();
    }
    public function btnEliminar(Post $postId)
    {
        // dd($postId);
        $this->titulo = 'Eliminar registro';
        $this->accion = 'eliminar';
        $this->post_id = $postId->id;
        $this->fncLlenarDatos($postId);
        $this->fncAbrir();
    }
    public function fncLlenarDatos($post)
    {
        $this->title = $post->title;
        $this->content = $post->content;
        $this->image_path = $post->image_path;
        $this->is_published = $post->is_published;
        $this->categoryId = $post->category_id;
        $this->selectedTags = $post->tags->pluck('id')->toArray();
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

    public function fncAbrir()
    {
        $this->abrir = !$this->abrir;
    }

    // Función para generar un nuevo slug
    private function generarSlug($slug)
    {
        return Str::slug($slug);
    }

    // Función para verificar si un slug ya existe en otros registros, excluyendo el registro actual
    private function existeSlug($slug, $postId)
    {
        return Post::where('slug', $slug)->where('id', '!=', $postId)->exists();
    }
}
