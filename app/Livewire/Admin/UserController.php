<?php

namespace App\Livewire\Admin;

use Livewire\Component;
// use Illuminate\Support\Facades\Hash;
use Livewire\WithPagination;
use Illuminate\Http\Request;
//
use App\Models\User;

class UserController extends Component
{
    use WithPagination;

    public $name, $email, $password, $is_active, $profile_photo_path;
    public $user_id;
    public $accion;

    public function mount()
    {
        $this->accion = 'listar'; //'crear', 'editar', 'eliminar'
    }

    public function render()
    {
        // Accede a las configuraciones
        $campos = config('UserCampos');

        $users = User::paginate(2); //::all(), Suponiendo que estás obteniendo todos los usuarios
        return view('livewire.admin.users.index', ['fields' => $users, 'campos' => $campos]);
    }

    public function form()
    {
        return view('livewire.admin.users.form');
    }

    public function fncVerCrearEditarEliminar(User $user, $accion = null)
    {
        dd($user, $accion);
        $this->accion = $accion;
        if ($accion == 'crear') {
            //
        } else {
            $this->user_id = $user->id;
            $this->fill('name', 'email', 'is_active', 'profile_photo_path'); // Cambiar a accion 2 para editar registro existente
        }
    }

    public function fncSave(User $user)
    {
        //
    }
}
