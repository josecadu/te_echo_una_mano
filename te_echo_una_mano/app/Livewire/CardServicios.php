<?php

namespace App\Livewire;

use App\Models\Service;
use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class CardServicios extends Component
{
    public $service_id;
    public $precio;
    public bool $addServiceModal = false;

    public function openAddServiceModal()
    {
        $this->reset('service_id', 'precio');
        $this->addServiceModal = true;
    }
    public function rules()
    {
        return [
            'service_id' => 'required|exists:services,id',
            'precio' => 'required|numeric|min:0',
        ];
    }
    public function addService()
    {
        $this->validate();
        $profesional = Auth::user()->profesional;
        $profesional->services()->syncWithoutDetaching([$this->service_id => ['precio_personalizado' => $this->precio]]);
        $this->addServiceModal = false;
        $this->reset(['service_id', 'precio']);
    }

    public function render()
    {
        $profesional = Auth::user()->profesional;
        $familia = $profesional->getFamiliaProfesional();
        $serviciosAsignados = $profesional ? $profesional->services()->where('familia_Profesional', $familia)->get() : collect();
        $serviciosDisponibles = $familia ? Service::where('familia_Profesional', $familia)->whereNotIn('id',$serviciosAsignados->pluck('id'))->get() : collect();
        
        return view('livewire.card-servicios', compact('familia', 'profesional', 'serviciosAsignados', 'serviciosDisponibles'));
    }
}
