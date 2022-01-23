<?php

$factory->define(App\Models\DetalleCompraSoat::class, function (Faker\Generator $faker) {
    return [
        "IdSolicitud" => function () {
            return factory(\App\Models\Solicitud::class)->states("en_atencion")->create()->IdSolicitud;
        },
        "Nombres" => $faker->name,
        "ApellidoPaterno" => $faker->lastName,
        "ApellidoMaterno" => $faker->lastName,
        "FechaNacimiento" => $faker->date,
        "Telefono" => $faker->phoneNumber,
        "Email" => $faker->email,
        "IdTipoDocumentoIdentidad" => 1,
        "NumeroDocumentoIdentidad" => $faker->numerify("########"),
    ];
});

$factory->state(App\Models\DetalleCompraSoat::class, "adquisicion", function (Faker\Generator $faker) {
    return [
        "TipoCompra" => "Adquisicion",
        "Direccion" => $faker->streetAddress,
        "Placa" => substr($faker->word, 0, 6),
        "Asientos" => $faker->randomNumber(2),
        "Uso" => $faker->randomElement(["Particular", "Escolar", "Carga", "Transporte de Personal"]),
        "AnioVehiculo" => $faker->year(),
        "CompaniaSeguro" => $faker->randomElement(["MAPFRE", "La Positiva", "Pacifico", "Rimac"]),
        "ImagenTarjetaPropiedad" => $faker->imageUrl(),
        "ImagenDni" => $faker->imageUrl()
    ];
});

$factory->state(App\Models\DetalleCompraSoat::class, "renovacion", function (Faker\Generator $faker) {
    return [
        "TipoCompra" => "Renovación",
        "ImagenPoliza" => $faker->imageUrl(),
    ];
});
