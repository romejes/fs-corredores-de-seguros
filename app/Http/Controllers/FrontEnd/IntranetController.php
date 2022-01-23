<?php

namespace App\Http\Controllers\FrontEnd;

use App\Http\Controllers\Controller;
use App\Models\DetalleAfiliacionSeguroEstudiante;
use App\Models\DetalleCompraSoat;
use App\Models\DetalleCotizacionSoat;
use App\Models\DetalleCotizacionVtr;

class IntranetController extends Controller
{
    private $modelDetalleCotizacionSoat;
    private $modelDetalleCotizacionVehiculoTodoRiesgo;
    private $modelDetalleAfiliacionSeguroEstudiante;
    private $modelDetalleCompraSoat;

    public function __construct(
        DetalleCotizacionSoat $_detalleCotizacionSoat,
        DetalleCompraSoat $_detalleCompraSoat,
        DetalleCotizacionVtr $_detalleCotizacionVehiculoTodoRiesgo,
        DetalleAfiliacionSeguroEstudiante $_detalleAfiliacionSeguroEstudiante
    ) {
        $this->modelDetalleCotizacionSoat = $_detalleCotizacionSoat;
        $this->modelDetalleCompraSoat = $_detalleCompraSoat;
        $this->modelDetalleCotizacionVehiculoTodoRiesgo = $_detalleCotizacionVehiculoTodoRiesgo;
        $this->modelDetalleAfiliacionSeguroEstudiante = $_detalleAfiliacionSeguroEstudiante;
    }

    /**
     * Muestra la vista de inicio de sesion
     *
     * @return View
     */
    public function login()
    {
        return view("intranet.pages.login");
    }

    /**
     * Muestra la vista de Panel de Control
     *
     * @return View
     */
    public function dashboard()
    {
        $solicitudesSinAtender = array(
            "cotizacion_soat" => $this->modelDetalleCotizacionSoat->getNumberOfSolicitudesSinAtender(),
            "cotizacion_seguro_vehiculo_todo_riesgo" => $this->modelDetalleCotizacionVehiculoTodoRiesgo->getNumberOfSolicitudesSinAtender(),
            "compra_soat" => $this->modelDetalleCompraSoat->getNumberOfSolicitudesSinAtender(),
            "afiliacion_seguro_estudiante" => $this->modelDetalleAfiliacionSeguroEstudiante->getNumberOfSolicitudesSinAtender()
        );

        $totalSolicitudesSinAtender = array_sum($solicitudesSinAtender);
        return view("intranet.pages.inicio", compact("solicitudesSinAtender", "totalSolicitudesSinAtender"));
    }
}
