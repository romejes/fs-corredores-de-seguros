<?php

namespace Tests\Feature\CotizacionVehiculoTodoRiesgo;

use Tests\TestCase;
use App\Models\Solicitud;
use App\Models\TipoDocumentoIdentidad;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\WithoutMiddleware;

class RegistrarTest extends TestCase
{
    use DatabaseTransactions, WithoutMiddleware;

    public function testRegistroExitosoPersonaNatural()
    {
        $payload = [
            "tipo_cliente" => "N",
            "nombres" => "Jesus",
            "apellido_paterno" => "Romero",
            "apellido_materno" => "Ramos",
            "tipo_documento_identidad" => 1,
            "numero_documento_identidad" => "45747712",
            "telefono" => "931850406",
            "correo" => "rome.jes.1@gmail.com",
            "anio_vehiculo" => "2001",
            "placa" => "MF-5981",
            "asientos" => 10,
            "uso" => "Transporte de Personal",
            "clase_vehiculo" => 5,
            "marca" => "Toyota",
            "modelo" => "Corolla",
            "costo" => 15000,
            "compania_seguro" => "La Positiva",
        ];
        $response = $this->json("POST", "cotizaciones/seguro_vehicular", $payload);
        $response->assertStatus(201);

        $this->assertEquals(201, $response->getData()->statusCode);

        $expectedCodigo = date("Ymd") . "-00001";
        $this->assertDatabaseHas("Solicitud", [
            "Tipo" => Solicitud::TIPO_SOLICITUD_COTIZACION,
            "Codigo" => $expectedCodigo
        ]);

        $this->assertDatabaseHas("DetalleCotizacionVtr", [
            "IdSolicitud" => $response->getData()->data->solicitud->id,
            "TipoCliente" => "N",
            "Nombres" => $payload["nombres"],
            "ApellidoPaterno" => $payload["apellido_paterno"],
            "ApellidoMaterno" => $payload["apellido_materno"],
            "Telefono" => $payload["telefono"],
            "Email" => $payload["correo"],
            "IdTipoDocumentoIdentidad" => 1,
            "NumeroDocumentoIdentidad" => $payload["numero_documento_identidad"],
            "Placa" => $payload["placa"],
            "Asientos" => $payload["asientos"],
            "Uso" => $payload["uso"],
            "AnioVehiculo" => $payload["anio_vehiculo"],
            "IdClaseVehiculo" => $payload["clase_vehiculo"],
            "Marca" => $payload["marca"],
            "Modelo" => $payload["modelo"],
            "CostoVehiculo" => $payload["costo"],
            "CompaniaSeguro" => $payload["compania_seguro"]
        ]);
    }

    public function testRegistroExitosoPersonaJuridica()
    {
        $payload = [
            "tipo_cliente" => "J",
            "razon_social" => "YouStudio SA",
            "tipo_documento_identidad" => TipoDocumentoIdentidad::RUC,
            "numero_documento_identidad" => "45747712",
            "telefono" => "931850406",
            "correo" => "rome.jes.1@gmail.com",
            "anio_vehiculo" => "2001",
            "placa" => "MF-5981",
            "asientos" => 10,
            "uso" => "Transporte de Personal",
            "clase_vehiculo" => 5,
            "marca" => "Toyota",
            "modelo" => "Corolla",
            "costo" => 15000,
            "compania_seguro" => "La Positiva",
        ];
        $response = $this->json("POST", "cotizaciones/seguro_vehicular", $payload);
        $response->assertStatus(201);

        $this->assertEquals(201, $response->getData()->statusCode);

        $expectedCodigo = date("Ymd") . "-00001";
        $this->assertDatabaseHas("Solicitud", [
            "Tipo" => Solicitud::TIPO_SOLICITUD_COTIZACION,
            "Codigo" => $expectedCodigo
        ]);

        $this->assertDatabaseHas("DetalleCotizacionVtr", [
            "IdSolicitud" => $response->getData()->data->solicitud->id,
            "TipoCliente" => "J",
            "Nombres" => null,
            "ApellidoPaterno" => null,
            "ApellidoMaterno" => null,
            "RazonSocial" => $payload["razon_social"],
            "Telefono" => $payload["telefono"],
            "Email" => $payload["correo"],
            "IdTipoDocumentoIdentidad" => TipoDocumentoIdentidad::RUC,
            "NumeroDocumentoIdentidad" => $payload["numero_documento_identidad"],
            "Placa" => $payload["placa"],
            "Asientos" => $payload["asientos"],
            "Uso" => $payload["uso"],
            "AnioVehiculo" => $payload["anio_vehiculo"],
            "IdClaseVehiculo" => $payload["clase_vehiculo"],
            "Marca" => $payload["marca"],
            "Modelo" => $payload["modelo"],
            "CostoVehiculo" => $payload["costo"],
            "CompaniaSeguro" => $payload["compania_seguro"]
        ]);
    }

    public function testErroresValidacion()
    {
        $payload = [
            "nombres" => "Jesus",
            "apellido_paterno" => "Romero",
            "apellido_materno" => "Ramos",
            "tipo_documento_identidad" => 1,
            "numero_documento_identidad" => "45747712",
            "telefono" => "931850406",
            "correo" => "rome.jes.1gmail.com",
            "anio_vehiculo" => "5400",
            "placa" => "MF-5981",
            "asientos" => "as0",
            "uso" => "TransportedPersonal",
            "clase_vehiculo" => 5,
            "marca" => "Toyota",
            "modelo" => "Corolla",
            "costo" => 0,
            "compania_seguro" => "Cualquiera",
        ];
        $response = $this->json("POST", "cotizaciones/seguro_vehicular", $payload);
        $response->assertStatus(400);

        $response->assertJsonStructure([
            "messages" => [
                "correo",
                "anio_vehiculo",
                "asientos",
                "uso",
                "costo",
                "compania_seguro"
            ]
        ]);
    }
}
