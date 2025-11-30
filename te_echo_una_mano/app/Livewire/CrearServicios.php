<?php

namespace App\Livewire;

use App\Models\Profesional;
use App\Models\Service;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\On;
use Livewire\Component;

class CrearServicios extends Component
{
    public string $titulo="";
    public string $descripcion="";
    public float $precio_personalizado;
    
    public bool $modalServicio = false;

    #[On('openCrearServicio')]
    public function openModalServicio()
    {
        $this->modalServicio = true;
    }
    public function rules()
    {
        return [
            'titulo' => 'required|string|max:100',
            'descripcion' => 'required|string|max:1000',
            'precio_personalizado' => 'required|numeric|min:0',
        ];
    }

    #[On('cerrarModalServicio')]
    public function closeModalServicio()
    {
        $this->modalServicio = false;
    }
    public function crearServicio()
    {
        $profesional = Auth::user()->profesional;
        $this->validate();
        $familia_profesional = $profesional->getFamiliaProfesional();
        $servicio = Service::create([
            'titulo' => $this->titulo,
            'descripcion' => $this->descripcion,
            'familia_Profesional' => $familia_profesional,
        ]);
        $servicio->profesionales()->syncWithoutDetaching([$profesional->id => ['precio_personalizado' => $this->precio_personalizado]]);
        $this->dispatch('servicioCreado');

        // Lógica para crear el servicio   

        $this->modalServicio = false;
    }

    public function render()
    {
        $familiasProfesionales = Profesional::familiasProfesionales();
        return view('livewire.crear-servicios', compact('familiasProfesionales'));
    }
}
