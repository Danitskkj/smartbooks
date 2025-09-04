<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Admin user
        User::create([
            'name' => 'Daniel',
            'email' => 'daniel@email.com',
            'password' => Hash::make('daniel123'),
        ]);
        
        // Regular users
        $users = [
            [
                'name' => 'Ana Oliveira',
                'email' => 'ana.oliveira@email.com',
                'password' => 'senha123',
            ],
            [
                'name' => 'Bruno Costa',
                'email' => 'bruno.costa@email.com',
                'password' => 'segredo456',
            ],
            [
                'name' => 'Carla Dias',
                'email' => 'carla.dias@email.com',
                'password' => '12345678',
            ],
            [
                'name' => 'Daniel Martins',
                'email' => 'daniel.martins@email.com',
                'password' => 'password',
            ],
            [
                'name' => 'Elena Ferreira',
                'email' => 'elena.ferreira@email.com',
                'password' => 'qwerty',
            ],
        ];

        foreach ($users as $userData) {
            User::create([
                'name' => $userData['name'],
                'email' => $userData['email'],
                'password' => Hash::make($userData['password']),
            ]);
        }
    }
}
