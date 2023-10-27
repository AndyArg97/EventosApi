<?php

namespace Database\Seeders;
use App\Models\Role;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class rolSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $roles = [
            [
                'nombre' => 'Administrador',
            ],
            [
                'nombre' => 'Encargado de Eventos',
            ],
            [
                'nombre' => 'Participante',
            ],
            [
                'nombre' => 'Observador',
            ],
        ];

        foreach ($roles as $role) {
            Role::create($role);
        }
    }
}
