<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Attributes\On;
use Livewire\Component;

class ValorarProfesional extends Component
{
    
    public int $profesionalId=1;
    public int $calificacion = 1;
    public string $comentario = '';
    public bool $serviciosValoracionesModal=false;

    #[On('abrirInfoProfesional')]
    public function abrirValoracionesServicios($profesionalId)
    {
        $this->serviciosValoracionesModal=true;
        $this->profesionalId = $profesionalId['id'];
    }


    
    public function getProfesional(int $id)
    {
        return User::with('profesional')->where('id', $id)->first();
    }
    public function save(){
        $profesional = $this->getProfesional($this->profesionalId);
        if(!$profesional){
            session()->flash('error', 'Profesional no encontrado.');
            return;
        }
        $profesional->profesional->valoraciones()->create([
            'calificacion' => $this->calificacion,
            'titulo' => '',
            'comentario' => $this->comentario,
        ]);
        session()->flash('success', 'Valoración guardada correctamente.');
        $this->reset(['calificacion', 'comentario']);
    }
    public function render()
    {
        $profesional = $this->getProfesional($this->profesionalId);
        return view('livewire.valorar-profesional', compact('profesional'));
    }
}
