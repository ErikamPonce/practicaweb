<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Municipio;

class MunicipioSeeder extends Seeder
{
    public function run(): void
    {
        $municipios = [
            ['Nombre' => 'Guadalajara', 'IdEstado' => 1],
            ['Nombre' => 'Zapopan', 'IdEstado' => 1],
            ['Nombre' => 'Monterrey', 'IdEstado' => 2],
            ['Nombre' => 'Benito Juárez', 'IdEstado' => 3],
            ['Nombre' => 'Mérida', 'IdEstado' => 4],
        ];
        
        foreach ($municipios as $municipio) {
            Municipio::create($municipio);
        }
    }
}