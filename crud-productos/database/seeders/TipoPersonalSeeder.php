<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\TipoPersonal;

class TipoPersonalSeeder extends Seeder
{
    public function run(): void
    {
        $tipos = ['Docente', 'Administrativo', 'Directivo', 'Intendencia'];
        foreach ($tipos as $tipo) {
            TipoPersonal::create(['Nombre' => $tipo]);
        }
    }
}