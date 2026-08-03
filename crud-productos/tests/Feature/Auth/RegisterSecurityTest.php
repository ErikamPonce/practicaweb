<?php

namespace Tests\Feature\Auth;

use App\Models\Role;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class RegisterSecurityTest extends TestCase
{
    use RefreshDatabase;

    public function test_registration_normalizes_email_and_assigns_user_role(): void
    {
        Role::create(['tipo' => 'Usuario']);

        $response = $this->post('/register', [
            'name' => '  Ana López  ',
            'email' => '  ANA@EXAMPLE.COM  ',
            'password' => 'password123',
            'password_confirmation' => 'password123',
        ]);

        $response->assertStatus(302);

        $user = User::query()->first();
        $this->assertNotNull($user);
        $this->assertSame('ana@example.com', $user?->email);
        $this->assertSame('Ana López', $user?->name);
        $this->assertSame('Usuario', $user?->role?->tipo);
    }
}
