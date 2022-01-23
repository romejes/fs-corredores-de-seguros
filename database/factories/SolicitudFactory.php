<?php

use App\Models\EstadoSolicitud;

$factory->define(App\Models\Solicitud::class, function (Faker\Generator $faker) {
    return [
        "Codigo" => date('Y') . date('m') . date('d') . $faker->numerify("####"),
        "Producto" => $faker->word,
        "Activo" => true,
        "Tipo" => $faker->randomElement(["Afiliacion", "Compra", "Cotizacion"]),
        "FechaHoraRegistro" => $faker->dateTimeThisMonth()
    ];
});

$factory->state(App\Models\Solicitud::class, "en_espera",  function (Faker\Generator $faker) {
    return [
        "IdEstadoSolicitud" => EstadoSolicitud::SOLICITUD_EN_ESPERA
    ];
});

$factory->state(App\Models\Solicitud::class, "en_atencion",  function (Faker\Generator $faker) {
    return [
        "IdEstadoSolicitud" => EstadoSolicitud::SOLICITUD_EN_ATENCION
    ];
});

$factory->state(App\Models\Solicitud::class, "atendido",  function (Faker\Generator $faker) {
    return [
        "IdEstadoSolicitud" => EstadoSolicitud::SOLICITUD_ATENDIDA
    ];
});

$factory->state(App\Models\Solicitud::class, "rechazado",  function (Faker\Generator $faker) {
    return [
        "IdEstadoSolicitud" => EstadoSolicitud::SOLICITUD_RECHAZADA
    ];
});
