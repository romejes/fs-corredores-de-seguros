<?php

namespace Tests\Feature\AfiliacionSeguroEstudiante;

use Tests\TestCase;
use App\Models\DetalleAfiliacionSeguroEstudiante;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ObtenerTest extends TestCase
{
    use DatabaseTransactions, WithoutMiddleware;

    public function testObtenerSolicitudesConExito()
    {
        factory(DetalleAfiliacionSeguroEstudiante::class, 10)->create();

        $response = $this->json("GET", "afiliaciones/seguro_estudiante");
        $response->assertStatus(200);

        $this->assertEquals(200, $response->getData()->statusCode);
        $this->assertCount(10, $response->getData()->data);
    }

    public function testObtenerUnaSolicitud()
    {
        $compraSoat = factory(DetalleAfiliacionSeguroEstudiante::class)->create();

        $response = $this->json("GET", "afiliaciones/seguro_estudiante/{$compraSoat->solicitud->Codigo}");
        $response->assertStatus(200);
        $response->assertJsonStructure([
            "data",
            "statusCode"
        ]);

        $this->assertEquals(200, $response->getData()->statusCode);
    }

    public function testObtenerUnaSolicitudQueNoExiste()
    {
        factory(DetalleAfiliacionSeguroEstudiante::class)->create();

        $response = $this->json("GET", "afiliaciones/seguro_estudiante/1541");
        $response->assertStatus(404);
    }
}
