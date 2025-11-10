<?php

use App\Livewire\MostrarUsers;
use App\Livewire\RegistrarUser;
use Illuminate\Support\Facades\Route;

// Route::get('/test-geocode', function () {
//     $results = app('geocoder')->geocode('Madrid, España')->get();

//     dd(
//         $results->toArray(),
//         app('geocoder')->getProviders()->keys()->all()
//     );
// });


Route::get('/', function () {
    return view('welcome');
});

Route::get('/register', RegistrarUser::class)->name('register');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');  
    
Route::get('/users',MostrarUsers::class)->name('users');

}
);
