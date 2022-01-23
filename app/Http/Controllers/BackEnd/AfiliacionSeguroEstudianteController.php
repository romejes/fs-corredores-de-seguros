<?php

namespace App\Http\Controllers\BackEnd;

use Carbon\Carbon;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Config;
use App\Mail\AfiliacionSeguroEstudianteMail;
use App\Http\Requests\DetalleSolicitudRequest;
use Symfony\Component\HttpFoundation\Response;
use App\Models\DetalleAfiliacionSeguroEstudiante;
use App\Http\Requests\CreateAfiliacionSeguroEstudianteRequest;
use App\Http\Resources\DetalleAfiliacionSeguroEstudianteResource;

class AfiliacionSeguroEstudianteController extends Controller
{
    private $detalleAfiliacionSeguroEstudiante;
    private $correoDestino;
    
    public function __construct(DetalleAfiliacionSeguroEstudiante $detalleAfiliacionSeguroEstudiante)
    {
        $this->detalleAfiliacionSeguroEstudiante = $detalleAfiliacionSeguroEstudiante;
        $this->correoDestino = config('mail.to');
    }

    public function index()
    {
        $data = $this->detalleAfiliacionSeguroEstudiante->getDetalleSolicitudes();
        return response()->json([
            "data" => $data->map(function ($item, $key) {
                return DetalleAfiliacionSeguroEstudianteResource::create($item);
            }),
            "statusCode" => Response::HTTP_OK
        ]);
    }

    public function show($code)
    {
        $data = $this->detalleAfiliacionSeguroEstudiante->getDetalleSolicitudByCodigo($code);
        return response()->json([
            "data" => DetalleAfiliacionSeguroEstudianteResource::create($data),
            "statusCode" => Response::HTTP_OK
        ]);
    }

    public function update($code, DetalleSolicitudRequest $detalleSolicitudRequest)
    {
        $solicitudAfiliacion = $this->detalleAfiliacionSeguroEstudiante->changeStatus(
            $code,
            $detalleSolicitudRequest->input("rechazar")
        );

        return response()->json([
            "statusCode" => Response::HTTP_OK,
            "data" => DetalleAfiliacionSeguroEstudianteResource::create($solicitudAfiliacion)
        ]);
    }

    public function store(CreateAfiliacionSeguroEstudianteRequest $createAfiliacionSeguroEstudianteRequest)
    {
        $solicitudRegistrada = $this->detalleAfiliacionSeguroEstudiante->register($createAfiliacionSeguroEstudianteRequest);

        if ($solicitudRegistrada) {
            Mail::to($this->correoDestino)
                ->send(new AfiliacionSeguroEstudianteMail($solicitudRegistrada));
        }

        return response()->json([
            "statusCode" => Response::HTTP_CREATED,
            "data" => DetalleAfiliacionSeguroEstudianteResource::create($solicitudRegistrada)
        ], Response::HTTP_CREATED);
    }

    public function excel()
    {
        $fechaEmision = Carbon::now()->format("dmYHis");
        $nombreArchivo = "reporte_afiliacion_seguro_estudiante_{$fechaEmision}";

        Excel::create($nombreArchivo, function ($excel) {
            $excel->sheet("Hoja 1", function ($sheet) {
                $data = $this->detalleAfiliacionSeguroEstudiante->getDetalleSolicitudes();
                $sheet->loadView("excel.reporte_afiliacion_seguro_estudiante", compact("data"));
            });
        })->download();
    }
}
