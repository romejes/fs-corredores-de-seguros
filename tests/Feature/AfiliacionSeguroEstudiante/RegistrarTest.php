<?php

namespace Tests\Feature\AfiliacionSeguroEstudiante;

use App\Models\Solicitud;
use Illuminate\Contracts\Cache\Store;
use Tests\TestCase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\WithoutMiddleware;

class RegistrarTest extends TestCase
{
    use DatabaseTransactions, WithoutMiddleware;

    public function testRegistroExitoso()
    {
        Storage::fake('upload');
        $uploadImage = UploadedFile::fake()->image("voucher.jpg");

        $payload = [
            "nombres" => "Jesus",
            "apellido_paterno" => "Romero",
            "apellido_materno" => "Ramos",
            "sexo" => "M",
            "pais" => "PE",
            "tipo_documento_identidad" => 1,
            "numero_documento_identidad" => "45747712",
            "estado_civil" => "Soltero",
            "fecha_nacimiento" => "1989-06-06",
            "telefono" => "931850406",
            "correo" => "rome.jes.1@gmail.com",
            "voucher" => $uploadImage
        ];
        $response = $this->json("POST", "afiliaciones/seguro_estudiante", $payload);
        $response->assertStatus(201);

        $this->assertEquals(201, $response->getData()->statusCode);

        $expectedCodigo = date("Ymd") . "-00001";
        $this->assertDatabaseHas("Solicitud", [
            "Tipo" => Solicitud::TIPO_SOLICITUD_AFILIACION,
            "Codigo" => $expectedCodigo
        ]);

        $this->assertDatabaseHas("DetalleAfiliacionSeguroEstudiante", [
            "IdSolicitud" => $response->getData()->data->solicitud->id,
            "Nombres" => $payload["nombres"],
            "ApellidoPaterno" => $payload["apellido_paterno"],
            "ApellidoMaterno" => $payload["apellido_materno"],
            "FechaNacimiento" => "1989-06-06",
            "CodigoPais" => "PE",
            "ImagenVoucher" => "${expectedCodigo}.jpg"
        ]);
        Storage::disk('local')->assertExists("public/uploads/${expectedCodigo}.jpg");
    }

    public function testErroresValidacion()
    {
        Storage::fake('local');
        $uploadImage = UploadedFile::fake()->image("voucher.docx");

        $payload = [
            "nombres" => "Jesus",
            "apellido_paterno" => "Romero",
            "apellido_materno" => "Ramos",
            "sexo" => "A",
            "pais" => "A",
            "tipo_documento_identidad" => 1,
            "numero_documento_identidad" => "45747712",
            "estado_civil" => "Unnkas",
            "fecha_nacimiento" => "06-06-1989",
            "telefono" => "931850406",
            "correo" => "rome.jes.1gmail.com",
            "voucher" => $uploadImage
        ];
        $response = $this->json("POST", "afiliaciones/seguro_estudiante", $payload);
        $response->assertStatus(400);

        $this->assertEquals(400, $response->getData()->statusCode);
        $this->assertObjectHasAttribute("sexo", $response->getData()->messages);

        $expectedCodigo = date("Ymd") . "-00001";
        Storage::disk('local')->assertMissing("uploads/${expectedCodigo}.jpg");
    }

    public function testDocumentoIdentidadNoEncontrado()
    {
        Storage::fake('local');
        $uploadImage = UploadedFile::fake()->image("voucher.jpg");

        $payload = [
            "nombres" => "Jesus",
            "apellido_paterno" => "Romero",
            "apellido_materno" => "Ramos",
            "sexo" => "M",
            "pais" => "PE",
            "tipo_documento_identidad" => 48,
            "numero_documento_identidad" => "45747712",
            "estado_civil" => "Soltero",
            "fecha_nacimiento" => "1989-06-06",
            "telefono" => "931850406",
            "correo" => "rome.jes.1@gmail.com",
            "voucher" => $uploadImage
        ];
        $response = $this->json("POST", "afiliaciones/seguro_estudiante", $payload);
        $response->assertStatus(404);

        $this->assertEquals(404, $response->getData()->statusCode);
    }
}
