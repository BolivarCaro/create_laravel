<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class RegistroFormTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Prueba que la vista de registro carga correctamente.
     *
     * @return void
     */
    public function test_formulario_de_registro_carga_correctamente()
    {
        $response = $this->get('/registro');

        $response->assertStatus(200);
        $response->assertSee('Nombre');
        $response->assertSee('Apellido');
        $response->assertSee('Edad');
        $response->assertSee('Documento');
        $response->assertSee('Email');
        $response->assertSee('Cargar imagen');
    }

    /**
     * Prueba que se muestra un error cuando el nombre es inválido.
     *
     * @return void
     */
    public function test_nombre_invalido_muestra_error()
    {
        $response = $this->post('/registro', [
            'nombre' => '1234', // Valor no válido
            'apellido' => 'Perez',
            'edad' => 30,
            'documento' => '12345678',
            'email' => 'test@example.com',
            'imagen' => null
        ]);

        $response->assertSessionHasErrors('nombre');
        $response->assertStatus(302); // Redirige después de la validación fallida
    }

    /**
     * Prueba que se muestra un error cuando el email es inválido.
     *
     * @return void
     */
    public function test_email_invalido_muestra_error()
    {
        $response = $this->post('/registro', [
            'nombre' => 'Juan',
            'apellido' => 'Perez',
            'edad' => 30,
            'documento' => '12345678',
            'email' => 'invalid-email', // Valor no válido
            'imagen' => null
        ]);

        $response->assertSessionHasErrors('email');
        $response->assertStatus(302); // Redirige después de la validación fallida
    }

    /**
     * Prueba que un registro válido se guarda en la base de datos.
     *
     * @return void
     */
    public function test_registro_valido_se_guarda_en_base_de_datos()
    {
        $response = $this->post('/registro', [
            'nombre' => 'Juan',
            'apellido' => 'Perez',
            'edad' => 30,
            'documento' => '12345678',
            'email' => 'juan.perez@example.com',
            'imagen' => null
        ]);

        $response->assertStatus(302); // Redirige después de una inserción exitosa
        $this->assertDatabaseHas('registros', [
            'nombre' => 'Juan',
            'apellido' => 'Perez',
            'edad' => 30,
            'documento' => '12345678',
            'email' => 'juan.perez@example.com'
        ]);
    }
}
