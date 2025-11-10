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

    public array $oficios=['Fontanero','Electricista','Albañil','Carpintero','Pintor','Jardinero','Limpiaeza','Cerrajero','Informatico'];

    protected $rules= [
        'oficio'=>'required|in:oficios|',
        'fotoPerfil'=>'required|image|max:1024',
    ];

    public function render()
    {
        return view('livewire.hacer-profesional');
    }
}
