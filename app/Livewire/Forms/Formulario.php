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

    public $title = '';
    public $content = '';
    public $image_path = null;
    public $is_published = false;
    public $categoryId = '';
    public $selectedTags = [];

    public $sortBy = 'id'; // Campo por defecto para ordenar
    public $sortDirection = 'desc'; // Dirección por defecto para ordenar

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
    // protected $attributes = [
    //     'title' => 'titulo',
    //     'content' => 'contenido',
    //     'categoryId' => 'category',
    //     'selectedTags' => 'marcas',
    // ];

    // modal
    public $titulo,
        $abrir = false;

    protected $listeners = ['seleccionActualizada', 'searchUpdated', 'opcionUpdated'];

    // isActive
    public $opciones = 0;

    public function opcionUpdated($opciones)
    {
        // dd($opciones);
        $this->opciones = $opciones;
        $this->filter();
    }

    // Search
    public $search = '';

    public function searchUpdated($search)
    {
        $this->search = $search;
    }

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
        $this->filter();
    }

    public function render()
    {
        // Accede a las configuraciones
        $campos = config('PostCampos');
        $this->filter();
        // dump($this->filas);
        return view('livewire.forms.formulario', ['fields' => $this->filas, 'categories' => $this->categories, 'tags' => $this->tags, 'campos' => $campos]);
    }

    public function filter()
    {
        $this->filas = Post::query()
            ->when($this->search, function ($query) {
                $filter = '%' . $this->search . '%';
                $query
                    ->where('id', 'like', $filter)
                    ->orWhere('title', 'like', $filter)
                    ->orWhere('content', 'like', $filter)
                    ->orWhere('created_at', 'like', $filter)
                    ->orWhereHas('category', function ($query) use ($filter) {
                        $query->where('name', 'like', $filter);
                    })
                    ->orWhereHas('tags', function ($query) use ($filter) {
                        $query->where('name', 'like', $filter);
                    });
            })

            ->when($this->opciones, function ($query) {
                // dd(['opciones' => $this->opciones]);
                $query->where('is_published', true);
            })

            ->orderBy($this->sortBy, $this->sortDirection)

            ->get();
    }

    public function sortBy($field)
    {
        dd($field);
        // Cambia el campo de ordenamiento si ya se está ordenando por el mismo campo
        if ($this->sortBy === $field) {
            $this->sortDirection = $this->sortDirection === 'asc' ? 'desc' : 'asc';
        } else {
            // Si no, cambia al nuevo campo y establece la dirección predeterminada
            $this->sortBy = $field;
            $this->sortDirection = 'asc';
        }

        // Aplica el filtro con el nuevo orden
        $this->filter();
    }

    public function resetFilters()
    {
        $this->search = '';
        $this->opciones = false;
        $this->filter();
        // $this->dispatch('searchUpdated', $this->search);
        // $this->dispatch('isActiveUpdated', $this->isPublishedFilter);
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

        $paso = $this->validate($this->rules(), $this->messages, ['categoryId' => 'categoriia', 'content' => 'contenidoo']);
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
            $tipo = 'success';
            $mensaje = 'Post creado exitosamente.';

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
            $tipo = 'success';
            $mensaje = 'Post editado exitosamente.';

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
                $tipo = 'success';
                $mensaje = 'Post y sus tags asociados eliminados exitosamente.';
            } else {
                session()->flash('error', 'Post no encontrado.');
                $tipo = 'error';
                $mensaje = 'Post no encontrado.';
            }
        }

        $this->reset('post_id', 'title', 'content', 'image_path', 'is_published', 'categoryId', 'selectedTags');
        $this->fncCerrar();
        $this->mount();

        $this->dispatch('mensaje-nuevo', [$tipo, $mensaje]);

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
    public function messages()
    {
        return [
            'title.required' => 'El título es obligatorio.',
            'title.min' => 'El título debe tener al menos :min caracteres.',
            'title.unique' => 'El título ya está en uso, por favor elija otro.',
            'content.required' => 'El contenido es obligatorio.',
            'content.min' => 'El contenido debe tener al menos :min caracteres.',
            'categoryId.required' => 'Debe seleccionar una categoría.',
            'categoryId.exists' => 'La categoría seleccionada no es válida.',
            'selectedTags.array' => 'Los tags seleccionados deben ser un arreglo.',
            'selectedTags.exists' => 'Algunos de los tags seleccionados no son válidos.',
        ];
    }
    public function attributes()
    {
        return [
            'title' => 'título',
            'content' => 'contenido',
            'categoryId' => 'categoría',
            'selectedTags' => 'tags seleccionados',
        ];
    }

    // una vez el cambio ha sido hecho
    public function updated($propertyName, $value)
    {
        if ($propertyName == 'title') {
            $this->slug = $this->generarSlug($value);
        }
        // dump($propertyName, $value, $this->slug);
        $this->validateOnly($propertyName, $this->rules());
    }
    // antes de hacer el cambio
    // public function updating($property, $value)
    // {
    //     dump($property, $value);
    // }

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
