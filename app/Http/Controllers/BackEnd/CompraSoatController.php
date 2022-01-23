<?php

namespace App\Http\Controllers\BackEnd;

use App\Models\DetalleCompraSoat;
use App\Http\Controllers\Controller;
use App\Http\Requests\CreateCompraSoatRequest;
use App\Http\Requests\DetalleSolicitudRequest;
use Symfony\Component\HttpFoundation\Response;
use App\Http\Resources\DetalleCompraSoatResource;
use App\Mail\CompraSoatMail;
use Illuminate\Support\Facades\Mail;

class CompraSoatController extends Controller
{
    private $detalleCompraSoat;

    public function __construct(DetalleCompraSoat $detalleCompraSoat)
    {
        $this->detalleCompraSoat = $detalleCompraSoat;
    }

    public function index()
    {
        $data = $this->detalleCompraSoat->getDetalleSolicitudes();
        return response()->json([
            "data" => $data->map(function ($item, $key) {
                return DetalleCompraSoatResource::create($item);
            }),
            "statusCode" => Response::HTTP_OK
        ]);
    }

    public function store(CreateCompraSoatRequest $createCompraSoatRequest)
    {
        $solicitud = $this->detalleCompraSoat->register($createCompraSoatRequest);
        if ($solicitud) {
            Mail::to("fllanos@fscorredoresasesores.com")
                ->send(new CompraSoatMail(($solicitud)));
        }
        return response()->json([
            "statusCode" => Response::HTTP_CREATED,
            "data" => DetalleCompraSoatResource::create($solicitud)
        ], Response::HTTP_CREATED);
    }

    public function show($code)
    {
        $data = $this->detalleCompraSoat->getDetalleSolicitudByCodigo($code);
        return response()->json([
            "data" => DetalleCompraSoatResource::create($data),
            "statusCode" => Response::HTTP_OK
        ]);
    }

    public function update($code, DetalleSolicitudRequest $detalleSolicitudRequest)
    {
        $solicitudCompra = $this->detalleCompraSoat->changeStatus(
            $code,
            $detalleSolicitudRequest->input("rechazar")
        );

        return response()->json([
            "statusCode" => Response::HTTP_OK,
            "data" => DetalleCompraSoatResource::create($solicitudCompra)
        ]);
    }
}
