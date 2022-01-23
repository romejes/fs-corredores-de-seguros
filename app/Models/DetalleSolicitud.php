<?php

namespace App\Models;

use App\Exceptions\RegistroNoEncontradoException;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Config;
use Symfony\Component\HttpKernel\Exception\UnprocessableEntityHttpException;

class DetalleSolicitud extends Model
{
    /**
     * Relacion 1:1 con el modelo Solicitud
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function solicitud()
    {
        return $this->belongsTo(Solicitud::class, "IdSolicitud", "IdSolicitud");
    }

    /**
     * Relacion 1:1 con el modelo TipoDocumentoIdentidad
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function tipoDocumentoIdentidad()
    {
        return $this->hasOne(TipoDocumentoIdentidad::class, "IdTipoDocumentoIdentidad", "IdTipoDocumentoIdentidad");
    }

    /**
     * Atributo que devuelve el nombre completo del solicitante
     *
     * @return string
     */
    public function getSolicitadoPorAttribute()
    {
        if ($this->TipoCliente === Config::get("constants.tipo_cliente.persona_natural")) {
            return "{$this->Nombres} {$this->ApellidoPaterno} {$this->ApellidoMaterno}";
        }

        if ($this->TipoCliente === Config::get("constants.tipo_cliente.persona_juridica")) {
            return $this->RazonSocial;
        }

        return null;
    }

    /**
     * Atributo que devuelve el tipo de documento de identidad y el numero
     *
     * @return string
     */
    public function getDocumentoIdentidadAttribute()
    {
        return "{$this->tipoDocumentoIdentidad->Descripcion} - {$this->NumeroDocumentoIdentidad}";
    }

    /**
     * Obtiene todas las solicitudes de compra de SOAT
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function getDetalleSolicitudes()
    {
        $solicitudes = self::get()->sortByDesc(function ($item) {
            return $item->solicitud->FechaHoraRegistro;
        });

        return $solicitudes->values();
    }

    /**
     * Obtiene una solicitud mediante código
     *
     * @param string $code
     * @return mixed
     */
    public function getDetalleSolicitudByCodigo($code)
    {
        $detalleCompra = $this->getDetalleSolicitudes()->first(function ($value, $key) use ($code) {
            return $value->solicitud->Codigo == $code;
        });

        if (!$detalleCompra) {
            throw new RegistroNoEncontradoException("No se encontró el registro");
        }
        return $detalleCompra;
    }

    /**
     * Cambia el estado de una solicitud
     *
     * @param string $code
     * @param boolean $reject
     * @return void
     */
    public function changeStatus($code, $reject = false)
    {
        $detalleSolicitud = $this->getDetalleSolicitudByCodigo($code);
        $actualEstadoSolicitud = $detalleSolicitud->solicitud->IdEstadoSolicitud;

        if ($reject && $actualEstadoSolicitud == EstadoSolicitud::SOLICITUD_EN_ESPERA) {
            $detalleSolicitud->solicitud->IdEstadoSolicitud = EstadoSolicitud::SOLICITUD_RECHAZADA;
        } else if (!$reject && $actualEstadoSolicitud == EstadoSolicitud::SOLICITUD_EN_ESPERA) {
            $detalleSolicitud->solicitud->IdEstadoSolicitud = EstadoSolicitud::SOLICITUD_ATENDIDA;
        } else {
            throw new UnprocessableEntityHttpException("No es posible cambiar de estado a la solicitud");
        }

        $detalleSolicitud->solicitud->save();
        return $detalleSolicitud;
    }

    public function getNumberOfSolicitudesSinAtender()
    {
        $solicitudes = $this->getDetalleSolicitudes();

        return $solicitudes->filter(function ($value, $key) {
            return $value->solicitud->IdEstadoSolicitud == EstadoSolicitud::SOLICITUD_EN_ESPERA;
        })->count();
    }
}
