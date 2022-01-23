<?php

namespace App\Http\Controllers\FrontEnd;

use App\Models\DetalleCompraSoat;
use App\Http\Controllers\Controller;
use App\Exceptions\RegistroNoEncontradoException;

class CompraSoatController extends Controller
{
    private $detalleCompraSoat;

    /**
     * Constructor
     */
    public function __construct(DetalleCompraSoat $detalleCompraSoat)
    {
        $this->detalleCompraSoat = $detalleCompraSoat;
    }

    /**
     * Muestra la vista de inicio de sesion
     *
     * @return View
     */
    public function index()
    {
        return view("intranet.pages.compras.soat.index");
    }

    /**
     * Muestra la vista de Panel de Control
     *
     * @return View
     */
    public function detail($code)
    {
        $detalleCompra = $this->detalleCompraSoat->getDetalleSolicitudByCodigo($code);
        return view("intranet.pages.compras.soat.detail", compact("detalleCompra"));
    }

    /**
     * Descarga el archivo especificado
     *
     * @param string $codigo
     * @param string $nombreArchivo
     * @return Response
     */
    public function downloadFile($codigo, $nombreArchivo)
    {
        $ruta = storage_path("app/public/uploads/{$nombreArchivo}");
        if (file_exists($ruta)) {
            return response()->download($ruta);
        }
        throw new RegistroNoEncontradoException("El archivo no existe");
    }
}
