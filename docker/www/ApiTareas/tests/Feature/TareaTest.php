<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Tarea;
use App\Models\User;
use App\Models\Etiqueta;


class TareaTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     */

    public function test_obtener_listado_de_tareas()
    {
        $user = User::create([
            'name' => 'test',
            'email' => 'test@gmail.com',
            'password' => bcrypt('password'),
        ]);

        $response = $this->actingAs($user)->withSession(['banned' => false])->get('/api/tareas');

        $response->assertStatus(200);
    }

    public function test_creacion_de_tarea()
    {
        $user = User::create([
            'name' => 'test',
            'email' => 'test@gmail.com',
            'password' => bcrypt('password'),
        ]);
    
        $this->actingAs($user);
    
        $etiquetaId = Etiqueta::create([
            'nombre' => 'Nombre ',
        ])->id;
    
        $datosTarea = [
            'titulo' => 'Título de la tarea',
            'descripcion' => 'Descripción de la tarea',
            'etiqueta' => $etiquetaId,
        ];
    
        $response = $this->post('/api/tareas', $datosTarea);
    
        $this->assertDatabaseHas('tareas', [
            'titulo' => 'Título de la tarea',
            'descripcion' => 'Descripción de la tarea',
        ]);
    
        $response->assertStatus(201);
    }

    public function test_obtener_una_tarea()
    {
        $user = User::create([
            'name' => 'test',
            'email' => 'test@gmail.com',
            'password' => bcrypt('password'),
        ]);
        
        $tarea = Tarea::create([
            'titulo' => 'Título de la tarea',
            'descripcion' => 'Descripción de la tarea',
        ]);
    
        $response = $this->actingAs($user)->get('/api/tareas/' . $tarea->id);
    
        $response->assertStatus(200);
    
        $response->assertJsonFragment([
            'id' => $tarea->id,
            'titulo' => 'Titulo: ' . $tarea->titulo, 
            'descripcion' => 'Desc: ' . $tarea->descripcion, 

        ]);
    }

    public function test_actualizar_una_tarea()
    {
        $user = User::create([
            'name' => 'test',
            'email' => 'test@gmail.com',
            'password' => bcrypt('password'),
        ]);
    
        $etiqueta = Etiqueta::create(['nombre' => 'Etiqueta']);
    
        $tarea = Tarea::create([
            'titulo' => 'Título de la tarea',
            'descripcion' => 'Descripción de la tarea',
        ]);
    
        $datosActualizados = [
            'titulo' => 'Nuevo título de la tarea',
            'descripcion' => 'Nueva descripción de la tarea',
            'etiqueta' => $etiqueta->id, 
        ];
    
        $response = $this->actingAs($user)->put('/api/tareas/' . $tarea->id, $datosActualizados);
    
        $response->assertStatus(200);
    
        $this->assertDatabaseHas('tareas', [
            'id' => $tarea->id,
            'titulo' => 'Nuevo título de la tarea',
            'descripcion' => 'Nueva descripción de la tarea',
        ]);
    
    }

    public function test_eliminar_una_tarea()
    {
        $user = User::create([
            'name' => 'test',
            'email' => 'test@gmail.com',
            'password' => bcrypt('password'),
        ]);

        $tarea = Tarea::create([
            'titulo' => 'Título de la tarea a eliminar',
            'descripcion' => 'Descripción de la tarea a eliminar',
        ]);

        $response = $this->actingAs($user)->delete('/api/tareas/' . $tarea->id);

        $response->assertStatus(200);

        $this->assertDatabaseMissing('tareas', [
            'id' => $tarea->id,
        ]);
    }

}
