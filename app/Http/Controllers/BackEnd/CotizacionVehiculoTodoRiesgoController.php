<?php

namespace App\Http\Controllers\BackEnd;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\DetalleCotizacionVtr;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Config;
use App\Http\Requests\DetalleSolicitudRequest;
use Symfony\Component\HttpFoundation\Response;
use App\Mail\CotizacionSeguroVehiculoTodoRiesgoMail;
use App\Http\Requests\CreateCotizacionVehiculoRequest;
use App\Http\Resources\DetalleCotizacionVehiculoTodoRiesgoResource;

class CotizacionVehiculoTodoRiesgoController extends Controller
{
    private $detalleCotizacionVehiculo;
    private $correoDestino;

    public function __construct(DetalleCotizacionVtr $detalleCotizacionVehiculo)
    {
        $this->detalleCotizacionVehiculo = $detalleCotizacionVehiculo;
        $this->correoDestino = Config::get('mail.to');
    }

    public function index()
    {
        $data = $this->detalleCotizacionVehiculo->getDetalleSolicitudes();
        return response()->json([
            "data" => $data->map(function ($item, $key) {
                return DetalleCotizacionVehiculoTodoRiesgoResource::create($item);
            }),
            "statusCode" => Response::HTTP_OK
        ]);
    }

    public function show($code)
    {
        $data = $this->detalleCotizacionVehiculo->getDetalleSolicitudByCodigo($code);
        return response()->json([
            "data" => DetalleCotizacionVehiculoTodoRiesgoResource::create($data),
            "statusCode" => Response::HTTP_OK
        ]);
    }

    public function store(CreateCotizacionVehiculoRequest $createCotizacionVehiculoRequest)
    {
        $solicitudRegistrada = $this->detalleCotizacionVehiculo->register($createCotizacionVehiculoRequest);

        if ($solicitudRegistrada) {
            Mail::to($this->correoDestino)
                ->send(new CotizacionSeguroVehiculoTodoRiesgoMail(($solicitudRegistrada)));
        }

        return response()->json([
            "statusCode" => Response::HTTP_CREATED,
            "data" => DetalleCotizacionVehiculoTodoRiesgoResource::create($solicitudRegistrada)
        ], Response::HTTP_CREATED);
    }

    public function update($code, DetalleSolicitudRequest $detalleSolicitudRequest)
    {
        $solicitudCompra = $this->detalleCotizacionVehiculo->changeStatus(
            $code,
            $detalleSolicitudRequest->input("rechazar")
        );

        return response()->json([
            "statusCode" => Response::HTTP_OK,
            "data" => DetalleCotizacionVehiculoTodoRiesgoResource::create($solicitudCompra)
        ]);
    }
}
