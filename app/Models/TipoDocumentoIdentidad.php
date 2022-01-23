<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Config;

class TipoDocumentoIdentidad extends Model
{
    protected $table = "TipoDocumentoIdentidad";

    protected $primaryKey = "IdTipoDocumentoIdentidad";

    public $incrementing = true;

    public $timestamps = false;

    const DNI = 1;
    const CE = 2;
    const PASAPORTE = 3;
    const RUC = 4;
    const OTROS = 5;

    /**
     * Obtiene el pais segun su codigo
     *
     * @param integer $id
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function getById($id)
    {
        return self::where("IdTipoDocumentoIdentidad", $id)->first();
    }

    /**
     * Obtiene todos los tipos de documento de identidad
     *
     * @return Collection
     */
    public function getAll()
    {
        return self::all();
    }

    public function getByTipoCliente($tipoCliente)
    {
        if ($tipoCliente === Config::get("constants.tipo_cliente.persona_juridica")) {
            return self::whereIn("IdTipoDocumentoIdentidad", [
                self::RUC,
                self::OTROS
            ])->get();
        } else if ($tipoCliente === Config::get("constants.tipo_cliente.persona_natural")) {
            return self::whereIn("IdTipoDocumentoIdentidad", [
                self::DNI,
                self::CE,
                self::PASAPORTE,
                self::OTROS
            ])->get();
        }
    }
}
