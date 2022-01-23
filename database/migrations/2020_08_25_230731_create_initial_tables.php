<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInitialTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create("Usuario", function (Blueprint $table) {
            $table->increments("IdUsuario");
            $table->string("NombreUsuario", 20)->unique();
            $table->string("Clave", 255);
            $table->unsignedInteger("IdPerfil");
        });

        Schema::create("Perfil", function (Blueprint $table) {
            $table->increments("IdPerfil");
            $table->string("Descripcion", 20);
        });

        Schema::create("TipoDocumentoIdentidad", function (Blueprint $table) {
            $table->increments("IdTipoDocumentoIdentidad");
            $table->string("Descripcion", 50);
        });
        
        Schema::create("ClaseVehiculo", function (Blueprint $table) {
            $table->increments("IdClaseVehiculo");
            $table->string("Descripcion", 100);
        });

        Schema::create("EstadoSolicitud", function (Blueprint $table) {
            $table->increments("IdEstadoSolicitud");
            $table->string("Descripcion", 30);
        });

        Schema::create("Solicitud", function (Blueprint $table) {
            $table->bigIncrements("IdSolicitud");
            $table->string("Codigo", 15);
            $table->string("Producto", 200);
            $table->string("Tipo", 30);
            $table->unsignedInteger("IdEstadoSolicitud");
            $table->boolean("Activo")->default(true);
            $table->dateTime("FechaHoraRegistro");
        });

        Schema::create("DetalleCotizacionSoat", function (Blueprint $table) {
            $table->bigIncrements("IdDetalleCotizacionSoat");
            $table->unsignedBigInteger("IdSolicitud");
            $table->string("Nombres", 40);
            $table->string("ApellidoPaterno", 40);
            $table->string("ApellidoMaterno", 40)->nullable();
            $table->string("Telefono", 40);
            $table->string("Email", 40)->nullable();
            $table->unsignedInteger("IdTipoDocumentoIdentidad");
            $table->string("NumeroDocumentoIdentidad", 15);
            $table->boolean("TieneSoat");
            $table->string("Placa", 10);
            $table->tinyInteger("Asientos");
            $table->string("Uso");
            $table->smallInteger("AnioVehiculo");
            $table->string("CompaniaSeguro", 25);
            $table->date("FechaVencimiento")->nullable();
        });

        Schema::create("DetalleCotizacionVtr", function (Blueprint $table) {
            $table->bigIncrements("IdDetalleCotizacionVtr");
            $table->unsignedBigInteger("IdSolicitud");
            $table->string("Nombres", 40);
            $table->string("ApellidoPaterno", 40);
            $table->string("ApellidoMaterno", 40)->nullable();
            $table->string("Telefono", 40);
            $table->string("Email", 40)->nullable();
            $table->unsignedInteger("IdTipoDocumentoIdentidad");
            $table->string("NumeroDocumentoIdentidad", 15);
            $table->string("Placa", 10);
            $table->tinyInteger("Asientos");
            $table->string("Uso");
            $table->smallInteger("AnioVehiculo");
            $table->unsignedInteger("IdClaseVehiculo");
            $table->string("Marca", 50);
            $table->string("Modelo", 100);
            $table->decimal("CostoVehiculo", 15, 2);
            $table->string("CompaniaSeguro", 25);
        });

        Schema::create("DetalleCompraSoat", function (Blueprint $table) {
            $table->bigIncrements("IdDetalleCompraSoat");
            $table->unsignedBigInteger("IdSolicitud");
            $table->string("Nombres", 40);
            $table->string("ApellidoPaterno", 40);
            $table->string("ApellidoMaterno", 40)->nullable();
            $table->date("FechaNacimiento");
            $table->string("Telefono", 40);
            $table->string("Email", 40)->nullable();
            $table->unsignedInteger("IdTipoDocumentoIdentidad");
            $table->string("NumeroDocumentoIdentidad", 15);
            $table->string("Direccion", 100)->nullable();
            $table->string("Placa", 10)->nullable();
            $table->tinyInteger("Asientos")->nullable();
            $table->string("Uso")->nullable();
            $table->smallInteger("AnioVehiculo")->nullable();
            $table->string("CompaniaSeguro", 25)->nullable();
            $table->string("TipoCompra", 30);
            $table->string("ImagenPoliza", 300)->nullable();
            $table->string("ImagenTarjetaPropiedad", 300)->nullable();
            $table->string("ImagenDni", 300)->nullable();
        });

        Schema::create("DetalleAfiliacionSeguroEstudiante", function (Blueprint $table) {
            $table->bigIncrements("IdDetalleAfiliacionSeguroEstudiante");
            $table->unsignedBigInteger("IdSolicitud");
            $table->string("Nombres", 40);
            $table->string("ApellidoPaterno", 40);
            $table->string("ApellidoMaterno", 40)->nullable();
            $table->char("Sexo", 1);
            $table->string("EstadoCivil", 15);
            $table->date("FechaNacimiento");
            $table->string("Telefono", 40);
            $table->string("Email", 40)->nullable();
            $table->char("CodigoPais", 2);
            $table->unsignedInteger("IdTipoDocumentoIdentidad");
            $table->string("NumeroDocumentoIdentidad", 15);
            $table->string("ImagenVoucher", 300);
        });
        
        Schema::create("Pais", function (Blueprint $table) {
            $table->char("Codigo", 2)->primary();
            $table->string("Nombre", 100);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists("Pais");
        Schema::dropIfExists("DetalleAfiliacionSeguroEstudiante");
        Schema::dropIfExists("DetalleCompraSoat");
        Schema::dropIfExists("DetalleCotizacionVtr");
        Schema::dropIfExists("DetalleCotizacionSoat");
        Schema::dropIfExists("Solicitud");
        Schema::dropIfExists("EstadoSolicitud");
        Schema::dropIfExists("ClaseVehiculo");
        Schema::dropIfExists("TipoDocumentoIdentidad");
        Schema::dropIfExists("Usuario");
        Schema::dropIfExists("Perfil");
    }
}
