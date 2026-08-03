<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Genero;

class GeneroSeeder extends Seeder
{
    public function run(): void
    {
        $generos = ['Masculino', 'Femenino', 'Otro'];
        foreach ($generos as $genero) {
            Genero::create(['Genero' => $genero]);
        }
    }
}