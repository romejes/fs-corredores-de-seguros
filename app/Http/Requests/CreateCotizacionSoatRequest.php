<?php

namespace App\Http\Requests;

use App\Models\TipoDocumentoIdentidad;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Config;

class CreateCotizacionSoatRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $rules = [
            "tipo_cliente" => "required|in:N,J",
            "numero_documento_identidad" => "required|string|max:15",
            "telefono" => "required|string|max:40",
            "correo" => "required|email|max:40",
            "anio_vehiculo" => "required|date_format:Y|before_or_equal:now",
            "placa" => "required|string",
            "asientos" => "required|integer",
            "uso" => [
                "required",
                Rule::in(['Particular', 'Carga', 'Transporte de Personal', 'Escolar'])
            ],
            "compania_seguro" => [
                "required",
                Rule::in(['Pacifico', 'MAPFRE', 'La Positiva', 'Rimac'])
            ],
            "tiene_soat" => "required"
        ];

        if ($this->input("tipo_cliente") === Config::get("constants.tipo_cliente.persona_natural")) {
            $rules = array_merge($rules, [
                "nombres" => "required|string|max:40",
                "apellido_paterno" => "required|string|max:40",
                "apellido_materno" => "max:40",
                "tipo_documento_identidad" => [
                    "required",
                    Rule::in([
                        TipoDocumentoIdentidad::DNI,
                        TipoDocumentoIdentidad::CE,
                        TipoDocumentoIdentidad::PASAPORTE,
                        TipoDocumentoIdentidad::OTROS
                    ])
                ]
            ]);
        }

        if ($this->input("tipo_cliente") === Config::get("constants.tipo_cliente.persona_juridica")) {
            $rules = array_merge($rules, [
                "razon_social" => "required|string|max:100",
                "tipo_documento_identidad" => [
                    "required",
                    Rule::in([
                        TipoDocumentoIdentidad::RUC,
                        TipoDocumentoIdentidad::OTROS
                    ])
                ]
            ]);
        }        

        if ($this->input("tiene_soat") === 1) {
            $rules["fecha_vencimiento"] = "date_format:Y-m-d";
        }

        return $rules;
    }
}
