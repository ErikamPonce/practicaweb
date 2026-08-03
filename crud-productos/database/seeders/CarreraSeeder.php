<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Carrera;

class CarreraSeeder extends Seeder
{
    public function run(): void
    {
        $carreras = [
            ['NombreCarreras' => 'Ingeniería en Sistemas', 'Estatus' => true],
            ['NombreCarreras' => 'Licenciatura en Administración', 'Estatus' => true],
            ['NombreCarreras' => 'Contaduría Pública', 'Estatus' => true],
            ['NombreCarreras' => 'Ingeniería Industrial', 'Estatus' => true],
        ];
        
        foreach ($carreras as $carrera) {
            Carrera::create($carrera);
        }
    }
}