<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class SetRelationships extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table("Usuario", function (Blueprint $table) {
            $table->foreign("IdPerfil", "FK_Usuario_Perfil")
                ->on("Perfil")
                ->references("IdPerfil");
        });

        Schema::table("Solicitud", function (Blueprint $table) {
            $table->foreign("IdEstadoSolicitud", "FK_Solicitud_EstadoSolicitud")
                ->on("EstadoSolicitud")
                ->references("IdEstadoSolicitud");
        });

        Schema::table("DetalleCotizacionSoat", function (Blueprint $table) {
            $table->foreign("IdSolicitud", "FK_DetalleCotizacionSoat_Solicitud")
                ->on("Solicitud")
                ->references("IdSolicitud");

            $table->foreign("IdTipoDocumentoIdentidad", "FK_DetalleCotizacionSoat_TipoDocumentoIdentidad")
                ->on("TipoDocumentoIdentidad")
                ->references("IdTipoDocumentoIdentidad");
        });

        Schema::table("DetalleCotizacionVtr", function (Blueprint $table) {
            $table->foreign("IdSolicitud", "FK_DetalleCotizacionVtr_Solicitud")
                ->on("Solicitud")
                ->references("IdSolicitud");

            $table->foreign("IdTipoDocumentoIdentidad", "FK_DetalleCotizacionVtr_TipoDocumentoIdentidad")
                ->on("TipoDocumentoIdentidad")
                ->references("IdTipoDocumentoIdentidad");

            $table->foreign("IdClaseVehiculo", "FK_DetalleCotizacionVtr_ClaseVehiculo")
                ->on("ClaseVehiculo")
                ->references("IdClaseVehiculo");
        });

        Schema::table("DetalleCompraSoat", function (Blueprint $table) {
            $table->foreign("IdSolicitud", "FK_DetalleCompraSoat_Solicitud")
                ->on("Solicitud")
                ->references("IdSolicitud");

            $table->foreign("IdTipoDocumentoIdentidad", "FK_DetalleCompraSoat_TipoDocumentoIdentidad")
                ->on("TipoDocumentoIdentidad")
                ->references("IdTipoDocumentoIdentidad");
        });

        Schema::table("DetalleAfiliacionSeguroEstudiante", function (Blueprint $table) {
            $table->foreign("IdSolicitud", "FK_DetalleAfiliacionSeguroEstudiante_Solicitud")
                ->on("Solicitud")
                ->references("IdSolicitud");

            $table->foreign("IdTipoDocumentoIdentidad", "FK_DetalleAfiliacionSeguroEstudiante_TipoDocumentoIdentidad")
                ->on("TipoDocumentoIdentidad")
                ->references("IdTipoDocumentoIdentidad");

            $table->foreign("CodigoPais", "FK_DetalleAfiliacionSeguroEstudiante_Pais")
                ->on("Pais")
                ->references("Codigo");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table("Solicitud", function (Blueprint $table) {
            $table->dropForeign("FK_Solicitud_EstadoSolicitud");
        });
        
        Schema::table("DetalleAfiliacionSeguroEstudiante", function (Blueprint $table) {
            $table->dropForeign("FK_DetalleAfiliacionSeguroEstudiante_Solicitud");
            $table->dropForeign("FK_DetalleAfiliacionSeguroEstudiante_TipoDocumentoIdentidad");
            $table->dropForeign("FK_DetalleAfiliacionSeguroEstudiante_Pais");
        });

        Schema::table("DetalleCompraSoat", function (Blueprint $table) {
            $table->dropForeign("FK_DetalleCompraSoat_Solicitud");
            $table->dropForeign("FK_DetalleCompraSoat_TipoDocumentoIdentidad");
        });

        Schema::table("DetalleCotizacionVtr", function (Blueprint $table) {
            $table->dropForeign("FK_DetalleCotizacionVtr_Solicitud");
            $table->dropForeign("FK_DetalleCotizacionVtr_TipoDocumentoIdentidad");
            $table->dropForeign("FK_DetalleCotizacionVtr_ClaseVehiculo");
        });

        Schema::table("DetalleCotizacionSoat", function (Blueprint $table) {
            $table->dropForeign("FK_DetalleCotizacionSoat_Solicitud");
            $table->dropForeign("FK_DetalleCotizacionSoat_TipoDocumentoIdentidad");
        });

        Schema::table("Usuario", function (Blueprint $table) {
            $table->dropForeign("FK_Usuario_Perfil");
        });
    }
}
