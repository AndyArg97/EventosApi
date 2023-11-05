<?php

namespace Database\Seeders;
use App\Models\Categoria;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategoriaSeeder extends Seeder
{
    public function run(): void
    {
        $categorias = [
            [
                'tipo_categoria' => 'FACULTATIVO',
                'color' => 'success',
            ],
            [
                'tipo_categoria' => 'CARRERAS',
                'color' => 'danger',
            ],
            [
                'tipo_categoria' => 'PERSONAL',
                'color' => 'primary',
            ],
        ];
    
        foreach ($categorias as $categoria) {
            Categoria::create($categoria);
        }
    }
}
