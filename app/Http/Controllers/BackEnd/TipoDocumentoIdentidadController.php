<?php

namespace App\Http\Controllers\BackEnd;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\TipoDocumentoIdentidadResource;
use App\Models\TipoDocumentoIdentidad;
use Symfony\Component\HttpFoundation\Response;

class TipoDocumentoIdentidadController extends Controller
{
    private $tipoDocumentoIdentidad;

    /**
     * Constructor
     *
     * @param TipoDocumentoIdentidad $_tipoDocumentoIdentidad
     */
    public function __construct(TipoDocumentoIdentidad $_tipoDocumentoIdentidad)
    {
        $this->tipoDocumentoIdentidad = $_tipoDocumentoIdentidad;
    }

    /**
     * Devuelve los tipos de documento de identidad
     *
     * @param Request $request
     * @return void
     */
    public function __invoke(Request $request)
    {
        if ($request->has("tipo_cliente")) {
            $tiposDocumentoIdentidad = $this->tipoDocumentoIdentidad->getByTipoCliente($request->input("tipo_cliente"));
        } else {
            $tiposDocumentoIdentidad = $this->tipoDocumentoIdentidad->getAll();
        }
        
        return response()->json([
            "data" => $tiposDocumentoIdentidad->map(function ($item, $key) {
                return TipoDocumentoIdentidadResource::create($item);
            }),
            "statusCode" => Response::HTTP_OK
        ]);
    }
}
