<?php

namespace App\Data;

class Carousel
{
    /**
     * Obtiene toda la informacion de los seguros
     *
     * @return array
     */
    public static function obtenerDatos()
    {
        return [
            [
                "imagen_grande" => "banner_soat_small.jpg",
                "imagen_pequena" => "banner_soat_large.jpg",
                "titulo" => 'Tu SOAT en un instante',
                "descripcion" => "Cotízalo y/o adquierelo en tan solo unos minutos y desde la comodidad de tu casa u oficina",
                "botones" => [
                    [
                        "nombre" => "Comprar",
                        "url" => "servicios_en_linea/comprar_soat",
                    ],
                    [
                        "nombre" => "Cotizar",
                        "url" => "servicios_en_linea/cotizar_soat",
                    ]
                ]
            ],
            [
                "imagen_grande" => "banner_seguro_vehiculo_small.jpg",
                "imagen_pequena" => "banner_seguro_vehiculo_large.jpg",
                "titulo" => "Protege tu vehiculo con nosotros",
                "descripcion" => "Ponemos a disposición un servicio de cotización para que puedas contratar un seguro para tu vehículo.",
                "botones" => [
                    [
                        "nombre" => "Cotizar Seguro Vehicular",
                        "url" => "servicios_en_linea/cotizar_seguro_vehicular_todo_riesgo",
                    ],
                ]
            ],
            [
                "imagen_grande" => "banner_seguro_estudiante_small.jpg",
                "imagen_pequena" => "banner_seguro_estudiante_large.jpg",
                "titulo" => 'Estudia con total tranquilidad',
                "descripcion" => "Si eres estudiante de la UNJBG, asegúrate con nosotros ahora mismo y enfócate solamente en tu formación profesional",
                "botones" => [
                    [
                        "nombre" => "Afiliar",
                        "url" => "servicios_en_linea/afiliar_seguro_estudiantil",
                    ],
                ]
            ],
        ];
    }
}
