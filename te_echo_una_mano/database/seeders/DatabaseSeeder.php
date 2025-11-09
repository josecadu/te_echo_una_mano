<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash; // 👈 añade esto arriba

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        User::factory()->create([
            'name' => 'admin',
            'email' => 'admin@example.com',
            'password' => Hash::make('admin'), // 👈 contraseña encriptada
           // 'telephone' => '656659731',
        ]);
        $this->call(UserSeeder::class);
        $this->call(ServiceSeeder::class);
    }
}
?>