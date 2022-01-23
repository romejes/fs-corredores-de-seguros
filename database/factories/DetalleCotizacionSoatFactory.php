<?php

$factory->define(App\Models\DetalleCotizacionSoat::class, function (Faker\Generator $faker) {
    return [
        "IdSolicitud" => function () {
            return factory(\App\Models\Solicitud::class)->states("en_atencion")->create()->IdSolicitud;
        },
        "TipoCliente" => "N",
        "Nombres" => $faker->name,
        "ApellidoPaterno" => $faker->lastName,
        "ApellidoMaterno" => $faker->lastName,
        "Telefono" => $faker->phoneNumber,
        "Email" => $faker->email,
        "IdTipoDocumentoIdentidad" => 1,
        "NumeroDocumentoIdentidad" => $faker->numerify("########"),
        "Placa" => substr($faker->word, 0, 6),
        "Asientos" => $faker->randomNumber(2),
        "Uso" => $faker->randomElement(["Particular", "Escolar", "Carga", "Transporte de Personal"]),
        "AnioVehiculo" => $faker->year(),
        "CompaniaSeguro" => $faker->randomElement(["MAPFRE", "La Positiva", "Pacifico", "Rimac"]),
    ];
});

$factory->state(App\Models\DetalleCotizacionSoat::class, "tiene_soat", function (Faker\Generator $faker) {
    return [
        "TieneSoat" => true,
        "FechaVencimiento" => $faker->date
    ];
});

$factory->state(App\Models\DetalleCotizacionSoat::class, "no_tiene_soat", function () {
    return [
        "TieneSoat" => false,
        "FechaVencimiento" => null
    ];
});
