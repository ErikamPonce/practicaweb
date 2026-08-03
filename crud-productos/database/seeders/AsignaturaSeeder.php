<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Asignatura;

class AsignaturaSeeder extends Seeder
{
    public function run(): void
    {
        $asignaturas = [
            ['Nombre' => 'Programación Web', 'HorasTotales' => 80],
            ['Nombre' => 'Bases de Datos', 'HorasTotales' => 60],
            ['Nombre' => 'Matemáticas', 'HorasTotales' => 100],
            ['Nombre' => 'Inglés', 'HorasTotales' => 40],
            ['Nombre' => 'Redes', 'HorasTotales' => 70],
        ];
        
        foreach ($asignaturas as $asignatura) {
            Asignatura::create($asignatura);
        }
    }
}