<?php
namespace App\Http\Resources;

class TipoDocumentoIdentidadResource
{
    public static function create($tipoDocumentoIdentidad)
    {
        return [
            "id" => $tipoDocumentoIdentidad->IdTipoDocumentoIdentidad,
            "descripcion" => $tipoDocumentoIdentidad->Descripcion,
        ];
    }
}
