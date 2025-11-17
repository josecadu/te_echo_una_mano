<?php

namespace App\Livewire;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithFileUploads;

class HacerProfesional extends Component
{
    use WithFileUploads;
    public $fotoPerfil;
    public $oficio;

    protected $rules= [
        'oficio'=>'required|in:Fontanero,Electricista,Albañil,Carpintero,Pintor,Jardinero,Limpieza,Cerrajero,Informatico',
        'fotoPerfil'=>'nullable|image|max:1024',
    ];

    public function save(){
        $this->validate();

        $user = Auth::user();
        if(!$user){
            abort(403,'Usuario no autenticado');
        }
        $ruta= $this->fotoPerfil ? $this->fotoPerfil->store('images','public') : 'storage/images/perfil.png'; 
        $data= ['oficio'=>$this->oficio,'foto_perfil'=>$ruta];
        

        $user->promocionarAProfesional($data);
    }

    public function render()
    {
        return view('livewire.hacer-profesional');
    }
}
