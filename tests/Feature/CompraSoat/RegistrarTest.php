<?php

namespace Tests\Feature\CompraSoat;

use Tests\TestCase;
use App\Models\Solicitud;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class RegistrarTest extends TestCase
{
    use DatabaseTransactions, WithoutMiddleware;

    public function testRenovacionExitosa()
    {
        Storage::fake('upload');
        $uploadTarjetaPropiedad = UploadedFile::fake()->image("tarjeta_propiedad.jpg");

        $payload = [
            "nombres" => "Jesus",
            "apellido_paterno" => "Romero",
            "apellido_materno" => "Ramos",
            "tipo_documento_identidad" => 1,
            "numero_documento_identidad" => "45747712",
            "telefono" => "931850406",
            "correo" => "rome.jes.1@gmail.com",
            "fecha_nacimiento" => "1989-06-06",
            "imagen_poliza" => $uploadTarjetaPropiedad,
            "tipo_compra" => "renovacion"
        ];

        $response = $this->json("POST", "compras/soat", $payload);
        $response->assertStatus(201);

        $this->assertEquals(201, $response->getData()->statusCode);

        $expectedCodigo = date("Ymd") . "-00001";
        $this->assertDatabaseHas("Solicitud", [
            "Tipo" => Solicitud::TIPO_SOLICITUD_COMPRA,
            "Producto" => Solicitud::PRODUCTO_SOAT,
            "Codigo" => $expectedCodigo
        ]);

        $this->assertDatabaseHas("DetalleCompraSoat", [
            "IdSolicitud" => $response->getData()->data->solicitud->id,
            "Nombres" => $payload["nombres"],
            "ApellidoPaterno" => $payload["apellido_paterno"],
            "ApellidoMaterno" => $payload["apellido_materno"],
            "FechaNacimiento" => $payload["fecha_nacimiento"],
            "Telefono" => $payload["telefono"],
            "Email" => $payload["correo"],
            "IdTipoDocumentoIdentidad" => 1,
            "NumeroDocumentoIdentidad" => $payload["numero_documento_identidad"],
            "Direccion" => null,
            "Placa" => null,
            "Asientos" => null,
            "Uso" => null,
            "AnioVehiculo" => null,
            "CompaniaSeguro" => null,
            "TipoCompra" => "renovacion",
            "ImagenPoliza" => "{$expectedCodigo}_1.jpg",
            "ImagenTarjetaPropiedad" => null,
            "ImagenDni" => null,
        ]);

        Storage::disk('local')->assertExists("public/uploads/${expectedCodigo}_1.jpg");
    }

    public function testAdquisicionExitosa()
    {
        Storage::fake('upload');
        $uploadTarjetaPropiedad = UploadedFile::fake()->image("tarjeta_propiedad.jpg");
        $uploadTarjetaDni = UploadedFile::fake()->image("tarjeta_dni.jpg");

        $payload = [
            "nombres" => "Jesus",
            "apellido_paterno" => "Romero",
            "apellido_materno" => "Ramos",
            "tipo_documento_identidad" => 1,
            "numero_documento_identidad" => "45747712",
            "telefono" => "931850406",
            "correo" => "rome.jes.1@gmail.com",
            "fecha_nacimiento" => "1989-06-06",
            "imagen_tarjeta_propiedad" => $uploadTarjetaPropiedad,
            "tipo_compra" => "adquisicion",
            "direccion" => "Av. Bolognesi 7781",
            "anio_vehiculo" => "1980",
            "placa" => "DF-8910",
            "asientos" => 2,
            "uso" => "Transporte de Personal",
            "compania_seguro" => 'Pacifico',
            "imagen_dni" => $uploadTarjetaDni
        ];

        $response = $this->json("POST", "compras/soat", $payload);
        $response->assertStatus(201);

        $this->assertEquals(201, $response->getData()->statusCode);

        $expectedCodigo = date("Ymd") . "-00001";
        $this->assertDatabaseHas("Solicitud", [
            "Tipo" => Solicitud::TIPO_SOLICITUD_COMPRA,
            "Producto" => Solicitud::PRODUCTO_SOAT,
            "Codigo" => $expectedCodigo
        ]);

        $this->assertDatabaseHas("DetalleCompraSoat", [
            "IdSolicitud" => $response->getData()->data->solicitud->id,
            "Nombres" => $payload["nombres"],
            "ApellidoPaterno" => $payload["apellido_paterno"],
            "ApellidoMaterno" => $payload["apellido_materno"],
            "FechaNacimiento" => $payload["fecha_nacimiento"],
            "Telefono" => $payload["telefono"],
            "Email" => $payload["correo"],
            "IdTipoDocumentoIdentidad" => 1,
            "NumeroDocumentoIdentidad" => $payload["numero_documento_identidad"],
            "Direccion" =>  $payload["direccion"],
            "Placa" => $payload["placa"],
            "Asientos" => $payload["asientos"],
            "Uso" =>  $payload["uso"],
            "AnioVehiculo" =>  $payload["anio_vehiculo"],
            "CompaniaSeguro" => $payload["compania_seguro"],
            "TipoCompra" => "adquisicion",
            "ImagenTarjetaPropiedad" => "{$expectedCodigo}_1.jpg",
            "ImagenDni" => "{$expectedCodigo}_2.jpg",
        ]);

        Storage::disk('local')->assertExists("public/uploads/${expectedCodigo}_1.jpg");
        Storage::disk('local')->assertExists("public/uploads/${expectedCodigo}_2.jpg");
    }
}
