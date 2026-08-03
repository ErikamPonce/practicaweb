<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call([
            RoleSeeder::class,
            GeneroSeeder::class,
            EstadoSeeder::class,
            MunicipioSeeder::class,
            LocalidadSeeder::class,
            TipoPersonalSeeder::class,
            CarreraSeeder::class,
            AsignaturaSeeder::class,
            EscuelaSeeder::class,
            DatosPersonalesSeeder::class,
            AlumnoSeeder::class,
            PersonalSeeder::class,
            HorarioSeeder::class,
        ]);
    }
}