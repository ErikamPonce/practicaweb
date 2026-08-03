<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Horario;

class HorarioSeeder extends Seeder
{
    public function run(): void
    {
        $horarios = [
            ['Dia' => 'Lunes', 'HorarioInicio' => '08:00:00', 'HorarioFin' => '10:00:00', 'Aula' => 'A101'],
            ['Dia' => 'Martes', 'HorarioInicio' => '10:00:00', 'HorarioFin' => '12:00:00', 'Aula' => 'B202'],
            ['Dia' => 'Miércoles', 'HorarioInicio' => '14:00:00', 'HorarioFin' => '16:00:00', 'Aula' => 'C303'],
        ];
        
        foreach ($horarios as $horario) {
            Horario::create($horario);
        }
    }
}