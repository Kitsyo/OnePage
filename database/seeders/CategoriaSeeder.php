<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Categoria;

class CategoriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Categoria::create([
            'nombre' => 'Romance Dawn'
        ]);
        Categoria::create([
            'nombre' => 'Orange Town'
        ]);
        Categoria::create([
            'nombre' => 'Villa Syrup'
        ]);
        Categoria::create([
            'nombre' => 'Baratie'
        ]);
        Categoria::create([
            'nombre' => 'Arlong Park'
        ]);
        Categoria::create([
            'nombre' => 'Loguetown'
        ]);
        Categoria::create([
            'nombre' => 'Dragón Milenario'
        ]);
    }
}
