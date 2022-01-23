<?php

namespace Tests\Feature\CotizacionVehiculoTodoRiesgo;

use Tests\TestCase;
use App\Models\DetalleCotizacionVtr;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ObtenerTest extends TestCase
{
    use DatabaseTransactions, WithoutMiddleware;

    public function testObtenerSolicitudesConExito()
    {
        factory(DetalleCotizacionVtr::class, 4)->create();

        $response = $this->json("GET", "cotizaciones/vehiculo_todo_riesgo");
        $response->assertStatus(200);

        $this->assertEquals(200, $response->getData()->statusCode);
        $this->assertCount(4, $response->getData()->data);
    }

    public function testObtenerUnaSolicitud()
    {
        $compraSoat = factory(DetalleCotizacionVtr::class)->create();

        $response = $this->json("GET", "cotizaciones/vehiculo_todo_riesgo/{$compraSoat->solicitud->Codigo}");
        $response->assertStatus(200);
        $response->assertJsonStructure([
            "data",
            "statusCode"
        ]);

        $this->assertEquals(200, $response->getData()->statusCode);
    }

    public function testObtenerUnaSolicitudQueNoExiste()
    {
        factory(DetalleCotizacionVtr::class)->create();

        $response = $this->json("GET", "cotizaciones/vehiculo_todo_riesgo/1541");
        $response->assertStatus(404);
    }
}
