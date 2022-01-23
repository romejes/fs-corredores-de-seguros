<?php

namespace App\Models;

use App\Exceptions\RegistroNoEncontradoException;
use Carbon\Carbon;
use App\Models\DetalleSolicitud;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\CreateCompraSoatRequest;
use Symfony\Component\HttpFoundation\File\Exception\FileException;
use Symfony\Component\HttpKernel\Exception\BadRequestHttpException;

class DetalleCompraSoat extends DetalleSolicitud
{
    protected $table = "DetalleCompraSoat";

    protected $primaryKey = "IdDetalleCompraSoat";

    public $incrementing = true;

    public $timestamps = false;

    public $fillable = [
        "IdSolicitud",
        "Nombres",
        "ApellidoPaterno",
        "ApellidoMaterno",
        "FechaNacimiento",
        "Telefono",
        "Email",
        "IdTipoDocumentoIdentidad",
        "NumeroDocumentoIdentidad",
        "Direccion",
        "Placa",
        "Asientos",
        "Uso",
        "AnioVehiculo",
        "CompaniaSeguro",
        "TipoCompra",
        "ImagenPoliza",
        "ImagenTarjetaPropiedad",
        "ImagenDni"
    ];

    const TIPO_COMPRA_ADQUISICION = "Adquisición";
    const TIPO_COMPRA_RENOVACION = "Renovación";

    /**
     * Devuelve la fecha de nacimiento en formato largo y de cadena
     *
     * @param string $fechaNacimiento
     * @return string
     */
    public function getFechaNacimientoAttribute($fechaNacimiento)
    {
        return strftime('%d de %B de %Y', strtotime($fechaNacimiento));
    }

    /**
     * Registrar en la tabla respectiva
     *
     * @param CreateCompraSoatRequest $data
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function register(CreateCompraSoatRequest $data)
    {
        $tipoDocumentoIdentidadModel = new TipoDocumentoIdentidad();
        $tipoDocumentoIdentidad = $tipoDocumentoIdentidadModel->getById(
            $data->input("tipo_documento_identidad")
        );
        if (!$tipoDocumentoIdentidad) {
            throw new RegistroNoEncontradoException("El tipo de documento de identidad no existe o no es válido");
        }

        if ($data->input("tipo_compra") === "renovacion") {
            $detalle = $this->registerRenovacion($data);
        } else if ($data->input("tipo_compra") === "adquisicion") {
            $detalle = $this->registerAdquisicion($data);
        } else {
            throw new BadRequestHttpException("Solo se puede escoger entre 'renovacion' y 'adquisicion'");
        }

        return $detalle;
    }

    /**
     * Registra una compra de SOAT mediante renovación
     *
     * @param CreateCompraSoatRequest $data
     * @return void
     */
    private function registerRenovacion(CreateCompraSoatRequest $data)
    {
        //  Crear solicitud
        $solicitudModel = new Solicitud();
        $solicitud = $solicitudModel->register(
            Solicitud::PRODUCTO_SOAT,
            Solicitud::TIPO_SOLICITUD_COMPRA
        );

        //  Procesar imagen
        $poliza = $data->file("imagen_poliza");
        $extensionArchivo = $poliza->getClientOriginalExtension();
        $nombreArchivoPoliza = $solicitud->Codigo . "_1.${extensionArchivo}";
        $rutaSubida = $poliza->storeAs("uploads", $nombreArchivoPoliza, "public");
        
        if (!file_exists(storage_path("app/public/" . $rutaSubida))) {
            $solicitud->delete();
            throw new FileException("No se pudo subir la imagen");;
        }

        return self::create([
            "IdSolicitud" => $solicitud->IdSolicitud,
            "Nombres" => $data->input("nombres"),
            "ApellidoPaterno" => $data->input("apellido_paterno"),
            "ApellidoMaterno" => $data->input("apellido_materno"),
            "FechaNacimiento" => Carbon::parse($data->input("fecha_nacimiento")),
            "Telefono" => $data->input("telefono"),
            "Email" => $data->input("correo"),
            "IdTipoDocumentoIdentidad" => $data->input("tipo_documento_identidad"),
            "NumeroDocumentoIdentidad" => $data->input("numero_documento_identidad"),
            "TipoCompra" => self::TIPO_COMPRA_RENOVACION,
            "ImagenPoliza" => $nombreArchivoPoliza
        ]);
    }

    private function registerAdquisicion(CreateCompraSoatRequest $data)
    {
        //  Crear solicitud
        $solicitudModel = new Solicitud();
        $solicitud = $solicitudModel->register(
            Solicitud::PRODUCTO_SOAT,
            Solicitud::TIPO_SOLICITUD_COMPRA
        );

        //  Procesar imagen de tarjeta de propiedad y/o poliza
        $tarjetaPropiedad = $data->file("imagen_tarjeta_propiedad");
        $extensionArchivo = $tarjetaPropiedad->getClientOriginalExtension();
        $nombreArchivoTarjetaPropiedad = $solicitud->Codigo . "_1.${extensionArchivo}";
        $rutaSubida = $tarjetaPropiedad->storeAs("uploads", $nombreArchivoTarjetaPropiedad, "public");

        if (!file_exists(storage_path("app/public/" . $rutaSubida))) {
            $solicitud->delete();
            throw new FileException("No se pudo subir la imagen");;
        }

        //  Procesar imagen de DNI
        $dni = $data->file("imagen_dni");
        $extensionArchivo = $dni->getClientOriginalExtension();
        $nombreArchivoDni = $solicitud->Codigo . "_2.${extensionArchivo}";
        $rutaSubida = $dni->storeAs("uploads", $nombreArchivoDni, "public");

        if (!file_exists(storage_path("app/public/" . $rutaSubida))) {
            $solicitud->delete();
            throw new FileException("No se pudo subir la imagen");;
        }

        return self::create([
            "IdSolicitud" => $solicitud->IdSolicitud,
            "Nombres" => $data->input("nombres"),
            "ApellidoPaterno" => $data->input("apellido_paterno"),
            "ApellidoMaterno" => $data->input("apellido_materno"),
            "FechaNacimiento" => Carbon::parse($data->input("fecha_nacimiento")),
            "Telefono" => $data->input("telefono"),
            "Email" => $data->input("correo"),
            "IdTipoDocumentoIdentidad" => $data->input("tipo_documento_identidad"),
            "NumeroDocumentoIdentidad" => $data->input("numero_documento_identidad"),
            "Direccion" => $data->input("direccion"),
            "Placa" => $data->input("placa"),
            "Asientos" => $data->input("asientos"),
            "Uso" => $data->input("uso"),
            "AnioVehiculo" => $data->input("anio_vehiculo"),
            "CompaniaSeguro" => $data->input("compania_seguro"),
            "TipoCompra" => self::TIPO_COMPRA_ADQUISICION,
            "ImagenTarjetaPropiedad" =>  $nombreArchivoTarjetaPropiedad,
            "ImagenDni" =>  $nombreArchivoDni
        ]);
    }
}
