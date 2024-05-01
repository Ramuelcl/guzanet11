<?php

namespace App\Livewire;

use Livewire\Component;

class UserComponent extends Component
{
    public function render()
    {
        dd('uno');
        return view('livewire.user-component');
    }
}
