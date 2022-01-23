<?php

namespace App\Http\Resources;

class ClaseVehiculoResource
{
    public static function create($claseVehiculo)
    {
        return [
            "id" => $claseVehiculo->IdClaseVehiculo,
            "descripcion" => $claseVehiculo->Descripcion,
        ];
    }
}
