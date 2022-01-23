<?php

namespace App\Data;

class Staff 
{
    public static function obtenerDatos()
    {
        return [
            [
                "nombre" => "Ing. Fanny Llanos Ramos",
                "cargo" => "Gerente General",
                "correo" => "fllanos@fscorredoresasesores.com",
                "telefono" => "990 287528"
            ],            
            [
                "nombre" => "Carlos Andrés Figueroa Llanos",
                "cargo" => "Gerente de Administración",
                "codigo_sbs" => "N-4902",
                "correo" => "cfigueroa@fscorredoresasesores.com",
                "telefono" => "945 276280"
            ],
            [
                "nombre" => "Bach. Milagros Nataly Mamani Flores",
                "cargo" => "Ejecutiva Especialista en Cuentas del Estado",
                "correo" => "mmamani@fscorredoresasesores.com",
                "telefono" => "997 368020"
            ],
            [
                "nombre" => "Antony Sebastian Vera Ayca",
                "cargo" => "Ejecutivo Comercial en Seguros",
                "correo" => "comercial@fscorredoresasesores.com",
                "telefono" => "944 460101"
            ],            
            [
                "nombre" => "John Ordoñez Monroy",
                "cargo" => "Soluciones Tecnológicas",
                "correo" => "jordonez@fscorredoresasesores.com",
                "telefono" => "952 947576"
            ],
        ];
    }
}