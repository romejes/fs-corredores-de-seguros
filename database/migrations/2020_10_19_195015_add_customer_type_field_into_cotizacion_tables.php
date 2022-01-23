<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddCustomerTypeFieldIntoCotizacionTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table("DetalleCotizacionSoat", function (Blueprint $table) {
            $table->char("TipoCliente", 1);

            $table->string("RazonSocial", 100)->nullable();
            $table->string("Nombres", 40)->nullable()->change();
            $table->string("ApellidoPaterno", 40)->nullable()->change();
        });

        Schema::table("DetalleCotizacionVtr", function (Blueprint $table) {
            $table->char("TipoCliente", 1);

            $table->string("RazonSocial", 100)->nullable();
            $table->string("Nombres", 40)->nullable()->change();
            $table->string("ApellidoPaterno", 40)->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table("DetalleCotizacionSoat", function (Blueprint $table) {
            $table->dropColumn("TipoCliente");
            $table->dropColumn("RazonSocial");

            $table->string("Nombres", 40)->change();
            $table->string("ApellidoPaterno", 40)->change();
        });

        Schema::table("DetalleCotizacionVtr", function (Blueprint $table) {
            $table->dropColumn("TipoCliente");
            $table->dropColumn("RazonSocial");

            $table->string("Nombres", 40)->change();
            $table->string("ApellidoPaterno", 40)->change();
        });
    }
}
