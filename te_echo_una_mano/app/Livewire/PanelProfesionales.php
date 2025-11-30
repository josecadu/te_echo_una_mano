<?php

namespace App\Livewire;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Livewire\Attributes\Layout;
use Livewire\Attributes\On;



use Livewire\Component;
use Livewire\WithFileUploads;

#[Layout('layouts.app')]
class PanelProfesionales extends Component
{
    use WithFileUploads;

    public bool $editarModal = false;
    public bool $añadirServicioModal = false;
    public $fotoAntigua;
    public $fotoNueva;
    public string $direccion = "";
    public $editUserId = null;
    public $name;
    public $email;


    public function rules()
    {
        return [
            'name' => 'required|string|max:100',
            'email' => 'required|email|max:255|unique:users,email,' . $this->editUserId,
            'direccion' => 'nullable|string|max:255',
            'fotoNueva' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',

        ];
    }

    public function edit(int $userId)
    {
        if (!Auth::user()) {
            session()->flash('error', 'No tiene permisos para editar este usuario.');
            return;
        }
        $user = User::with('profesional')->findOrFail($userId);

        $this->fotoAntigua = $user->profesional->foto_perfil;
        $this->editUserId = $user->id;
        $this->name = $user->name;
        $this->email = $user->email;
        $this->direccion = $user->direccion;
        $this->resetValidation();
        $this->editarModal = true;
    }
    public function update()
    {
        $this->validate();
        $user = User::with('profesional')->findOrFail($this->editUserId);

        $ruta = $this->fotoAntigua;
        if ($this->fotoNueva) {
            $ruta = $this->fotoNueva?->store('images', 'public');

            if ($this->fotoAntigua && $this->fotoAntigua !== 'images/default.jpg') {
                Storage::disk('public')->delete($this->fotoAntigua);
            }
        }
        $user->profesional->foto_perfil = $ruta ?: $this->fotoAntigua;
        $user->name = $this->name;
        $user->email = $this->email;
        $user->direccion = $this->direccion;
        $coord = User::localizar($this->direccion);
        $user->lat = $coord['lat'] ?? null;
        $user->lng = $coord['lng'] ?? null;
        $user->profesional->save();
        $user->save();
        $this->reset();
        session()->flash('success', 'Perfil actualizado correctamente.');
        $this->dispatch('profesional-updated');
    }
    
    public function render()
    {
        $perfilPro = User::with('profesional')->findOrFail(Auth::id());
        return view('livewire.panel-profesionales', compact('perfilPro'));
    }

    public function cancelar()
    {
        $this->editarModal = false;
        $this->reset();
    }
}
