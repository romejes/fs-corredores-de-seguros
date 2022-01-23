<?php

$factory->define(App\Models\DetalleAfiliacionSeguroEstudiante::class, function (Faker\Generator $faker) {
    return [
        "IdSolicitud" => function () {
            return factory(\App\Models\Solicitud::class)->states("en_atencion")->create()->IdSolicitud;
        },
        "Nombres" => $faker->name,
        "ApellidoPaterno" => $faker->lastName,
        "ApellidoMaterno" => $faker->lastName,
        "Sexo" => $faker->randomElement(["M", "F", "X"]),
        "EstadoCivil" => $faker->randomElement(["Casado", "Soltero"]),
        "FechaNacimiento" => $faker->date,
        "Telefono" => $faker->phoneNumber,
        "Email" => $faker->email,
        "CodigoPais"=> "PE",
        "IdTipoDocumentoIdentidad" => 1,
        "NumeroDocumentoIdentidad" => $faker->numerify("########"),
        "ImagenVoucher" => $faker->imageUrl()
    ];
});