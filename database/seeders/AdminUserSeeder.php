<?php

namespace Database\Seeders;

use App\Models\User;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Seeder;

class AdminUserSeeder extends Seeder
{
    public function run()
    {
        // Lista de administradores
        $admins = [
            [
                'name' => 'Administrador',
                'email' => 'administrador@gmail.com',
                'password' => '794613',
            ],

        ];

        foreach ($admins as $adminData) {
            // Crea o busca el usuario admin
            $user = User::firstOrCreate(
                ['email' => $adminData['email']],
                [
                    'name' => $adminData['name'],
                    'password' => Hash::make($adminData['password']),
                ]
            );

            // Asigna el rol de admin al que se ingrese en la funcion
            $user->assignRole('Admin');
        }
    }
}


