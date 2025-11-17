<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\Layout;

#[Layout('layouts.landing')]
class Indice extends Component
{
    public bool $loginModal = false;
    public bool $registerModal =false;
    public function render()
    {
        return view('livewire.indice');
    }
}
