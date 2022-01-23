<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class CreateCompraSoatRequest extends FormRequest
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
            "tipo_compra" => "required|in:adquisicion,renovacion",
            "nombres" => "required|string|max:40",
            "apellido_paterno" => "required|string|max:40",
            "apellido_materno" => "max:40",
            "tipo_documento_identidad" => "required|integer",
            "numero_documento_identidad" => "required|string|max:15",
            "telefono" => "required|string|max:40",
            "correo" => "required|email|max:40",
            "fecha_nacimiento" => "required|date_format:Y-m-d|before:now"
        ];

        if ($this->input("tipo_compra") === "renovacion") {
            $rules["imagen_poliza"] = "required|file|mimetypes:image/*,application/pdf|max:10280";
        }

        if ($this->input("tipo_compra") === 'adquisicion') {
            $rules = array_merge($rules, [
                "direccion" => "required|max:100",
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
                "imagen_dni" => "required|file|mimetypes:image/*,application/pdf|max:10280",
                "imagen_tarjeta_propiedad" => "required|file|mimetypes:image/*,application/pdf|max:10280",
            ]);
        }
        return $rules;
    }
}
