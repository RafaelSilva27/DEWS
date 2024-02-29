<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;
use App\Models\Etiqueta;

class EtiquetaTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     */

    public function test_obtener_listado_de_etiquetas()
    {
        $user = User::create([
            'name' => 'test',
            'email' => 'test@gmail.com',
            'password' => bcrypt('password'),
        ]);

        $response = $this->actingAs($user)->get('/api/etiquetas');

        $response->assertStatus(200);
    }

    public function test_creacion_de_etiqueta()
    {
        $user = User::create([
            'name' => 'test',
            'email' => 'test@gmail.com',
            'password' => bcrypt('password'),
        ]);

        $this->actingAs($user);

        $datosEtiqueta = [
            'nombre' => 'Nombre',
        ];

        $response = $this->post('/api/etiquetas', $datosEtiqueta);

        $this->assertDatabaseHas('etiquetas', [
            'nombre' => 'Nombre',
        ]);

        $response->assertStatus(201);
    }

    public function test_obtener_una_etiqueta()
    {
        $user = User::create([
            'name' => 'test',
            'email' => 'test@gmail.com',
            'password' => bcrypt('password'),
        ]);

        $etiqueta = Etiqueta::create([
            'nombre' => 'Nombre',
        ]);

        $response = $this->actingAs($user)->get('/api/etiquetas/' . $etiqueta->id);

        $response->assertStatus(200);

        $response->assertJsonFragment([
            'id' => $etiqueta->id,
            'nombre' => 'Nombre: ' . $etiqueta->nombre,
        ]);
    }

    public function test_actualizar_una_etiqueta()
    {
        $user = User::create([
            'name' => 'test',
            'email' => 'test@gmail.com',
            'password' => bcrypt('password'),
        ]);

        $etiqueta = Etiqueta::create([
            'nombre' => 'Nombre',
        ]);

        $datosActualizados = [
            'nombre' => 'Nuevo',
        ];

        $response = $this->actingAs($user)->put('/api/etiquetas/' . $etiqueta->id, $datosActualizados);

        $response->assertStatus(200);

        $etiqueta->refresh();

        $this->assertEquals('Nuevo', $etiqueta->nombre);
    }

    public function test_eliminar_una_etiqueta()
    {
        $user = User::create([
            'name' => 'test',
            'email' => 'test@gmail.com',
            'password' => bcrypt('password'),
        ]);

        $etiqueta = Etiqueta::create([
            'nombre' => 'Nombre',
        ]);

        $response = $this->actingAs($user)->delete('/api/etiquetas/' . $etiqueta->id);

        $response->assertStatus(204);

        $this->assertDatabaseMissing('etiquetas', [
            'id' => $etiqueta->id,
        ]);
    }
}
