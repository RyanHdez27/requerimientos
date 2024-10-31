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
        // Crear el rol de "Admin" si no existe
        $adminRole = Role::firstOrCreate(['name' => 'Admin']);

        // Lista de administradores a crear
        $admins = [
            [
                'name' => 'Administrador',
                'email' => 'administrador@gmail.com',
                'password' => '794613',
            ],
        ];

        foreach ($admins as $adminData) {
            // Crea o encuentra el usuario administrador
            $user = User::firstOrCreate(
                ['email' => $adminData['email']],
                [
                    'name' => $adminData['name'],
                    'password' => Hash::make($adminData['password']),
                ]
            );

            // Asigna el rol "Admin" al usuario
            $user->assignRole($adminRole);
        }
    }
}
