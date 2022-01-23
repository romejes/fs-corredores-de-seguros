<?php

namespace App\Http\Resources;

class DetalleCompraSoatResource
{
    public static function create($detalleCompraSoat)
    {
        return [
            "id" => $detalleCompraSoat->IdDetalleCompraSoat,
            "nombres" => $detalleCompraSoat->Nombres,
            "apellido_paterno" => $detalleCompraSoat->ApellidoPaterno,
            "apellido_materno" => $detalleCompraSoat->ApellidoMaterno,
            "fecha_nacimiento" => $detalleCompraSoat->FechaNacimiento,
            "telefono" => $detalleCompraSoat->Telefono,
            "email" => $detalleCompraSoat->Email,
            "tipo_documento_identidad" => TipoDocumentoIdentidadResource::create($detalleCompraSoat->tipoDocumentoIdentidad),
            "numero_documento_identidad" => $detalleCompraSoat->NumeroDocumentoIdentidad,
            "direccion" => $detalleCompraSoat->Direccion,
            "placa" => $detalleCompraSoat->Placa,
            "asientos" => $detalleCompraSoat->Asientos,
            "uso" => $detalleCompraSoat->Uso,
            "anio_vehiculo" => $detalleCompraSoat->AnioVehiculo,
            "compania_seguro" => $detalleCompraSoat->CompaniaSeguro,
            "tipo_compra" => $detalleCompraSoat->TipoCompra,
            "imagen_poliza" => $detalleCompraSoat->ImagenPoliza,
            "imagen_tarjeta_propiedad" => $detalleCompraSoat->ImagenTarjetaPropiedad,
            "imagen_dni" => $detalleCompraSoat->ImagenDni,
            "solicitud" => SolicitudResource::create($detalleCompraSoat->solicitud)
        ];
    }
}
