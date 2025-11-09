<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $usuarios = [
            [
            'name' => 'Pedro',
                'email' => 'pedro@mail.com',
                'password' => bcrypt('123456'),
                'direccion' => 'Calle Mayor 12, Sevilla',
                'role' => 'admin',
                'lat' => 37.3890924,
                'lng' => -5.9844589,
            ],
            [
                'name' => 'Laura',
                'email' => 'laura@mail.com',
                'password' => bcrypt('123456'),
                'direccion' => 'Avenida de la Constitución, Sevilla',
                'role' => 'profesional',
                'lat' => 37.3860123,
                'lng' => -5.9935241,
            ],
            [
                'name' => 'Jose',
                'email' => 'jose@mail.com',
                'password' => bcrypt('123456'),
                'direccion' => 'Plaza España, Sevilla',
                'role' => 'usuario',
                'lat' => 37.3772220,
                'lng' => -5.9869440,
            ],
            [
                'name' => 'Invitado',
                'email' => 'guest_001@guest.local',
                'password' => bcrypt('secret'),
                'direccion' => null,
                'role' => 'guest',
                'lat' => null,
                'lng' => null,
            ]
            ];

        foreach ($usuarios as $user) {
            $u= User::create([
                'name' => $user['name'],
                'email' => $user['email'],
                'password' => $user['password'],
                'direccion' => $user['direccion'],
                'lat' => $user['lat'],
                'lng' => $user['lng'],
            ]);

            $u->role = $user['role'];
            $u->save();
        }
    }
}
