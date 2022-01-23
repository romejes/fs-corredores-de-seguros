<?php

$factory->define(App\Models\DetalleCotizacionVtr::class, function (Faker\Generator $faker) {
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
        "IdClaseVehiculo" => $faker->numberBetween(1, 19),
        "Marca" => $faker->word(),
        "Modelo" => $faker->word(),
        "CostoVehiculo" => $faker->randomFloat(8,2),
        "CompaniaSeguro" => $faker->randomElement(["MAPFRE", "La Positiva", "Pacifico", "Rimac"]),
    ];
});