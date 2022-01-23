<?php

namespace Tests\Feature\CotizacionSoat;

use App\Models\DetalleCotizacionSoat;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ObtenerTest extends TestCase
{
    use DatabaseTransactions, WithoutMiddleware;

    public function testObtenerSolicitudesConExito()
    {
        factory(DetalleCotizacionSoat::class, 4)->states('tiene_soat')->create();
        factory(DetalleCotizacionSoat::class, 5)->states('no_tiene_soat')->create();

        $response = $this->json("GET", "cotizaciones/soat");
        $response->assertStatus(200);

        $this->assertEquals(200, $response->getData()->statusCode);
        $this->assertCount(9, $response->getData()->data);
    }

    public function testObtenerUnaSolicitud()
    {
        $compraSoat = factory(DetalleCotizacionSoat::class)->states('tiene_soat')->create();

        $response = $this->json("GET", "cotizaciones/soat/{$compraSoat->solicitud->Codigo}");
        $response->assertStatus(200);
        $response->assertJsonStructure([
            "data",
            "statusCode"
        ]);

        $this->assertEquals(200, $response->getData()->statusCode);
    }

    public function testObtenerUnaSolicitudQueNoExiste()
    {
        factory(DetalleCotizacionSoat::class)->states('tiene_soat')->create();

        $response = $this->json("GET", "cotizaciones/soat/1541");
        $response->assertStatus(404);
    }
}
