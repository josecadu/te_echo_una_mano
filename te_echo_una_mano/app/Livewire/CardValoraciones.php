<?php

namespace App\Livewire;

use App\Models\Profesional;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class CardValoraciones extends Component
{
    public float $score;
    public int $valoraciones=0;
    public function render()
    {
        $perfilPro = Auth::user()->profesional;
        $this->score = round($perfilPro->valoraciones()->avg('puntuacion'),1);
        $this->valoraciones = $perfilPro->valoraciones()->count();
        return view('livewire.card-valoraciones',compact('perfilPro'));
    }
}
