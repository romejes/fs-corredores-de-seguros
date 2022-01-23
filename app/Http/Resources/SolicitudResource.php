<?php

namespace App\Http\Resources;

use App\Http\Resources\EstadoSolicitudResource;

class SolicitudResource
{
    public static function create($solicitud)
    {
        return [
            "id" => $solicitud->IdSolicitud,
            "codigo" => $solicitud->Codigo,
            "producto" => $solicitud->Producto,
            "tipo" => $solicitud->Tipo,
            "estado_solicitud" => EstadoSolicitudResource::create($solicitud->estadoSolicitud),
            "fecha_hora_registro" => $solicitud->FechaHoraRegistro,
        ];
    }
}
