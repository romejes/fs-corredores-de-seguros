<?php

namespace App\Http\Controllers\FrontEnd;

use App\Http\Controllers\Controller;
use App\Models\DetalleCotizacionVtr;

class CotizacionVtrController extends Controller
{
    private $detalleCotizacionVehiculo;

    public function __construct(DetalleCotizacionVtr $detalleCotizacionVehiculo)
    {
        $this->detalleCotizacionVehiculo = $detalleCotizacionVehiculo;
    }

    /**
     * Muestra la vista de inicio de sesion
     *
     * @return View
     */
    public function index()
    {
        return view("intranet.pages.cotizaciones.vehiculo_todo_riesgo.index");
    }

    /**
     * Muestra la vista de Panel de Control
     *
     * @return View
     */
    public function detail($code)
    {
        $detalleCotizacion = $this->detalleCotizacionVehiculo->getDetalleSolicitudByCodigo($code);
        return view("intranet.pages.cotizaciones.vehiculo_todo_riesgo.detail", compact("detalleCotizacion"));
    }
}
