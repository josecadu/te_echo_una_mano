<?php

namespace App\Livewire;

use App\Models\Profesional;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithPagination;

class MostrarProfesionales extends Component
{
    use WithPagination;

    public bool $loginModal = false;
    public bool $registerModal = false;

    // Ubicación invitado / usuario (lat, lng) a partir de la dirección
    public ?array $ubicacion = null;
    public string $direccion = '';

    // Filtro por tipo de profesional (oficio)
    public ?string $tipo = null;

    #[On('abrirModalLogin')]
    public function abrirModalLogin(): void
    {
        $this->loginModal = true;
    }

    #[On('abrirModalRegistro')]
    public function abrirModalRegistro(): void
    {
        $this->registerModal = true;
    }

    public function updatedDireccion(): void
    {
        $this->ubicacion = $this->direccion
            ? User::localizar($this->direccion)
            : null;

        // Al cambiar dirección, volvemos a la primera página
        $this->resetPage();
    }

    public function updatedTipo(): void
    {
        // Al cambiar filtro de tipo, también volvemos a página 1
        $this->resetPage();
    }

    public function render()
    {
        $userId = Auth::id();

        $query = Profesional::with('user')
            // Excluir al usuario logueado si existe
            ->when($userId, fn ($q) => $q->where('user_id', '!=', $userId))
            // Filtro por oficio (tipo)
            ->when($this->tipo, fn ($q, $tipo) => $q->where('oficio', $tipo));

        // Ordenar por distancia si tenemos lat/lng de la ubicación
        if (
            is_array($this->ubicacion) &&
            isset($this->ubicacion['lat'], $this->ubicacion['lng']) &&
            $this->ubicacion['lat'] !== null &&
            $this->ubicacion['lng'] !== null
        ) {
            $lat = $this->ubicacion['lat'];
            $lng = $this->ubicacion['lng'];

            // Aproximación de distancia (suficiente para ordenar)
            $query->orderByRaw(
                '( (lat - ?) * (lat - ?) + (lng - ?) * (lng - ?) ) ASC',
                [$lat, $lat, $lng, $lng]
            );
        } else {
            // Sin ubicación: ordenar por más recientes
            $query->orderByDesc('id');
        }

        $profesionales = $query->paginate(4);
        $ubicacion = $this->ubicacion;

        // Oficios disponibles según el mapa del modelo Profesional
        $tipos = Profesional::oficiosProfesionales();

        return view('livewire.mostrar-profesionales', compact(
            'profesionales',
            'ubicacion',
            'tipos'
        ));
    }
}
