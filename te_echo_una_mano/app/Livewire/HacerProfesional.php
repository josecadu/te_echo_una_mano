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
        'fotoPerfil'=>'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
    ];
    public array $oficios = [
    'Fontanero',
    'Electricista',
    'Albañil',
    'Carpintero',
    'Pintor',
    'Jardinero',
    'Limpieza',
    'Cerrajero',
    'Informatico',
];


    public function save(){
        $this->validate();

        $user = auth()->user();
        if(!$user){
            abort(403,'Usuario no autenticado');
        }
        $ruta=  $this->fotoPerfil?->store('images','public') ?? 'images/perfil.png'; 
        $data= ['oficio'=>$this->oficio,'foto_perfil'=>$ruta];
        $user->promocionarAProfesional($data);
        session()->flash('message','Ahora eres un profesional!');
        $this->reset();
        return redirect()->route('dashboard');
    }

    public function render()
    {
        return view('livewire.hacer-profesional');
    }
}
