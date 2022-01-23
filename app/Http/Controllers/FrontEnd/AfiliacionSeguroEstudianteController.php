<?php

namespace App\Http\Controllers\FrontEnd;

use App\Exceptions\RegistroNoEncontradoException;
use App\Http\Controllers\Controller;
use App\Models\DetalleAfiliacionSeguroEstudiante;

class AfiliacionSeguroEstudianteController extends Controller
{
    private $detalleAfiliacionSeguroEstudiante;

    public function __construct(DetalleAfiliacionSeguroEstudiante $detalleAfiliacionSeguroEstudiante)
    {
        $this->detalleAfiliacionSeguroEstudiante = $detalleAfiliacionSeguroEstudiante;;
    }

    /**
     * Muestra la vista de inicio de sesion
     *
     * @return View
     */
    public function index()
    {
        return view("intranet.pages.afiliaciones.seguro_estudiantil.index");
    }

    /**
     * Muestra la vista de Panel de Control
     *
     * @return View
     */
    public function detail($code)
    {
        $detalleAfiliacion = $this->detalleAfiliacionSeguroEstudiante->getDetalleSolicitudByCodigo($code);
        return view("intranet.pages.afiliaciones.seguro_estudiantil.detail", compact("detalleAfiliacion"));
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
