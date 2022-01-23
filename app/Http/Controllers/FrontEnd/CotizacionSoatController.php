<?php

namespace App\Http\Controllers\FrontEnd;

use App\Http\Controllers\Controller;
use App\Models\DetalleCotizacionSoat;

class CotizacionSoatController extends Controller
{
    private $detalleCotizacionSoat;

    public function __construct(DetalleCotizacionSoat $detalleCotizacionSoat) {
        $this->detalleCotizacionSoat = $detalleCotizacionSoat;
    }

    /**
     * Muestra la vista de inicio de sesion
     *
     * @return View
     */
    public function index()
    {
        return view("intranet.pages.cotizaciones.soat.index");
    }

    /**
     * Muestra la vista de Panel de Control
     *
     * @return View
     */
    public function detail($code)
    {
        $detalleCotizacion = $this->detalleCotizacionSoat->getDetalleSolicitudByCodigo($code);
        return view("intranet.pages.cotizaciones.soat.detail", compact("detalleCotizacion"));
    }
}
