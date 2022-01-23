<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Symfony\Component\HttpKernel\Exception\UnprocessableEntityHttpException;

class Solicitud extends Model
{
    protected $table = "Solicitud";

    protected $primaryKey = "IdSolicitud";

    public $incrementing = true;

    public $timestamps = false;

    public $fillable = [
        "Codigo",
        "Producto",
        "Tipo",
        "IdEstadoSolicitud",
        "FechaHoraRegistro",
    ];

    const TIPO_SOLICITUD_AFILIACION = "Afiliación";
    const TIPO_SOLICITUD_COTIZACION = "Cotización";
    const TIPO_SOLICITUD_COMPRA = "Compra";

    const PRODUCTO_SOAT = "SOAT";
    const PRODUCTO_SEGURO_VEHICULO_TODO_RIESGO = "Seguro Vehículo Todo Riesgo";
    const PRODUCTO_SEGURO_ESTUDIANTE = "Seguro Estudiantil";

    /**
     * Relacion 1:1 con el modelo EstadoSolicitud
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function estadoSolicitud()
    {
        return $this->hasOne(EstadoSolicitud::class, "IdEstadoSolicitud", "IdEstadoSolicitud");
    }

    /**
     * Devuelve los tipos de solicitud
     *
     * @return array
     */
    public function getTipoSolicitud()
    {
        return [
            self::TIPO_SOLICITUD_AFILIACION,
            self::TIPO_SOLICITUD_COMPRA,
            self::TIPO_SOLICITUD_COTIZACION
        ];
    }

    /**
     * Devuelve los productos que pueden pedirse mediante una solicitud
     *
     * @return array
     */
    public function getProducto()
    {
        return [
            self::PRODUCTO_SEGURO_ESTUDIANTE,
            self::PRODUCTO_SEGURO_VEHICULO_TODO_RIESGO,
            self::PRODUCTO_SOAT
        ];
    }

    /**
     * Registrar una solicitud
     *
     * @param string $producto
     * @param string $tipo
     * @return Model
     */
    public function register($producto, $tipo)
    {
        if (!in_array($tipo, $this->getTipoSolicitud())) {
            throw new UnprocessableEntityHttpException("${tipo} no es un tipo de solicitud válido");
        }

        if (!in_array($producto, $this->getProducto())) {
            throw new UnprocessableEntityHttpException("${producto} no es un producto válido");
        }

        return Solicitud::create([
            "Codigo" => $this->generateCode(),
            "Producto" => $producto,
            "Tipo" => $tipo,
            "IdEstadoSolicitud" => EstadoSolicitud::SOLICITUD_EN_ESPERA,
            "FechaHoraRegistro" => Carbon::now(),
        ]);
    }

    /**
     * Obtiene las solicitudes por año
     *
     * @param string $year
     * @return Collection
     */
    public function getSolicitudesByYear($year = null)
    {
        if (is_null($year) || $year === '') {
            $year = date('Y');
        }

        return Solicitud::whereYear("FechaHoraRegistro", $year)
            ->where("Activo", true)
            ->get();
    }

    /**
     * Generar codigo para la solicitud
     *
     * @return string
     */
    private function generateCode()
    {
        $amountSolicitudes = count($this->getSolicitudesByYear());
        $numberForCode = str_pad($amountSolicitudes + 1, 5, "0", STR_PAD_LEFT);        
        return date("Ymd") . "-" . $numberForCode; 
    }
}
