<?php

namespace App\Http\Resources;

use App\Http\Resources\SolicitudResource;
use App\Http\Resources\TipoDocumentoIdentidadResource;

class DetalleCotizacionSoatResource
{
    public static function create($detalleCotizacionSoat)
    {
        return [
            "id" => $detalleCotizacionSoat->IdDetalleCotizacionSoat,
            "nombres" => $detalleCotizacionSoat->Nombres,
            "apellido_paterno" => $detalleCotizacionSoat->ApellidoPaterno,
            "apellido_materno" => $detalleCotizacionSoat->ApellidoMaterno,
            "razon_social" => $detalleCotizacionSoat->RazonSocial,
            "tipo_cliente" => $detalleCotizacionSoat->TipoCliente,
            "fecha_nacimiento" => $detalleCotizacionSoat->FechaNacimiento,
            "telefono" => $detalleCotizacionSoat->Telefono,
            "email" => $detalleCotizacionSoat->Email,
            "tipo_documento_identidad" => TipoDocumentoIdentidadResource::create($detalleCotizacionSoat->tipoDocumentoIdentidad),
            "numero_documento_identidad" => $detalleCotizacionSoat->NumeroDocumentoIdentidad,
            "tiene_soat" => $detalleCotizacionSoat->TieneSoat,
            "placa" => $detalleCotizacionSoat->Placa,
            "asientos" => $detalleCotizacionSoat->Asientos,
            "uso" => $detalleCotizacionSoat->Uso,
            "anio_vehiculo" => $detalleCotizacionSoat->AnioVehiculo,
            "compania_seguro" => $detalleCotizacionSoat->CompaniaSeguro,
            "solicitud" => SolicitudResource::create($detalleCotizacionSoat->solicitud)
        ];
    }
}
