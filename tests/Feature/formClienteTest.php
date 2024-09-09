<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class FormClienteTest extends TestCase
{
    /**@test*/
    public function test_formulario_de_solicitud_de_envio_puede_ser_enviado_correctamente(): void
    {
        $response = $this->post('/RecipientData' , [
            'nombre' => 'Juan',
            'apellido' => 'Pérez',
            'document_type' => 'cc',
            'document' => '1234567890',
            'email' => 'juan@example.com',
            'telefono' => '1234567890',
            'direccion' => 'calle falsa 123',
            'ciudad' => 'Bogota',
            'departamento' => 'Cundinamarca',
            'codigo_postal' => '111111',
            'fecha_recoleccion' => '2024-09-10',
            'hora_recogida' => 'manana',
            'observaciones' => 'ninguna',
            'id_cliente' => '1'


        ]);

        $response->assertRedirect('/RecipientData');
        $this->assertDatabaseHas('recipients', [
            'nombre' => 'Juan',
            'apellido' => 'Pérez',
            'document_type' => 'cc',
            'document' => '1234567890',
            'email' => 'juan@example.com',
            'telefono' => '1234567890',
            'direccion' => 'calle falsa 123',
            'ciudad' => 'Bogota',
            'departamento' => 'Cundinamarca',
            'codigo_postal' => '111111',
            'fecha_recoleccion' => '2024-09-10',
            'hora_recogida' => 'manana',
            'observaciones' => 'ninguna',

        ]);

    }

    public function test_formulario_de_solicitud_de_envio_muestra_errores_de_validacion()
    {
        $response = $this->post('/RecipientData', [
            // Datos faltantes para provocar errores de validación
        ]);

        $response->assertSessionHasErrors([
            'nombre',
            'apellido',
            'document_type',
            'document',
            'email',
            'telefono',
            'direccion',
            'ciudad',
            'departamento',
            'codigo_postal',
            'fecha_recoleccion',
            'hora_recogida'
        ]);
    }

     /** @test */
     public function test_nombre_del_destinatario_es_requerido()
     {
         $response = $this->post('/RecipientData', [
             'apellido' => 'Pérez',
             'document_type' => 'cc',
             'document' => '1234567890',
             'email' => 'juan@example.com',
             'telefono' => '1234567890',
             'direccion' => 'Calle Falsa 123',
             'ciudad' => 'Bogotá',
             'departamento' => 'Cundinamarca',
             'codigo_postal' => '111111',
             'fecha_recoleccion' => '2024-09-10',
             'hora_recogida' => 'manana',
             'observaciones' => 'Ninguna'
         ]);

         $response->assertSessionHasErrors('nombre');
     }

     /** @test */
    public function test_email_del_destinatario_debe_ser_valido()
    {
        $response = $this->post('/RecipientData', [
            'nombre' => 'Juan',
            'apellido' => 'Pérez',
            'document_type' => 'cc',
            'document' => '1234567890',
            'email' => 'invalid-email',
            'telefono' => '1234567890',
            'direccion' => 'Calle Falsa 123',
            'ciudad' => 'Bogotá',
            'departamento' => 'Cundinamarca',
            'codigo_postal' => '111111',
            'fecha_recoleccion' => '2024-09-10',
            'hora_recogida' => 'manana',
            'observaciones' => 'Ninguna'
        ]);

        $response->assertSessionHasErrors('email');
    }

     /** @test */
     public function test_fecha_de_recoleccion_debe_ser_futura()
     {
         $response = $this->post('/RecipientData', [
             'nombre' => 'Juan',
             'apellido' => 'Pérez',
             'document_type' => 'cc',
             'document' => '1234567890',
             'email' => 'juan@example.com',
             'telefono' => '1234567890',
             'direccion' => 'Calle Falsa 123',
             'ciudad' => 'Bogotá',
             'departamento' => 'Cundinamarca',
             'codigo_postal' => '111111',
             'fecha_recoleccion' => '2024-10-09',
             'hora_recogida' => 'manana',
             'observaciones' => 'Ninguna'
         ]);

         $response->assertSessionHasErrors('fecha_recoleccion');
     }

     /** @test */
    public function telefono_debe_ser_numerico()
    {
        $response = $this->post('/RecipientData', [
            'nombre' => 'Juan',
            'apellido' => 'Pérez',
            'document_type' => 'cc',
            'document' => '1234567890',
            'email' => 'juan@example.com',
            'telefono' => 'no-numerico', // Valor no numérico
            'direccion' => 'Calle Falsa 123',
            'ciudad' => 'Bogotá',
            'departamento' => 'Cundinamarca',
            'codigo_postal' => '111111',
            'fecha_recoleccion' => '2023-09-10',
            'hora_recogida' => 'manana',
            'observaciones' => 'Ninguna'
        ]);

        $response->assertSessionHasErrors('telefono');
    }

}
