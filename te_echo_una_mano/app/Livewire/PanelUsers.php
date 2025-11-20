<?php

namespace App\Livewire;

use App\Models\Profesional;
use Livewire\Attributes\On;
use Livewire\Component;

class PanelUsers extends Component
{

    public bool $profesionalModal=false;

    #[On('open-profesional-modal')]
    public function openProfesionalModal()
    {
        $this->profesionalModal = true;
    }

    public function abrirLogin(){
        $this->dispatch('abrirModalLogin')->to(MostrarProfesionales::class);
    }
    public function abrirRegistro(){
        $this->dispatch('abrirModalRegistro')->to(MostrarProfesionales::class);
    }
    public function render()
    {
         // Cargamos profesionales con su usuario asociado
        $profesionales = Profesional::with('user')->get();

        // Solo los que tienen lat/lng
        $marcadores = $profesionales
            ->filter(fn ($p) => $p->user?->lat && $p->user?->lng)
            ->map(fn ($p) => [
                'lat'    => $p->user->lat,
                'lng'    => $p->user->lng,
                'name'   => $p->user->name,
                'email' =>  $p->user->email,
                'oficio' => $p->oficio,
                
            ])
            ->values()
            ->toArray();
        return view('livewire.panel-users',compact('marcadores'));
    }
}
