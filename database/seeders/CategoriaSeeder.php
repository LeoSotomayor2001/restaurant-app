<?php

namespace Database\Seeders;

use App\Models\Categoria;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategoriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $categorias = [
            ['nombre' => 'Plato principal'],
            ['nombre' => 'Entrada'],
            ['nombre' => 'Bebida'],
            ['nombre' => 'Postre'],
            ['nombre' => 'Complemento'],
            // Agrega más categorías aquí
        ];

        foreach ($categorias as $categoria) {
            Categoria::create($categoria);
        }
    }

}
