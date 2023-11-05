<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Carrera;
use App\Models\Facultad;
use App\Models\Personal;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(rolSeeder::class);
        $this->call(userSeeder::class);
        $this->call(CategoriaSeeder::class);
        // \App\Models\User::factory(10)->create();

        $facultades = [
            [
                'nombre' => 'INGENIERIA',
            ],
            [
                'nombre' => 'TEOLOGIA',
            ],
            [
                'nombre' => 'SALUD',
            ],
        ];
    
        foreach ($facultades as $facultad) {
            Facultad::create($facultad);
        }

        $carreras = [
            [
                'nombre' => 'INGENIERIA DE SISTEMAS',
                'facultad_id' => '1',
            ],
            [
                'nombre' => 'TEOLOGIA',
                'facultad_id' => '2',
            ],
            [
                'nombre' => 'FARMACIA',
                'facultad_id' => '3',
            ],
        ];
    
        foreach ($carreras as $carrera) {
            Carrera::create($carrera);
        }

        $personals = [
            [
                'nombre' => 'MARKETING',
            ],
            [
                'nombre' => 'LIMPIEZA',
            ],
            [
                'nombre' => 'RECURSOS HUMANOS',
            ],
        ];
    
        foreach ($personals as $personal) {
            Personal::create($personal);
        }
    }
}
