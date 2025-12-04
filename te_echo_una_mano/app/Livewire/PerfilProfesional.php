<?php

namespace App\Livewire;

use App\Models\Profesional;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use Livewire\Attributes\Layout;
use Livewire\Component;
use App\Mail\NotificacionServicios;

#[Layout('layouts.app')]
class PerfilProfesional extends Component
{
    public int $id;
    public bool $serv = false;
    // Valoración atributos
    public int $valoracion = 1;
    public string $comentario = '';
    public float $score;
    //end Valoración
    // Servicios atributos
    public array $servSeleccionados = [];
    public int $precioServicios = 0;
    public string $mensajeCorreo = '';


    //end Servicios


    public function rules()
    {
        return [
            'valoracion' => 'required|integer|min:1|max:5',
            'comentario' => 'string|max:120',

        ];
    }

    public function enviarValoracion()
    {
        $this->validate();
        $profesional = Profesional::where('id', $this->id)->first();
        if (!$profesional) {
            $this->dispatch('alert', type: 'error', message: 'Profesional no encontrado.', check: false);
            return;
        }
        $existeRelacion = $profesional->valoraciones()->where('user_id', Auth::id())->first();
        if ($existeRelacion) {
            // session()->flash('error', 'Ya has valorado a este profesional.');
            $this->dispatch('alert', type: 'error', message: 'Profesional ya valorado.', check: false);
            $this->reset(['valoracion', 'comentario']);

            return;
        }
        $profesional->valoraciones()->create([
            'puntuacion' => $this->valoracion,
            'comentario' => $this->comentario,
            'user_id' => Auth::id(),
            'profesional_id' => $profesional->id,
        ]);
        $this->dispatch('alert', type: 'success', message: 'Valoración enviada correctamente.', check: false);

        $this->reset(['valoracion', 'comentario']);
    }
    public function enviarCorreo()
    {
        $perfilPro = Profesional::with('user', 'services', 'valoraciones.user')->findOrFail($this->id);
        $serviciosSolicitados = $perfilPro->services
            ->whereIn('id', $this->servSeleccionados)->pluck('titulo')->join('---');

        $profesional = Profesional::where('id', $this->id)->first();
        if (!empty($this->mensajeCorreo) && !empty($this->servSeleccionados)) {
            Mail::to($profesional->user->email)
           // Mail::to('jm.cabrera@hotmail.es')
                ->send(new NotificacionServicios(
                    'el usuario ' . Auth::user()->name . ' con el mail ' . Auth::user()->email . ' ha solicitado los siguientes servicios ' . $serviciosSolicitados,
                    ' Con el siguiente mensaje: ' .
                        $this->mensajeCorreo
                ));
            $this->dispatch('alert', type: 'success', message: 'Solicictud enviada correctamente.', check: false);
            $this->reset(['servSeleccionados', 'mensajeCorreo']);
        } else
            $this->dispatch('alert', type: 'error', message: 'Mensaje vacio o no seleccionaste servicio.', check: false);
    }

    public function render()
    {
        $perfilPro = Profesional::with('user', 'services')->findOrFail($this->id);
        $this->score = round($perfilPro->valoraciones()->avg('puntuacion'), 1);
        $this->precioServicios = $perfilPro->services
            ->whereIn('id', $this->servSeleccionados)
            ->sum(function ($service) {
                return $service->pivot->precio_personalizado;
            });


        return view('livewire.perfil-profesional', compact('perfilPro'));
    }
}
