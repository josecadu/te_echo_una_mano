<?php

use App\Livewire\Indice;
use App\Livewire\MostrarUsers;
use App\Livewire\PanelProfesionales;
use App\Livewire\PanelUsers;
use App\Livewire\PerfilProfesional;
use App\Livewire\RegistrarUser;
use Illuminate\Support\Facades\Route;

Route::get('/',Indice::class)->name('landing');

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/register', RegistrarUser::class)->name('register');
//la ruta dashboard esta fuera para que puedan entrar los invitados
Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard'); 
Route::get('/usuarios', PanelUsers::class)->name('usuarios');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
     
    
Route::get('/admin',MostrarUsers::class)->name('admin');
Route::get('/profesionales',PanelProfesionales::class)->name('profesionales');
Route::get('/profesional/{id}', PerfilProfesional::class)->name('perfil.profesional');

}
);
