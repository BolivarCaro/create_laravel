<?php

/* namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;

class LoginRedirectTest extends TestCase
{
    use RefreshDatabase;

    public function testUserIsRedirectedAfterLogin(): void
    {
        // Crea un usuario
        $user = User::factory()->create([
            'password' => bcrypt($password = 'password123'),
        ]);

        // Intenta iniciar sesión con el usuario creado
        $response = $this->post('/login', [
            'email' => $user->email,
            'password' => $password,
        ]);

        // Verifica que el usuario es redirigido al dashboard
        $response->assertRedirect('/dashboard');
    }
} */

