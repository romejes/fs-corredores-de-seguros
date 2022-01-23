<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EstadoSolicitud extends Model
{
    protected $table = "EstadoSolicitud";

    protected $primaryKey = "IdEstadoSolicitud";

    public $incrementing = true;

    public $timestamps = false;

    const SOLICITUD_EN_ESPERA = 1;
    const SOLICITUD_EN_ATENCION = 2;
    const SOLICITUD_ATENDIDA = 3;
    const SOLICITUD_RECHAZADA = 4;
}
