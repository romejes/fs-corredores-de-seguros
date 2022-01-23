<?php

namespace App\Models;

use App\Exceptions\RegistroNoEncontradoException;
use App\Models\DetalleSolicitud;
use App\Http\Requests\CreateCotizacionSoatRequest;
use Carbon\Carbon;
use Illuminate\Support\Facades\Config;

class DetalleCotizacionSoat extends DetalleSolicitud
{
    protected $table = "DetalleCotizacionSoat";

    protected $primaryKey = "IdDetalleCotizacionSoat";

    public $incrementing = true;

    public $timestamps = false;

    public $fillable = [
        "IdSolicitud",
        "Telefono",
        "Email",
        "IdTipoDocumentoIdentidad",
        "NumeroDocumentoIdentidad",
        "TieneSoat",
        "Placa",
        "Asientos",
        "Uso",
        "AnioVehiculo",
        "CompaniaSeguro",
        "FechaVencimiento",
        "TipoCliente"
    ];


    /**
     * Devuelve la fecha de vencimiento en formato largo y de cadena
     *
     * @param string $fechaNacimiento
     * @return string
     */
    public function getFechaVencimientoAttribute($fechaNacimiento)
    {
        return strftime('%d de %B de %Y', strtotime($fechaNacimiento));
    }

    /**
     * Registrar en la tabla respectiva
     *
     * @param CreateCotizacionSoatRequest $data
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function register(CreateCotizacionSoatRequest $data)
    {
        //  Validar el tipo de documento de identidad
        $tipoDocumentoIdentidadModel = new TipoDocumentoIdentidad();
        $tipoDocumentoIdentidad = $tipoDocumentoIdentidadModel->getById(
            $data->input("tipo_documento_identidad")
        );
        if (!$tipoDocumentoIdentidad) {
            throw new RegistroNoEncontradoException("El tipo de documento de identidad no existe o no es válido");
        }

        //  Crear la solicitud
        $solicitudModel = new Solicitud();
        $solicitud = $solicitudModel->register(
            Solicitud::PRODUCTO_SOAT,
            Solicitud::TIPO_SOLICITUD_COTIZACION
        );

        //  Crear el detalle de la solicitud
        $detalle = new self();
        $tieneSoat = $data->input("tiene_soat");

        if ($data->input("tipo_cliente") === Config::get("constants.tipo_cliente.persona_natural")) {
            $detalle->Nombres = $data->input("nombres");
            $detalle->ApellidoPaterno = $data->input("apellido_paterno");
            $detalle->ApellidoMaterno = $data->input("apellido_materno");
        }

        if ($data->input("tipo_cliente") === Config::get("constants.tipo_cliente.persona_juridica")) {
            $detalle->RazonSocial = $data->input("razon_social");
        }

        $detalle->TipoCliente = $data->input("tipo_cliente");
        $detalle->IdSolicitud = $solicitud->IdSolicitud;
        $detalle->Telefono = $data->input("telefono");
        $detalle->Email = $data->input("correo");
        $detalle->IdTipoDocumentoIdentidad = $tipoDocumentoIdentidad->IdTipoDocumentoIdentidad;
        $detalle->NumeroDocumentoIdentidad = $data->input("numero_documento_identidad");
        $detalle->Placa = $data->input("placa");
        $detalle->Asientos = $data->input("asientos");
        $detalle->Uso = $data->input("uso");
        $detalle->AnioVehiculo = $data->input("anio_vehiculo");
        $detalle->CompaniaSeguro = $data->input("compania_seguro");
        $detalle->TieneSoat = $tieneSoat;
        $detalle->FechaVencimiento = $tieneSoat ? Carbon::parse($data->input("fecha_vencimiento")) : null;
        
        $detalle->save();
        return $detalle;
    }
}
