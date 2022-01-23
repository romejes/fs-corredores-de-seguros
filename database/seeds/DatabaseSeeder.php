<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Schema;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();

        DB::table("Perfil")->truncate();
        DB::table("Perfil")->insert([
            "IdPerfil" => 1,
            "Descripcion" => "Administrador"
        ]);

        DB::table("Usuario")->truncate();
        DB::table("Usuario")->insert([
            "NombreUsuario" => "fsca",
            "Clave" => Hash::make("fsca"),
            "IdPerfil" => 1
        ]);

        DB::table("TipoDocumentoIdentidad")->truncate();
        DB::table("TipoDocumentoIdentidad")->insert([
            [
                "IdTipoDocumentoIdentidad" => 1,
                "Descripcion" => "Documento Nacional de Identidad",
            ],
            [
                "IdTipoDocumentoIdentidad" => 2,
                "Descripcion" => "Carnet de Extranjería",
            ],
            [
                "IdTipoDocumentoIdentidad" => 3,
                "Descripcion" => "Pasaporte",
            ],
            [
                "IdTipoDocumentoIdentidad" => 4,
                "Descripcion" => "Registro Unico de Contribuyente (RUC)",
            ],
            [
                "IdTipoDocumentoIdentidad" => 5,
                "Descripcion" => "Otro",
            ],
        ]);

        DB::table("Pais")->truncate();
        DB::table("Pais")->insert([
            [
                "Codigo" => "AR",
                "Nombre" => "Argentina"
            ],
            [
                "Codigo" => "BO",
                "Nombre" => "Bolivia"
            ],
            [
                "Codigo" => "BR",
                "Nombre" => "Brasil"
            ],
            [
                "Codigo" => "CA",
                "Nombre" => "Canadá"
            ],
            [
                "Codigo" => "CL",
                "Nombre" => "Chile"
            ],
            [
                "Codigo" => "CO",
                "Nombre" => "Colombia"
            ],
            [
                "Codigo" => "EC",
                "Nombre" => "Ecuador"
            ],
            [
                "Codigo" => "US",
                "Nombre" => "Estados Unidos"
            ],
            [
                "Codigo" => "MX",
                "Nombre" => "México"
            ],
            [
                "Codigo" => "PY",
                "Nombre" => "Paraguay"
            ],
            [
                "Codigo" => "PE",
                "Nombre" => "Perú"
            ],
            [
                "Codigo" => "UY",
                "Nombre" => "Uruguay"
            ],
            [
                "Codigo" => "VE",
                "Nombre" => "Venezuela"
            ],
        ]);

        DB::table("EstadoSolicitud")->truncate();
        DB::table("EstadoSolicitud")->insert([
            [
                "IdEstadoSolicitud" => 1,
                "Descripcion" => "En espera"
            ],
            [
                "IdEstadoSolicitud" => 2,
                "Descripcion" => "Atendiendo"
            ],
            [
                "IdEstadoSolicitud" => 3,
                "Descripcion" => "Atendido"
            ],
            [
                "IdEstadoSolicitud" => 4,
                "Descripcion" => "Rechazado"
            ],
        ]);

        DB::table("ClaseVehiculo")->truncate();
        DB::table("ClaseVehiculo")->insert([
            [
                "IdClaseVehiculo" => 1,
                "Descripcion" => "Automóvil"
            ],
            [
                "IdClaseVehiculo" => 2,
                "Descripcion" => "Camioneta PickUp/Cabina Simple"
            ],
            [
                "IdClaseVehiculo" => 3,
                "Descripcion" => "Camioneta PickUp/Doble Cabina"
            ],
            [
                "IdClaseVehiculo" => 4,
                "Descripcion" => "Camioneta Rural hasta 9 Astos"
            ],
            [
                "IdClaseVehiculo" => 5,
                "Descripcion" => "Camioneta Station Wagon"
            ],
            [
                "IdClaseVehiculo" => 6,
                "Descripcion" => "Camioneta Rural + de 9 Astos"
            ],
            [
                "IdClaseVehiculo" => 7,
                "Descripcion" => "Microbús"
            ],
            [
                "IdClaseVehiculo" => 8,
                "Descripcion" => "Ómnibus"
            ],
            [
                "IdClaseVehiculo" => 9,
                "Descripcion" => "Camioneta Panel"
            ],
            [
                "IdClaseVehiculo" => 10,
                "Descripcion" => "Vehiculo Menor"
            ],
            [
                "IdClaseVehiculo" => 11,
                "Descripcion" => "Furgoneta"
            ],
            [
                "IdClaseVehiculo" => 12,
                "Descripcion" => "Remolcador < 3.5 Toneladas"
            ],
            [
                "IdClaseVehiculo" => 13,
                "Descripcion" => "Camion < 12 Toneladas"
            ],
            [
                "IdClaseVehiculo" => 14,
                "Descripcion" => "Camion Baranda"
            ],
            [
                "IdClaseVehiculo" => 15,
                "Descripcion" => "Remolcador 3.5 a 12 Toneladas"
            ],
            [
                "IdClaseVehiculo" => 16,
                "Descripcion" => "Volquete < 12 Toneladas"
            ],
            [
                "IdClaseVehiculo" => 17,
                "Descripcion" => "Camion > 12 Toneladas"
            ],
            [
                "IdClaseVehiculo" => 18,
                "Descripcion" => "Remolcador > 12 Toneladas"
            ],
            [
                "IdClaseVehiculo" => 19,
                "Descripcion" => "Volquete > 12 Toneladas"
            ],
        ]);

        Schema::enableForeignKeyConstraints();
    }
}
