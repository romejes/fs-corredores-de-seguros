<?php

namespace Tests\Feature\CotizacionVehiculoTodoRiesgo;

use Tests\TestCase;
use App\Models\Solicitud;
use App\Models\EstadoSolicitud;
use App\Models\DetalleCotizacionVtr;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class EditarTest extends TestCase
{
    use DatabaseTransactions, WithoutMiddleware;

    public function testPasarAEstadoAtendido()
    {
        $solicitudEnEspera = factory(Solicitud::class)->states("en_espera")->create();

        $compraSoat = factory(DetalleCotizacionVtr::class)->create([
            "IdSolicitud" => $solicitudEnEspera->IdSolicitud
        ]);

        $response = $this->json("PUT", "cotizaciones/vehiculo_todo_riesgo/{$compraSoat->solicitud->Codigo}", [
            "rechazar" => false
        ]);
        $response->assertStatus(200);
        $response->assertJsonStructure([
            "data",
            "statusCode"
        ]);

        $this->assertDatabaseHas("Solicitud", [
            "IdSolicitud" => $solicitudEnEspera->IdSolicitud,
            "Codigo" => $solicitudEnEspera->Codigo,
            "IdEstadoSolicitud" => EstadoSolicitud::SOLICITUD_ATENDIDA
        ]);
    }

    public function testRechazarSolicitud()
    {
        $solicitudEnEspera = factory(Solicitud::class)->states("en_espera")->create();

        $compraSoat = factory(DetalleCotizacionVtr::class)->create([
            "IdSolicitud" => $solicitudEnEspera->IdSolicitud
        ]);

        $response = $this->json("PUT", "cotizaciones/vehiculo_todo_riesgo/{$compraSoat->solicitud->Codigo}", [
            "rechazar" => true
        ]);
        $response->assertStatus(200);
        $response->assertJsonStructure([
            "data",
            "statusCode"
        ]);

        $this->assertDatabaseHas("Solicitud", [
            "IdSolicitud" => $solicitudEnEspera->IdSolicitud,
            "Codigo" => $solicitudEnEspera->Codigo,
            "IdEstadoSolicitud" => EstadoSolicitud::SOLICITUD_RECHAZADA
        ]);
    }

    public function testNoRechazarSolicitudYaAtendido()
    {
        $solicitudEnEspera = factory(Solicitud::class)->states("atendido")->create();

        $compraSoat = factory(DetalleCotizacionVtr::class)->create([
            "IdSolicitud" => $solicitudEnEspera->IdSolicitud
        ]);

        $response = $this->json("PUT", "cotizaciones/vehiculo_todo_riesgo/{$compraSoat->solicitud->Codigo}", [
            "rechazar" => true
        ]);
        $response->assertStatus(422);

        $this->assertDatabaseHas("Solicitud", [
            "IdSolicitud" => $solicitudEnEspera->IdSolicitud,
            "Codigo" => $solicitudEnEspera->Codigo,
            "IdEstadoSolicitud" => EstadoSolicitud::SOLICITUD_ATENDIDA
        ]);
    }
}
