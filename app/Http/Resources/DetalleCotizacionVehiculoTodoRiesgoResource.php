<?php

namespace App\Http\Resources;

use App\Http\Resources\SolicitudResource;
use App\Http\Resources\TipoDocumentoIdentidadResource;

class DetalleCotizacionVehiculoTodoRiesgoResource
{
    public static function create($detalleCotizacionVehiculo)
    {
        return [
            "id" => $detalleCotizacionVehiculo->IdDetalleCotizacionSoat,
            "nombres" => $detalleCotizacionVehiculo->Nombres,
            "apellido_paterno" => $detalleCotizacionVehiculo->ApellidoPaterno,
            "apellido_materno" => $detalleCotizacionVehiculo->ApellidoMaterno,
            "razon_social" => $detalleCotizacionVehiculo->RazonSocial,
            "tipo_cliente" => $detalleCotizacionVehiculo->TipoCliente,
            "fecha_nacimiento" => $detalleCotizacionVehiculo->FechaNacimiento,
            "telefono" => $detalleCotizacionVehiculo->Telefono,
            "email" => $detalleCotizacionVehiculo->Email,
            "tipo_documento_identidad" => TipoDocumentoIdentidadResource::create($detalleCotizacionVehiculo->tipoDocumentoIdentidad),
            "numero_documento_identidad" => $detalleCotizacionVehiculo->NumeroDocumentoIdentidad,
            "placa" => $detalleCotizacionVehiculo->Placa,
            "asientos" => $detalleCotizacionVehiculo->Asientos,
            "uso" => $detalleCotizacionVehiculo->Uso,
            "anio_vehiculo" => $detalleCotizacionVehiculo->AnioVehiculo,
            "clase_vehiculo" => ClaseVehiculoResource::create($detalleCotizacionVehiculo->claseVehiculo),
            "marca" => $detalleCotizacionVehiculo->Marca,
            "modelo" => $detalleCotizacionVehiculo->Modelo,
            "costo_vehiculo" => $detalleCotizacionVehiculo->CostoVehiculo,
            "compania_seguro" => $detalleCotizacionVehiculo->CompaniaSeguro,
            "solicitud" => SolicitudResource::create($detalleCotizacionVehiculo->solicitud)
        ];
    }
}
