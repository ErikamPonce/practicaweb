<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\DatosPersonales;

class DatosPersonalesSeeder extends Seeder
{
    public function run(): void
    {
        $personas = [
            ['Nombre' => 'Juan', 'ApellidoPaterno' => 'Pérez', 'ApellidoMaterno' => 'García', 'FechaNacimiento' => '2000-01-15', 'idGenero' => 1, 'Telefono' => '5551112233', 'Email' => 'juan@ejemplo.com', 'Calle' => 'Calle 1', 'NumE' => 10, 'idLocalidad' => 1, 'CP' => 44100],
            ['Nombre' => 'María', 'ApellidoPaterno' => 'López', 'ApellidoMaterno' => 'Martínez', 'FechaNacimiento' => '2001-05-20', 'idGenero' => 2, 'Telefono' => '5554445566', 'Email' => 'maria@ejemplo.com', 'Calle' => 'Calle 2', 'NumE' => 20, 'idLocalidad' => 2, 'CP' => 45000],
        ];
        
        foreach ($personas as $persona) {
            DatosPersonales::create($persona);
        }
    }
}