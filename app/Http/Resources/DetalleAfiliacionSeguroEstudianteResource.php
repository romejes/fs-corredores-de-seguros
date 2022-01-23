<?php

namespace App\Http\Resources;

use App\Http\Resources\PaisResource;
use App\Http\Resources\SolicitudResource;
use App\Http\Resources\TipoDocumentoIdentidadResource;

class DetalleAfiliacionSeguroEstudianteResource
{
    public static function create($detalleAfiliacionSeguroEstudiante)
    {
        return [
            "id" => $detalleAfiliacionSeguroEstudiante->IdDetalleAfiliacionSeguroEstudiante,
            "nombres" => $detalleAfiliacionSeguroEstudiante->Nombres,
            "apellido_paterno" => $detalleAfiliacionSeguroEstudiante->ApellidoPaterno,
            "apellido_materno" => $detalleAfiliacionSeguroEstudiante->ApellidoMaterno,
            "sexo" => $detalleAfiliacionSeguroEstudiante->Sexo,
            "estado_civil" => $detalleAfiliacionSeguroEstudiante->EstadoCivil,
            "fecha_nacimiento" => $detalleAfiliacionSeguroEstudiante->FechaNacimiento,
            "telefono" => $detalleAfiliacionSeguroEstudiante->Telefono,
            "email" => $detalleAfiliacionSeguroEstudiante->Email,
            "pais" => PaisResource::create($detalleAfiliacionSeguroEstudiante->pais),
            "tipo_documento_identidad" => TipoDocumentoIdentidadResource::create($detalleAfiliacionSeguroEstudiante->tipoDocumentoIdentidad),
            "numero_documento_identidad" => $detalleAfiliacionSeguroEstudiante->NumeroDocumentoIdentidad,
            "solicitud" => SolicitudResource::create($detalleAfiliacionSeguroEstudiante->solicitud),
            "voucher" => $detalleAfiliacionSeguroEstudiante->ImagenVoucher
        ];
    }
}
