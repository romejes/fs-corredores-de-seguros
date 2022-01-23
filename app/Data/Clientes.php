<?php

namespace App\Data;

class Clientes
{
    /**
     * Obtiene toda la informacion de los seguros
     *
     * @return array
     */
    public static function obtenerDatos()
    {
        return [
            "publicas" => array(
                array(
                    "logo" => "mun_cp_sanantonio_moquegua.png",
                    "nombre" => "Municipalidad de C.P. San Antonio",
                ),
                array(
                    "logo" => "mun_dist_albarracin.png",
                    "nombre" => "Municipalidad Distrital Gregorio Albarracín Lanchipa",
                ),
                array(
                    "logo" => "mun_dist_calana.png",
                    "nombre" => "Municipalidad Distrital de Calana",
                ),
                array(
                    "logo" => "mun_dist_carumas_moquegua.png",
                    "nombre" => "Municipalidad Distrital de Carumas",
                ),
                array(
                    "logo" => "mun_dist_ciudadnueva.png",
                    "nombre" => "Municipalidad Distrital de Ciudad Nueva",
                ),
                array(
                    "logo" => "mun_dist_estique.png",
                    "nombre" => "Municipalidad Distrital de Estique",
                ),
                array(
                    "logo" => "mun_dist_inclan.png",
                    "nombre" => "Municipalidad Distrital de Inclán",
                ),
                array(
                    "logo" => "mun_dist_ite.png",
                    "nombre" => "Municipalidad Distrital de Ite",
                ),
                array(
                    "logo" => "mun_prov_tarata.png",
                    "nombre" => "Municipalidad Distrital de Tarata",
                ),
                array(
                    "logo" => "mun_dist_palca_tacna.png",
                    "nombre" => "Municipalidad Distrital de Palca",
                ),
                array(
                    "logo" => "mun_dist_pocollay.png",
                    "nombre" => "Municipalidad Distrital de Pocollay",
                ),
                array(
                    "logo" => "mun_prov_candarave.png",
                    "nombre" => "Municipalidad Distrital de Candarave",
                ),
                array(
                    "logo" => "muni_prov_tacna.png",
                    "nombre" => "Municipalidad Provincial de Tacna",
                ),
                array(
                    "logo" => "muni_dist_sama-las_yaras.png",
                    "nombre" => "Municipalidad Distrital de Sama - Las Yaras",
                ),
                array(
                    "logo" => "gobierno_regional_tacna.png",
                    "nombre" => "Gobierno Regional de Tacna",
                ),
                array(
                    "logo" => "pet.png",
                    "nombre" => "Proyecto Especial Tacna",
                ),
                array(
                    "logo" => "unjbg.png",
                    "nombre" => "Universidad Nacional Jorge Basadre Grohmann",
                ),
                array(
                    "logo" => "una.png",
                    "nombre" => "Universidad Nacional del Altiplano",
                ),
            ),
            "privadas" => array(
                array(
                    "logo" => null,
                    "nombre" => "PROMELEC S.A.C",
                ),
            )
        ];
    }
}
