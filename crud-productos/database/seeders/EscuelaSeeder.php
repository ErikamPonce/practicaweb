<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Escuela;

class EscuelaSeeder extends Seeder
{
    public function run(): void
    {
        Escuela::create([
            'CCT' => '14PSU001',
            'Nombre' => 'Escuela Superior de Cómputo',
            'Telefono' => '5551234567',
            'Email' => 'escuela@ejemplo.com',
            'Calle' => 'Av. Principal',
            'NumE' => 123,
            'idLocalidad' => 1,
            'idMunicipio' => 1,
            'idEstado' => 1,
            'CP' => 44100,
        ]);
    }
}