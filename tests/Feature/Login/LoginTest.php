<?php

namespace Tests\Feature\Login;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;

class LoginTest extends TestCase
{
    use WithoutMiddleware;

    public function testLoginExitoso()
    {
        $response = $this->json("POST", "login", [
            "usuario" => "fsca",
            "contrasena" => "fsca"
        ]);
        $response->assertStatus(200);
    }

    public function testUsuarioIncorrecto()
    {
        $response = $this->json("POST", "login", [
            "usuario" => "admin",
            "contrasena" => "fsca"
        ]);

        $response->assertStatus(404);
    }

    public function testErroresValidacion()
    {
        $response = $this->json("POST", "login", [
            "usuario" => "",
            "contrasena" => ""
        ]);

        $response->assertStatus(400);
    }
}
