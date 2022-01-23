<?php

namespace Tests\Feature\CompraSoat;

use Tests\TestCase;
use App\Models\Solicitud;
use App\Models\EstadoSolicitud;
use App\Models\DetalleCompraSoat;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class EditarTest extends TestCase
{
    use DatabaseTransactions, WithoutMiddleware;

    public function testPasarAEstadoAtendido()
    {
        $solicitudEnEspera = factory(Solicitud::class)->states("en_espera")->create();

        $compraSoat = factory(DetalleCompraSoat::class)->states("adquisicion")->create([
            "IdSolicitud" => $solicitudEnEspera->IdSolicitud
        ]);

        $response = $this->put("compras/soat/{$compraSoat->solicitud->Codigo}", [
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

        $compraSoat = factory(DetalleCompraSoat::class)->states("adquisicion")->create([
            "IdSolicitud" => $solicitudEnEspera->IdSolicitud
        ]);

        $response = $this->put("compras/soat/{$compraSoat->solicitud->Codigo}", [
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

        $compraSoat = factory(DetalleCompraSoat::class)->states("adquisicion")->create([
            "IdSolicitud" => $solicitudEnEspera->IdSolicitud
        ]);

        $response = $this->put("compras/soat/{$compraSoat->solicitud->Codigo}", [
            "rechazar" => true
        ]);
        $response->assertStatus(422);
        $response->assertJsonStructure([
            "message",
            "statusCode"
        ]);

        $this->assertDatabaseHas("Solicitud", [
            "IdSolicitud" => $solicitudEnEspera->IdSolicitud,
            "Codigo" => $solicitudEnEspera->Codigo,
            "IdEstadoSolicitud" => EstadoSolicitud::SOLICITUD_ATENDIDA
        ]);
    }
}
