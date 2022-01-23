<?php

use Illuminate\Support\Facades\Route;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/**
 * ==========
 * Vistas
 * ==========
 */

Route::group(["name" => "web"], function () {
    Route::get("/", "FrontEnd\WebController@inicio");

    Route::get("nosotros", "FrontEnd\WebController@nosotros");

    Route::get("seguros/{tipo?}", "FrontEnd\WebController@seguros");

    Route::get("servicios_en_linea/{tipo?}", "FrontEnd\WebController@serviciosEnLinea");

    Route::get("clientes", "FrontEnd\WebController@clientes");

    Route::get("contacto", "FrontEnd\WebController@contacto");
});


Route::get("/intranet/login", "FrontEnd\IntranetController@login");

Route::post("contacto", "BackEnd\MailController");

Route::group(["middleware" => ["auth"]], function () {
    Route::get(
        "intranet",
        "FrontEnd\IntranetController@dashboard"
    );

    Route::get(
        "intranet/compras/soat",
        "FrontEnd\CompraSoatController@index"
    );
    Route::get(
        "intranet/compras/soat/{codigo}",
        "FrontEnd\CompraSoatController@detail"
    );

    Route::get(
        "intranet/compras/soat/{codigo}/adjuntos/{archivo}",
        "FrontEnd\CompraSoatController@downloadFile"
    );

    Route::get(
        "intranet/cotizaciones/soat",
        "FrontEnd\CotizacionSoatController@index"
    );
    Route::get(
        "intranet/cotizaciones/soat/{codigo}",
        "FrontEnd\CotizacionSoatController@detail"
    );

    Route::get(
        "intranet/cotizaciones/vehiculo_todo_riesgo",
        "FrontEnd\CotizacionVtrController@index"
    );
    Route::get(
        "intranet/cotizaciones/vehiculo_todo_riesgo/{codigo}",
        "FrontEnd\CotizacionVtrController@detail"
    );

    Route::get(
        "intranet/afiliaciones/seguro_estudiante",
        "FrontEnd\AfiliacionSeguroEstudianteController@index"
    );

    Route::get(
        "intranet/afiliaciones/seguro_estudiante/{codigo}/adjuntos/{archivo}",
        "FrontEnd\AfiliacionSeguroEstudianteController@downloadFile"
    );

    Route::get(
        "intranet/afiliaciones/seguro_estudiante/{codigo}",
        "FrontEnd\AfiliacionSeguroEstudianteController@detail"
    );
});


/**
 * =========
 * Procesos
 * =========
 */

Route::post("login", "BackEnd\AuthController@login");

Route::get('tipos-documento-identidad', "BackEnd\TipoDocumentoIdentidadController");

Route::post("afiliaciones/seguro_estudiante", "BackEnd\AfiliacionSeguroEstudianteController@store");
Route::post("compras/soat", "BackEnd\CompraSoatController@store");
Route::post("cotizaciones/seguro_vehicular", "BackEnd\CotizacionVehiculoTodoRiesgoController@store");
Route::post("cotizaciones/soat", "BackEnd\CotizacionSoatController@store");

Route::group(["middleware" => ["auth"]], function () {
    Route::get("logout", "BackEnd\AuthController@logout");

    Route::get("compras/soat/{code}", "BackEnd\CompraSoatController@show");
    Route::put("compras/soat/{code}", "BackEnd\CompraSoatController@update");
    Route::get("compras/soat", "BackEnd\CompraSoatController@index");

    Route::get("cotizaciones/soat/{code}", "BackEnd\CotizacionSoatController@show");
    Route::put("cotizaciones/soat/{code}", "BackEnd\CotizacionSoatController@update");
    Route::get("cotizaciones/soat", "BackEnd\CotizacionSoatController@index");

    Route::get("cotizaciones/vehiculo_todo_riesgo/{code}", "BackEnd\CotizacionVehiculoTodoRiesgoController@show");
    Route::put("cotizaciones/vehiculo_todo_riesgo/{code}", "BackEnd\CotizacionVehiculoTodoRiesgoController@update");
    Route::get("cotizaciones/vehiculo_todo_riesgo", "BackEnd\CotizacionVehiculoTodoRiesgoController@index");


    Route::get(
        "afiliaciones/seguro_estudiante/reporte",
        "BackEnd\AfiliacionSeguroEstudianteController@excel"
    );
    Route::get(
        "afiliaciones/seguro_estudiante/{code}",
        "BackEnd\AfiliacionSeguroEstudianteController@show"
    );
    Route::put("afiliaciones/seguro_estudiante/{code}", "BackEnd\AfiliacionSeguroEstudianteController@update");
    Route::get("afiliaciones/seguro_estudiante", "BackEnd\AfiliacionSeguroEstudianteController@index");
});
