<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;

class LoginTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     */
    public function test_register_usuario()
    {
        $user = [
            'name' => 'test',
            'email' => 'test@gmail.com',
            'password' => '1234',
        ];

        $response = $this->postJson('api/register', $user);
        $response->assertStatus(200)
                ->assertJsonStructure(['data', 'acces_token', 'token_type']);
    }

    public function test_login_usuario()
    {
        $user = User::create([
            'name' => 'test',
            'email' => 'test@gmail.com',
            'password' => bcrypt('password'),
        ]);

        $loginData = [
            'email' => $user->email,
            'password' => 'password', 
        ];

        $response = $this->postJson('api/login', $loginData);
        $response->assertStatus(200)
                ->assertJsonStructure(['message', 'acces_token', 'token_type']);
    }

    public function test_logout_usuario()
    {
        $user = User::create([
            'name' => 'test',
            'email' => 'test@gmail.com',
            'password' => bcrypt('password'),
        ]);

        $token = $user->createToken('auth_token')->plainTextToken;

        $this->actingAs($user)->assertAuthenticated();

        $response = $this->actingAs($user)->withToken($token)->getJson('api/logout');
        $response->assertStatus(200)
                ->assertJson(['message' => 'Sesion cerrada correctamente']);
    }
}
