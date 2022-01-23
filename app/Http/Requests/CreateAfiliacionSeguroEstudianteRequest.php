<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateAfiliacionSeguroEstudianteRequest extends FormRequest
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
        return [
            "nombres" => "required|string|max:40",
            "apellido_paterno" => "required|string|max:40",
            "apellido_materno" => "max:40",
            "sexo" => "required|in:M,F",
            "pais" => "required|string|size:2",
            "tipo_documento_identidad" => "required|integer",
            "numero_documento_identidad" => "required|string|max:15",
            "estado_civil" => "required|in:Casado,Soltero,Divorciado,Viudo",
            "fecha_nacimiento" => "required|date_format:Y-m-d|before:now",
            "telefono" => "required|string|max:40",
            "correo" => "required|email|max:40",
            "voucher" => "required|file|mimetypes:image/*,application/pdf|max:5120"
        ];
    }

    public function messages()
    {
        return [
            "voucher" => [
                "max" => "El limite permitido es hasta 5MB"
            ]
        ];
    }
}
