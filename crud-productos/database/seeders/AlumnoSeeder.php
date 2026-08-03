<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Alumno;

class AlumnoSeeder extends Seeder
{
    public function run(): void
    {
        Alumno::create([
            'Matricula' => 'A2024001',
            'IdCarrera' => 1,
            'IdDatosP' => 1,
            'Status' => 'A',
        ]);
        
        Alumno::create([
            'Matricula' => 'A2024002',
            'IdCarrera' => 2,
            'IdDatosP' => 2,
            'Status' => 'A',
        ]);
    }
}