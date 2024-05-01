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

    public $estado = 1; // listar

    public $name, $email, $password, $is_active, $profile_photo_path;
    public $user_id;

    public function index()
    {
        $users = User::paginate(2); //::all(), Suponiendo que estás obteniendo todos los usuarios
        return view('livewire.admin.users.index', ['users' => $users, 'estado' => $this->estado]);
    }
}
