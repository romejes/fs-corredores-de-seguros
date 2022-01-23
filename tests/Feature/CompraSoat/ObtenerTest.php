<?php

namespace Tests\Feature\CompraSoat;

use Tests\TestCase;
use App\Models\DetalleCompraSoat;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ObtenerTest extends TestCase
{
    use DatabaseTransactions, WithoutMiddleware;

    public function testObtenerSolicitudesConExito()
    {
        factory(DetalleCompraSoat::class, 4)->states("adquisicion")->create();
        factory(DetalleCompraSoat::class, 3)->states("renovacion")->create();

        $response = $this->json("GET", "compras/soat");

        $response->assertStatus(200);

        $this->assertEquals(200, $response->getData()->statusCode);
        $this->assertCount(7, $response->getData()->data);
    }

    public function testObtenerUnaSolicitud()
    {
        $compraSoat = factory(DetalleCompraSoat::class)->states("adquisicion")->create();

        $response = $this->json("GET", "compras/soat/{$compraSoat->solicitud->Codigo}");
        $response->assertStatus(200);
        $response->assertJsonStructure([
            "data",
            "statusCode"
        ]);

        $this->assertEquals(200, $response->getData()->statusCode);
    }

    public function testObtenerUnaSolicitudQueNoExiste()
    {
        factory(DetalleCompraSoat::class)->states("adquisicion")->create();

        $response = $this->json("GET", "compras/soat/1541");
        $response->assertStatus(404);

        $response->assertJsonStructure([
            "statusCode",
            "message"
        ]);
    }
}
