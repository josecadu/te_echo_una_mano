<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;
use Livewire\WithFileUploads;

class HacerProfesional extends Component
{
    use WithFileUploads;
    public User $user;
    public $fotoPerfil;
    public $oficio;

    protected $rules= [
        'oficio'=>'required|in:Fontanero,Electricista,Albañil,Carpintero,Pintor,Jardinero,Limpieza,Cerrajero,Informatico',
        'fotoPerfil'=>'required|image|max:1024',
    ];
    public function mount(User $user){
        $this->user=$user;
    }

    public function save(){
        $this->validate();
        $ruta= $this->fotoPerfil ? $this->fotoPerfil->store('images','public') : 'images/perfil.png'; 
    }

    public function render()
    {
        return view('livewire.hacer-profesional');
    }
}
