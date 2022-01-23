<?php

namespace App\Models;

use App\Exceptions\RegistroNoEncontradoException;
use App\Models\DetalleSolicitud;
use App\Http\Requests\CreateCotizacionVehiculoRequest;
use Illuminate\Support\Facades\Config;

class DetalleCotizacionVtr extends DetalleSolicitud
{
    protected $table = "DetalleCotizacionVtr";

    protected $primaryKey = "IdDetalleCotizacionVtr";

    public $incrementing = true;

    public $timestamps = false;

    public $fillable = [
        "IdSolicitud",
        "Telefono",
        "Email",
        "IdTipoDocumentoIdentidad",
        "NumeroDocumentoIdentidad",
        "Placa",
        "Asientos",
        "Uso",
        "AnioVehiculo",
        "IdClaseVehiculo",
        "Marca",
        "Modelo",
        "CostoVehiculo",
        "CompaniaSeguro",
        "TipoCliente",
    ];

    /**
     * Relacion 1:1 con el modelo Solicitud
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function claseVehiculo()
    {
        return $this->hasOne(ClaseVehiculo::class, "IdClaseVehiculo", "IdClaseVehiculo");
    }

    /**
     * Registrar en la tabla respectiva
     *
     * @param CreateCotizacionVehiculoRequest $data
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function register(CreateCotizacionVehiculoRequest $data)
    {
        //  Validar el tipo de documento de identidad
        $tipoDocumentoIdentidadModel = new TipoDocumentoIdentidad();
        $tipoDocumentoIdentidad = $tipoDocumentoIdentidadModel->getById(
            $data->input("tipo_documento_identidad")
        );
        if (!$tipoDocumentoIdentidad) {
            throw new RegistroNoEncontradoException("El código del país no existe o no es válido");
        }

        //  Validar la clase del vehiculo
        $claseVehiculoModel = new ClaseVehiculo();
        $claseVehiculo = $claseVehiculoModel->getById($data->input("clase_vehiculo"));

        //  Crear la solicitud
        $solicitudModel = new Solicitud();
        $solicitud = $solicitudModel->register(
            Solicitud::PRODUCTO_SEGURO_VEHICULO_TODO_RIESGO,
            Solicitud::TIPO_SOLICITUD_COTIZACION
        );

        //  Crear el detalle de la solicitud
        $detalle = new self();

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
        $detalle->IdClaseVehiculo = $claseVehiculo->IdClaseVehiculo;
        $detalle->Marca = $data->input("marca");
        $detalle->Modelo = $data->input("modelo");
        $detalle->CostoVehiculo = $data->input("costo");
        $detalle->CompaniaSeguro = $data->input("compania_seguro");
        
        $detalle->save();
        return $detalle;
    }
}
