<?php

namespace Tests\Feature\CotizacionSoat;

use Tests\TestCase;
use App\Models\Solicitud;
use App\Models\TipoDocumentoIdentidad;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class RegistrarTest extends TestCase
{
    use DatabaseTransactions, WithoutMiddleware;

    public function testRegistroCotizacionPersonaNaturalQueTieneSoat()
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
            "compania_seguro" => "La Positiva",
            "tiene_soat" => true,
            "fecha_vencimiento" => "2020-05-15"
        ];
        $response = $this->json("POST", "cotizaciones/soat", $payload);
        $response->assertStatus(201);

        $this->assertEquals(201, $response->getData()->statusCode);

        $expectedCodigo = date("Ymd") . "-00001";
        $this->assertDatabaseHas("Solicitud", [
            "Tipo" => Solicitud::TIPO_SOLICITUD_COTIZACION,
            "Producto" => Solicitud::PRODUCTO_SOAT,
            "Codigo" => $expectedCodigo
        ]);

        $this->assertDatabaseHas("DetalleCotizacionSoat", [
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
            "CompaniaSeguro" => $payload["compania_seguro"],
            "TieneSoat" => true,
            "RazonSocial" => null,
            "FechaVencimiento" => "2020-05-15"
        ]);
    }

    public function testRegistroCotizacionPersonaNaturalQueNoTieneSoat()
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
            "compania_seguro" => "La Positiva",
            "tiene_soat" => 0,
            "fecha_vencimiento" => "2020-05-15"
        ];
        $response = $this->json("POST", "cotizaciones/soat", $payload);
        $response->assertStatus(201);

        $this->assertEquals(201, $response->getData()->statusCode);

        $expectedCodigo = date("Ymd") . "-00001";
        $this->assertDatabaseHas("Solicitud", [
            "Tipo" => Solicitud::TIPO_SOLICITUD_COTIZACION,
            "Producto" => Solicitud::PRODUCTO_SOAT,
            "Codigo" => $expectedCodigo
        ]);

        $this->assertDatabaseHas("DetalleCotizacionSoat", [
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
            "CompaniaSeguro" => $payload["compania_seguro"],
            "TieneSoat" => false,
            "RazonSocial" => null,
            "FechaVencimiento" => null
        ]);
    }

    public function testRegistroCotizacionPersonaJuridicaQueTieneSoat()
    {
        $payload = [
            "tipo_cliente" => "J",
            "razon_social" => "Una empresa SAC",
            "tipo_documento_identidad" => TipoDocumentoIdentidad::RUC,
            "numero_documento_identidad" => "45747712",
            "telefono" => "931850406",
            "correo" => "rome.jes.1@gmail.com",
            "anio_vehiculo" => "2001",
            "placa" => "MF-5981",
            "asientos" => 10,
            "uso" => "Transporte de Personal",
            "compania_seguro" => "La Positiva",
            "tiene_soat" => true,
            "fecha_vencimiento" => "2020-05-15"
        ];
        $response = $this->json("POST", "cotizaciones/soat", $payload);
        $response->assertStatus(201);

        $this->assertEquals(201, $response->getData()->statusCode);

        $expectedCodigo = date("Ymd") . "-00001";
        $this->assertDatabaseHas("Solicitud", [
            "Tipo" => Solicitud::TIPO_SOLICITUD_COTIZACION,
            "Producto" => Solicitud::PRODUCTO_SOAT,
            "Codigo" => $expectedCodigo
        ]);

        $this->assertDatabaseHas("DetalleCotizacionSoat", [
            "IdSolicitud" => $response->getData()->data->solicitud->id,
            "TipoCliente" => "J",
            "Nombres" => null,
            "ApellidoPaterno" => null,
            "ApellidoMaterno" => null,
            "RazonSocial" => $payload['razon_social'],
            "Telefono" => $payload["telefono"],
            "Email" => $payload["correo"],
            "IdTipoDocumentoIdentidad" => TipoDocumentoIdentidad::RUC,
            "NumeroDocumentoIdentidad" => $payload["numero_documento_identidad"],
            "Placa" => $payload["placa"],
            "Asientos" => $payload["asientos"],
            "Uso" => $payload["uso"],
            "AnioVehiculo" => $payload["anio_vehiculo"],
            "CompaniaSeguro" => $payload["compania_seguro"],
            "TieneSoat" => true,
            "FechaVencimiento" => "2020-05-15"
        ]);
    }

    public function testRegistroCotizacionPersonaJuridicaQueNoTieneSoat()
    {
        $payload = [
            "tipo_cliente" => "J",
            "razon_social" => "Una empresa SAC",
            "tipo_documento_identidad" => TipoDocumentoIdentidad::RUC,
            "numero_documento_identidad" => "45747712",
            "telefono" => "931850406",
            "correo" => "rome.jes.1@gmail.com",
            "anio_vehiculo" => "2001",
            "placa" => "MF-5981",
            "asientos" => 10,
            "uso" => "Transporte de Personal",
            "compania_seguro" => "La Positiva",
            "tiene_soat" => 0,
            "fecha_vencimiento" => "2020-05-15"
        ];
        $response = $this->json("POST", "cotizaciones/soat", $payload);
        $response->assertStatus(201);

        $this->assertEquals(201, $response->getData()->statusCode);

        $expectedCodigo = date("Ymd") . "-00001";
        $this->assertDatabaseHas("Solicitud", [
            "Tipo" => Solicitud::TIPO_SOLICITUD_COTIZACION,
            "Producto" => Solicitud::PRODUCTO_SOAT,
            "Codigo" => $expectedCodigo
        ]);

        $this->assertDatabaseHas("DetalleCotizacionSoat", [
            "IdSolicitud" => $response->getData()->data->solicitud->id,
            "TipoCliente" => "J",
            "Nombres" => null,
            "ApellidoPaterno" => null,
            "ApellidoMaterno" => null,
            "RazonSocial" => $payload['razon_social'],
            "Telefono" => $payload["telefono"],
            "Email" => $payload["correo"],
            "IdTipoDocumentoIdentidad" => TipoDocumentoIdentidad::RUC,
            "NumeroDocumentoIdentidad" => $payload["numero_documento_identidad"],
            "Placa" => $payload["placa"],
            "Asientos" => $payload["asientos"],
            "Uso" => $payload["uso"],
            "AnioVehiculo" => $payload["anio_vehiculo"],
            "CompaniaSeguro" => $payload["compania_seguro"],
            "TieneSoat" => false,
            "FechaVencimiento" => null
        ]);
    }

    public function testErroresValidacion()
    {
        //  Tratando de enviar una peticion indicando que SI tiene SOAT
        $payload = [
            "tipo_cliente" => "J",
            "nombres" => "Jesus",
            "apellido_paterno" => "Romero",
            "apellido_materno" => "Ramos",
            "tipo_documento_identidad" => 1,
            "numero_documento_identidad" => "45747712",
            "telefono" => "931850406",
            "correo" => "rome.jes.1mail.com",
            "anio_vehiculo" => "2001",
            "placa" => "MF-5981",
            "asientos" => "ass44",
            "uso" => "Transporte Personal",
            "compania_seguro" => "Cualquiera",
            "tiene_soat" => 0,
            "fecha_vencimiento" => null
        ];
        $response = $this->json("POST", "cotizaciones/soat", $payload);
        $response->assertStatus(400);
        $this->assertObjectHasAttribute("correo", $response->getData()->messages);
        $this->assertObjectHasAttribute("asientos", $response->getData()->messages);
        $this->assertObjectHasAttribute("uso", $response->getData()->messages);
        $this->assertObjectHasAttribute("compania_seguro", $response->getData()->messages);
        $this->assertObjectNotHasAttribute("fecha_vencimiento", $response->getData()->messages);
    }
}
