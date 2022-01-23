<?php

namespace App\Data;

class Servicio
{
    /**
     * Obtiene toda la informacion de los servicios
     *
     * @return array
     */
    public static function obtenerDatos()
    {
        return array(
            array(
                "seguro" => "SOAT",
                "imagen_miniatura" => "seguro_soat.jpg",
                "opciones" => array(
                    array(
                        "nombre" => "Cotizar",
                        "slug" => "cotizar_soat",
                    ),
                    array(
                        "nombre" => "Comprar",
                        "slug" => "comprar_soat",
                    )
                )
            ),
            array(
                "seguro" => "Seguro Vehicular",
                "imagen_miniatura" => "seguro_vehiculo.jpg",
                "opciones" => array(
                    array(
                        "nombre" => "Cotizar",
                        "slug" => "cotizar_seguro_vehicular",
                    )
                )
            ),
            array(
                "seguro" => "Seguro Estudiantil contra Accidentes",
                "imagen_miniatura" => "seguro_estudiante.jpg",
                "opciones" => array(
                    array(
                        "nombre" => "Afiliar",
                        "slug" => "afiliar_seguro_estudiantil",
                    )
                )
            ),
        );
    }    

    public static function verificarSiExisteServicio($servicioSlug)
    {
        $servicios = self::obtenerDatos();
        foreach ($servicios as $servicio) {
            if (in_array($servicioSlug, array_column($servicio["opciones"], "slug"))) {
                return true;
            }
        }
        return false;
    }
}
