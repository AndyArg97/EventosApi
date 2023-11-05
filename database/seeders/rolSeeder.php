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
                'name' => 'admin',
                'display_name' => 'ADMINISTRADOR',
            ],
            [
                'name' => 'encargadoEventos',
                'display_name' => 'ENCARGADO DE EVENTOS',
            ],
            [
                'name' => 'participante',
                'display_name' => 'PARTICIPANTE',
            ],
            [
                'name' => 'observador',
                'display_name' => 'OBSERVADOR',
            ],
        ];

        foreach ($roles as $role) {
            Role::create($role);
        }
    }
}
