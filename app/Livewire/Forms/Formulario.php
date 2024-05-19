<?php
// app\livewire\forms\formulario.php

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
    public $post_id = 0;

    #[Validate('required', message: 'Please provide a post title', translate: true)]
    #[Validate('min:3', message: 'This title is too short', translate: true)]
    #[Validate('unique:posts,title', message: 'Please provide a post title unique', translate: true)]
    public $title = '';
    public $content = '';
    public $image_path = null;
    public $is_published = false;
    public $categoryId = '';
    public $selectedTags = [];

    protected $rules = [
        'title' => 'required|min:3|unique:posts,title',
        'content' => 'required|min:5',
        'categoryId' => 'required|exists:categories,id',
        'selectedTags' => 'array|exists:tags,id',
    ];

    protected $messages = [
        'title.required' => 'Please provide a post title',
        'title.min' => 'This title is too short',
        'title.unique' => 'Please provide a unique post title',
        'content.required' => 'Content is required',
        'content.min' => 'Content is too short',
        'categoryId.required' => 'Please select a category',
        'categoryId.exists' => 'Selected category does not exist',
        'selectedTags.exists' => 'One or more selected tags do not exist',
    ];

    // modal
    public $titulo,
        $abrir = false;

    protected $listeners = ['seleccionActualizada'];

    public function seleccionActualizada($seleccionadas)
    {
        // dd('llegó');
        $this->selectedTags = $seleccionadas;
    }

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
        // Accede a las configuraciones
        $campos = config('PostCampos');

        return view('livewire.forms.formulario', ['fields' => $this->filas, 'categories' => $this->categories, 'tags' => $this->tags, 'campos' => $campos]);
    }

    public function fncSave()
    {
        // Imprimir datos antes de la validación
        // dd('Pre-validation data', $this->accion, [
        //     'title' => $this->title,
        //     'content' => $this->content,
        //     'categoryId' => $this->categoryId,
        //     'selectedTags' => $this->selectedTags,
        //     'rules' => $this->rules(),
        // ]);

        $paso = $this->validate($this->rules());
        // dd('fncSave', 'Validation passed', $paso);

        // Generar el nuevo slug
        $nuevoSlug = $this->generarSlug($this->title);
        if ($this->accion == 'crear') {
            // CREATE
            // Crear el nuevo registro
            $post = Post::Create([
                'title' => $this->title,
                'slug' => $nuevoSlug,
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
            // $rules['slug'] = 'required|unique:posts,slug,$this->post_id';
            // dd($post, $this->selectedTags);

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
            // dd([$this->post_id, 'post' => $post]);
            if ($post) {
                // Eliminar las relaciones en la tabla pivote
                $post->tags()->detach();

                // Eliminar el post
                $post->delete();

                session()->flash('success', 'Post y sus tags asociados eliminados exitosamente.');
            } else {
                session()->flash('error', 'Post no encontrado.');
            }
        }

        $this->reset('post_id', 'title', 'content', 'image_path', 'is_published', 'categoryId', 'selectedTags');
        $this->fncCerrar();
        $this->mount();
        return redirect()->route('dashboard');
    }

    public function rules()
    {
        return [
            'title' => 'required|min:3|unique:posts,title,' . $this->post_id,
            // 'slug' => 'required|unique:posts,slug,' . $this->post_id,
            'content' => 'required|min:5',
            'categoryId' => 'required|exists:categories,id',
            'selectedTags' => 'array|exists:tags,id',
        ];
    }

    public function updatedTitulo()
    {
        $this->slug = $this->generarSlug($this->titulo);
        $this->validateOnly('slug');
    }
    public function updated($propertyName)
    {
        if ($propertyName !== 'Titulo') {
            $this->validateOnly($propertyName);
        }
    }

    public function btnCrear()
    {
        $this->titulo = 'Crear registro';
        $this->accion = 'crear';
        $this->fncAbrir();
        // dd($this->titulo, $this->abrir);
        // $this->fncLimpiarDatos($post);
    }
    public function btnEditar(Post $postId)
    {
        // dd($this->titulo, $this->abrir, $postId);
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
        $this->abrir = true;
    }
    public function fncCerrar()
    {
        $this->abrir = false;
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
