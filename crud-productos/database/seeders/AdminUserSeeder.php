<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{
    /**
     * Crea el primer usuario Administrador a partir de variables de entorno.
     *
     * Configura ADMIN_EMAIL y ADMIN_PASSWORD en tu archivo .env antes de
     * ejecutar este seeder. Si no se definen, el seeder no crea ningún
     * usuario (para evitar credenciales por defecto conocidas).
     */
    public function run(): void
    {
        $email = env('ADMIN_EMAIL');
        $password = env('ADMIN_PASSWORD');

        if (! $email || ! $password) {
            $this->command?->warn(
                'AdminUserSeeder: define ADMIN_EMAIL y ADMIN_PASSWORD en tu .env para crear el usuario administrador inicial. Se omitió la creación.'
            );

            return;
        }

        $role = Role::where('tipo', 'Administrador')->firstOrFail();

        $user = User::firstOrCreate(
            ['email' => mb_strtolower(trim($email))],
            [
                'name' => 'Administrador',
                'password' => Hash::make($password),
                'role_id' => $role->id,
            ]
        );

        if ($user->wasRecentlyCreated) {
            $this->command?->info("Usuario administrador creado: {$user->email}");
        } else {
            $this->command?->info("El usuario administrador ya existía: {$user->email}");
        }
    }
}
