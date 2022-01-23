<?php

namespace App\Http\Controllers\BackEnd;

use App\Mail\CotizacionSoatMail;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use App\Models\DetalleCotizacionSoat;
use Illuminate\Support\Facades\Config;
use App\Http\Requests\DetalleSolicitudRequest;
use Symfony\Component\HttpFoundation\Response;
use App\Http\Requests\CreateCotizacionSoatRequest;
use App\Http\Resources\DetalleCotizacionSoatResource;

class CotizacionSoatController extends Controller
{
    private $detalleCotizacionSoat;
    private $correoDestino;

    public function __construct(DetalleCotizacionSoat $detalleCotizacionSoat)
    {
        $this->detalleCotizacionSoat = $detalleCotizacionSoat;
        $this->correoDestino = Config::get('mail.to');
    }

    public function index()
    {
        $data = $this->detalleCotizacionSoat->getDetalleSolicitudes();
        return response()->json([
            "data" => $data->map(function ($item, $key) {
                return DetalleCotizacionSoatResource::create($item);
            }),
            "statusCode" => Response::HTTP_OK
        ]);
    }

    public function show($code)
    {
        $data = $this->detalleCotizacionSoat->getDetalleSolicitudByCodigo($code);
        return response()->json([
            "data" => DetalleCotizacionSoatResource::create($data),
            "statusCode" => Response::HTTP_OK
        ]);
    }

    public function store(CreateCotizacionSoatRequest $createCotizacionSoatRequest)
    {
        $solicitudRegistrada = $this->detalleCotizacionSoat->register($createCotizacionSoatRequest);

        if ($solicitudRegistrada) {
            Mail::to($this->correoDestino)
                ->send(new CotizacionSoatMail(($solicitudRegistrada)));
        }

        return response()->json([
            "statusCode" => Response::HTTP_CREATED,
            "data" => DetalleCotizacionSoatResource::create($solicitudRegistrada)
        ], Response::HTTP_CREATED);
    }

    public function update($code, DetalleSolicitudRequest $detalleSolicitudRequest)
    {
        $solicitudCompra = $this->detalleCotizacionSoat->changeStatus(
            $code,
            $detalleSolicitudRequest->input("rechazar")
        );

        return response()->json([
            "statusCode" => Response::HTTP_OK,
            "data" => DetalleCotizacionSoatResource::create($solicitudCompra)
        ]);
    }
}
