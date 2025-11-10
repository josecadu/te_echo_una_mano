<?php

namespace App\Livewire;

use App\Models\Profesional;
use Livewire\Component;

class MostrarProfesionales extends Component
{
    public function render()
    {
        $profesionales = Profesional::with('user')->orderby('id','desc')->get();
        return view('livewire.mostrar-profesionales',compact('profesionales'));
    }
}
