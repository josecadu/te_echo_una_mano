<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;

class MostrarUsers extends Component
{
    public function render()
    {
        $users= User::orderBy('id','desc')->get();
        return view('livewire.mostrar-users', compact('users'));
    }
}
