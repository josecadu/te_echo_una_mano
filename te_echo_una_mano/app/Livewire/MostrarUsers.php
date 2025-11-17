<?php

namespace App\Livewire;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithPagination;

class MostrarUsers extends Component
{
    use WithPagination;
    public $modal = false;
    public $editUserId = null;
    public $name;
    public $email;
    public $direccion;
    public $role;


    public function rules()
    {
        return [
            'name' => 'required|string|max:100',
            'email' => 'required|email|max:255|unique:users,email,' . $this->editUserId,
            'direccion' => 'nullable|string|max:255',
            'role' => 'required|in:guest,usuario,profesional,admin',

        ];
    }

    public function edit(int $userId)
    {
        if (Auth::user()->role !== 'admin') {
            session()->flash('error', 'No tiene permisos para editar usuarios.');
            return;
        }
        $user = User::findOrFail($userId);
        $this->editUserId = $user->id;
        $this->name = $user->name;
        $this->email = $user->email;
        $this->direccion = $user->direccion;
        $this->role = $user->role;
        $this->resetValidation();
        $this->modal = true;
    }
    public function update()
    {
        $this->validate();
        $user = User::findOrFail($this->editUserId);

        $rolOld = $user->role;
        $rolNew = $this->role;

        if ($user->id === Auth::id() && $rolNew !== 'admin' && $rolOld === 'admin') {
            session()->flash('error', 'No puedes cambiar tu rol de admin.');
            return;
        }
        $user->name = $this->name;
        $user->email = $this->email;
        $user->direccion = $this->direccion;
        $coord = User::localizar($this->direccion);
        $user->lat = $coord['lat'] ?? null;
        $user->lng = $coord['lng'] ?? null;
        $user->role = $this->role;
        $user->save();
        $this->reset();
        session()->flash('success', 'Usuario actualizado correctamente.');
        $this->dispatch('user-updated');
    }

    public function confirmarDelete(int $id)
    {
        $this->dispatch('confirmar-eliminar', id: $id);
    }
    public function delete(int $id)
    {
        if(Auth::id() == $id){
            session()->flash('toast', type: 'error', message: 'No puedes eliminar tu propio usuario.');
            return;
        }
        $user = User::findOrFail($id);
        $user->delete();
        $this->dispatch('toast', type: 'success', message: 'Usuario eliminado');
    }

    public function render()
    {
        $users = User::orderBy('id', 'desc')->paginate(10);
        return view('livewire.mostrar-users', compact('users'));
    }
}
