<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class MostrarUsers extends Component
{
    public $modal= false;
    public $editUserId= null;
    public $name;
    public $email;
    public $direccion;
    public $role;
    

    public function rules(){ return [
        'name' => 'required|string|max:100',
        'email' => 'required|email|max:255|unique:users,email,' .$this->editUserId,
        'direccion' => 'nullable|string|max:255',
        'role'=> 'required|in:guest,usuario,profesional,admin',

    ];}

    public function edit(int $userId){
        if (!auth()->user->isAdmin()) {
            session()->flash('error','No tiene permisos para editar usuarios.');
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
    public function update(){
        
    }

    public function render()
    {
        $users= User::orderBy('id','desc')->paginate(10);
        return view('livewire.mostrar-users', compact('users'));
    }
}
