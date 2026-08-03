<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Estado;

class EstadoSeeder extends Seeder
{
    public function run(): void
    {
        $estados = ['Jalisco', 'Nuevo León', 'CDMX', 'Yucatán', 'Puebla'];
        foreach ($estados as $estado) {
            Estado::create(['Nombre' => $estado]);
        }
    }
}