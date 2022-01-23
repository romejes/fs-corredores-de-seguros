<?php

namespace App\Data;

class Seguro
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
                "titulo" => "Seguros para Personas",
                "seguros" => [
                    [
                        "nombre" => "SOAT",
                        "slug" => "soat",
                        "imagen_miniatura" => 'seguro_soat.jpg',
                        "mostrar_en_inicio" => true,
                        "resumen" => "El SOAT (Seguro Obligatorio de Accidentes de Tránsito) brinda una cobertura a todos aquellas personas que ocupan un vehiculo y a los peatones en caso de ocurrir un accidente de tránsito. Es de caracter obligatorio establecido por ley."
                    ],
                    [
                        "nombre" => "Seguro Vehicular",
                        "slug" => "seguro_vehicular",
                        "imagen_miniatura" => 'seguro_vehiculo.jpg',
                        "mostrar_en_inicio" => true,
                        "resumen" => "Es un seguro destino a la protección de su vehículo ante cualquier siniestro o daño que se produzca, asi com tambien a los pasajeros que ocupen el vehiculo asegurado."
                    ],
                    [
                        "nombre" => "Seguro de Vida",
                        "slug" => "seguro_vida",
                        "imagen_miniatura" => 'seguro_vida.jpg',
                        "mostrar_en_inicio" => false,
                        "resumen" => "Es un seguro que tiene como objetivo brindar una cantidad monetaria a la familia del asegurado o a quien o quienes el asegurado determine como beneficiarios una vez que este fallezca o quede en estado de invalidez."
                    ],
                    [
                        "nombre" => "Seguro de Salud",
                        "slug" => "seguro_salud",
                        "imagen_miniatura" => 'seguro_salud.jpg',
                        "mostrar_en_inicio" => false,
                        "resumen" => "Es un seguro que tiene como objetivo cubrir los gastos de atención médica, ya sea de forma parcial o total."
                    ],
                    [
                        "nombre" => "Seguro de Hogar",
                        "slug" => "seguro_hogar",
                        "imagen_miniatura" => 'seguro_hogar.jpg',
                        "mostrar_en_inicio" => false,
                        "resumen" => "Es un seguro destinado a respaldar la casa del asegurado frente a cualquier incidente que pueda ocurrir."
                    ],
                    [
                        "nombre" => "Seguro de Viajes",
                        "slug" => "seguro_viaje",
                        "imagen_miniatura" => 'seguro_viaje.jpg',
                        "mostrar_en_inicio" => false,
                        "resumen"   => "Es un seguro que asiste al beneficiario ante cualquier imprevisto (como por ejemplo la pérdida de su equipaje) ocurrido durante un viaje nacional e internacional."
                    ],
                ]
            ],
            [
                "titulo" => "Seguros para Empresas",
                "seguros" => [
                    [
                        "nombre" => "Seguro contra COVID-19",
                        "slug" => "seguro_covid19",
                        "imagen_miniatura" => 'seguro_covid19.jpg',
                        "mostrar_en_inicio" => true,
                        "resumen" => "Es un seguro que te protege del COVID-19, otorgándote una renta económica por cada día de hospitalización."
                    ],
                    [
                        "nombre" => "EPS",
                        "slug" => "eps",
                        "imagen_miniatura" => 'seguro_eps.jpg',
                        "mostrar_en_inicio" => false,
                        "resumen" => "Es un seguro médico destinado a los trabajadores de una empresa. Mediante su afiliación estos podran ser atendidos en Entidades Prestadores de Salud (muy aparte de ESSALUD) y disfrutar de otros beneficios relacionados con su salud."
                    ],
                    [
                        "nombre" => "SCTR",
                        "slug" => "sctr",
                        "imagen_miniatura" => 'seguro_sctr.jpg',
                        "mostrar_en_inicio" => true,
                        "resumen" => "El Seguro Complementario de Trabajo de Riesgo (SCTR) es un seguro destinado a prestar servicios de salud y económicos a trabajadores que ejerzan labores consideradas de alto riesgo."
                    ],
                    [
                        "nombre" => "Seguro de Transporte de Mercadería",
                        "slug" => "seguro_transporte_mercaderia",
                        "imagen_miniatura" => 'seguro_transporte_mercaderia.jpg',
                        "mostrar_en_inicio" => false,
                        "resumen" => "Es un seguro que se encarga de cubrir todos los riesgos que puedan afectar la mercadería que es transportada por vía terrestre, marítima o aérea."
                    ],
                    [
                        "nombre" => "Seguro contra Incendios",
                        "slug" => "seguro_incendio",
                        "imagen_miniatura" => 'seguro_incendio.jpg',
                        "mostrar_en_inicio" => false,
                        "resumen" => "Es un seguro que cubre los daños de los bienes de la empresa a causa de un incendio, terremoto, maremoto, rayo, explosión, huelga, conmoción civil, vandalismo, terrorismo, etc."
                    ],
                    [
                        "nombre" => "Seguro por Responsabilidad Civil",
                        "slug" => "seguro_responsabilidad_civil",
                        "imagen_miniatura" => 'seguro_responsabilidad_civil.jpg',
                        "mostrar_en_inicio" => false,
                        "resumen" => "Es un seguro destinado a cubrir los daños materiales y/o personales producidos de manera accidental en el cual la empresa se ve involucrada y declarado como responsable."
                    ],
                    [
                        "nombre" => "Seguro por Deshonestidad",
                        "slug" => "seguro_deshonestidad",
                        "imagen_miniatura" => 'seguro_deshonestidad.jpg',
                        "mostrar_en_inicio" => false,
                        "resumen" => "Es un seguro destinado a cubrir las perdidas causadas por actos de deshonestidad de parte de los trabajadores de la empresa asegurada."
                    ],
                    [
                        "nombre" => "Seguro contra Robo y/o Asalto",
                        "slug" => "seguro_robo_negocio",
                        "imagen_miniatura" => 'seguro_robo_negocio.jpg',
                        "mostrar_en_inicio" => false,
                        "resumen" => "Es un seguro destinado a respaldar el patrimonio de la empresa frente a robos, asaltos o intento de robo."
                    ]
                ]
            ]
        ];
    }

    public static function mostrarSegurosPrincipales()
    {
        $seguros = self::obtenerDatos();
        $segurosSinAgrupar = [];

        foreach ($seguros as $grupoSeguro) {
            $segurosSinAgrupar = array_merge($segurosSinAgrupar, $grupoSeguro["seguros"]);
        }

        return array_filter($segurosSinAgrupar, function ($valor, $indice) {
            return $valor["mostrar_en_inicio"] === true;
        }, ARRAY_FILTER_USE_BOTH);
    }

    public static function verificarSiExisteSeguro($seguroSlug)
    {
        $seguros = self::obtenerDatos();
        foreach ($seguros as $grupoSeguro) {
            if (in_array($seguroSlug, array_column($grupoSeguro["seguros"], "slug"))) {
                return true;
            }
        }
        return false;
    }
}
