<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pais extends Model
{
    protected $table = "Pais";

    protected $primaryKey = "Codigo";

    public $incrementing = false;

    protected $keyType = "string";

    public $timestamps = false;

    /**
     * Obtiene el pais segun su codigo
     *
     * @param string $code
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function getByCodigo($code)
    {
        return self::where("Codigo", $code)->first();
    }

    /**
     * Obtiene todos los paises ordenados segun el nombre
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function getAll()
    {
        return self::orderBy('Nombre')->get();
    }
}
