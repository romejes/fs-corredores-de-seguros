<?php
namespace App\Http\Resources;

class PaisResource
{
    public static function create($pais)
    {
        return [
            "codigo_pais" => $pais->Codigo,
            "nombre" => $pais->Nombre
        ];
    }
}