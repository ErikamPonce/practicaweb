<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Personal;

class PersonalSeeder extends Seeder
{
    public function run(): void
    {
        Personal::create([
            'IdDatosP' => 1,
            'IdTipo' => 1,
            'ClaveEmp' => 'EMP001',
            'Status' => true,
        ]);
        
        Personal::create([
            'IdDatosP' => 2,
            'IdTipo' => 2,
            'ClaveEmp' => 'EMP002',
            'Status' => true,
        ]);
    }
}