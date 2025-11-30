<?php

namespace App\Livewire;

use App\Models\Service;
use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithPagination;

class CardServicios extends Component
{
    use WithPagination;
    public $service_id;
    public $precio;
    public $precioPersonalizado =[];
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
    public function guardarPrecio($id){
        $servicio = Auth::user()->profesional->services()->where('service_id', $id)->first();
        $servicio->pivot->precio_personalizado= floatval(str_replace(',', '.', trim($this->precioPersonalizado[$id])));
        $servicio->pivot->save();
        
    }
    public function quitarServicio($id){
        $profesional = Auth::user()->profesional;
        $profesional->services()->detach($id);
    }
    
    #[On('servicioCreado')]
public function render()
{
    $profesional = Auth::user()->profesional ?? null;
    $familia = $profesional?->getFamiliaProfesional();

    if ($profesional && $familia) {

        // Query base de servicios asignados de esa familia
        $queryAsignados = $profesional->services()
            ->where('familia_Profesional', $familia);

        // 1) Los que mostramos (paginados)
        $serviciosAsignados = (clone $queryAsignados)->paginate(3);

        // 2) TODOS los IDs asignados (sin paginar)
        $idsServiciosAsignados = $queryAsignados
            ->pluck('services.id')
            ->toArray();

        // 3) Disponibles = todos los de la familia que NO están asignados
        $serviciosDisponibles = Service::where('familia_Profesional', $familia)
            ->whereNotIn('id', $idsServiciosAsignados)
            ->get();

    } else {
        $serviciosAsignados = collect();
        $serviciosDisponibles = collect();
    }

    return view('livewire.card-servicios', compact(
        'familia',
        'profesional',
        'serviciosAsignados',
        'serviciosDisponibles'
    ));
}

}
