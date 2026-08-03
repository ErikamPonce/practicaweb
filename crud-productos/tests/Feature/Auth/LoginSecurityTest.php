<?php

namespace Tests\Feature\Auth;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;

class LoginSecurityTest extends TestCase
{
    use RefreshDatabase;

    public function test_login_accepts_trimmed_and_lowercased_email(): void
    {
        User::factory()->create([
            'name' => 'Usuario de prueba',
            'email' => 'test@example.com',
            'password' => Hash::make('password123'),
        ]);

        $response = $this->from('/login')->post('/login', [
            'email' => '  TEST@EXAMPLE.COM  ',
            'password' => 'password123',
        ]);

        $response->assertRedirect('/home');
        $this->assertAuthenticated();
    }
}
