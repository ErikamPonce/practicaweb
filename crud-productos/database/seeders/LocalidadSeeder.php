<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Localidad;

class LocalidadSeeder extends Seeder
{
    public function run(): void
    {
        $localidades = [
            ['Nombre' => 'Centro', 'IdMunicipio' => 1],
            ['Nombre' => 'Andares', 'IdMunicipio' => 2],
            ['Nombre' => 'San Pedro', 'IdMunicipio' => 3],
            ['Nombre' => 'Polanco', 'IdMunicipio' => 4],
            ['Nombre' => 'Norte', 'IdMunicipio' => 5],
        ];
        
        foreach ($localidades as $localidad) {
            Localidad::create($localidad);
        }
    }
}