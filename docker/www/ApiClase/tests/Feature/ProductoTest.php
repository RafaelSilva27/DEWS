<?php

namespace Tests\Feature;

// use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\Producto;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ProductoTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic test example.
     */
    public function test_example(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    public function test_get_productos()
    {
        $producto = new Producto();
        $producto->nombre = 'Producto 1';
        $producto->descripcion = 'Descripcion 1';
        $producto->save();

        $response = $this->get('api/productos');
        $response->assertStatus(200);

        $response->assertJsonFragment([
          'id' => $producto->id,
            'nombre' => 'Nombre: ' . $producto->nombre,
            'descripcion' => 'Desc: ' . $producto->descripcion,
            'precio' => 'Precio: ',
            'categorias' => $producto->categoria
        ]);
    }
}
