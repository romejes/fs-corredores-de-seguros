<?php
namespace App\Http\Resources;

class EstadoSolicitudResource
{
    public static function create($estadoSolicitud)
    {
        return [
            "id" => $estadoSolicitud->IdEstadoSolicitud,
            "descripcion" => $estadoSolicitud->Descripcion,
        ];
    }
}
