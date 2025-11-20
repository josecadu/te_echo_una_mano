<?php

namespace App\Livewire;

use App\Models\Profesional;
use App\Models\User;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithPagination;

class MostrarProfesionales extends Component
{
    use WithPagination;
    public bool $loginModal = false;
    public bool $registerModal = false;
    public $ubicacion = null;   // ['lat' => ..., 'lng' => ...]
    public $direccion = '';     // lo que escribe el invitado

    #[On('abrirModalLogin')]
    public function abrirModalLogin()
    {
        $this->loginModal = true;
    }

    #[On('abrirModalRegistro')]
    public function abrirModalRegistro()
    {
        $this->registerModal = true;
    }
    public function updatedDireccion()
    {
        // Solo geocodificar si hay algo escrito
        $this->ubicacion = $this->direccion
            ? User::localizar($this->direccion)
            : null;
    }

    public function render()
{
    // 1) Sacamos un paginator normal
    $profesionales = Profesional::with('user')
        ->orderBy('id', 'desc')
        ->paginate(4);

    $ubicacion = $this->ubicacion;

    // 2) Ordenar SOLO la collection interna, sin convertir a Collection el paginator
    $collection = $profesionales->getCollection();

    if (
        is_array($this->ubicacion) &&
        isset($this->ubicacion['lat'], $this->ubicacion['lng'])
    ) {
        $lat = $this->ubicacion['lat'];
        $lng = $this->ubicacion['lng'];

        $collection = $collection
            ->sortBy(function ($p) use ($lat, $lng) {
                if (!$p->user || $p->user->lat === null || $p->user->lng === null) {
                    return PHP_INT_MAX; // al final de la lista
                }

                $dLat = $p->user->lat - $lat;
                $dLng = $p->user->lng - $lng;

                return $dLat * $dLat + $dLng * $dLng;
            })
            ->values();
    } else {
        $collection = $collection
            ->sortByDesc('id')
            ->values();
    }

    // 3) Volvemos a meter la collection ordenada en el paginator
    $profesionales->setCollection($collection);

    return view('livewire.mostrar-profesionales', compact('profesionales', 'ubicacion'));
}

}
