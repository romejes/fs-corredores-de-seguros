<?php

namespace App\Http\Controllers\FrontEnd;

use App\Data\Carousel;
use App\Data\Clientes;
use App\Data\Seguro;
use App\Data\Servicio;
use App\Data\Staff;
use App\Data\ValoresEmpresa;
use App\Http\Controllers\Controller;
use App\Models\ClaseVehiculo;
use App\Models\Pais;
use App\Models\TipoDocumentoIdentidad;
use Illuminate\Support\Facades\Config;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class WebController extends Controller
{
    private $modelTipoDocumentoIdentidad;
    private $modelClaseVehiculo;
    private $modelPais;
    private $dataControlador;

    public function __construct(TipoDocumentoIdentidad $tipoDocumentoIdentidad, ClaseVehiculo $claseVehiculo, Pais $pais)
    {
        $this->modelTipoDocumentoIdentidad = $tipoDocumentoIdentidad;
        $this->modelClaseVehiculo = $claseVehiculo;
        $this->modelPais = $pais;
        $this->dataControlador = [
            "seguros" => Seguro::obtenerDatos(),
            "servicios" => Servicio::obtenerDatos()
        ];
    }

    /**
     * Muestra la página de Inicio
     *
     * @return View
     */
    public function inicio()
    {
        $imagenesCarousel = Carousel::obtenerDatos();
        $segurosPrincipales = Seguro::mostrarSegurosPrincipales();

        $this->dataControlador['imagenesCarousel'] = $imagenesCarousel;
        $this->dataControlador['segurosPrincipales'] = $segurosPrincipales;
        return view('web.paginas.inicio', $this->dataControlador);
    }

    /**
     * Muestra la pagina Nosotros
     *
     * @return View
     */
    public function nosotros()
    {
        $staff = Staff::obtenerDatos();
        $valores = ValoresEmpresa::obtenerDatos();

        $this->dataControlador['staff'] = $staff;
        $this->dataControlador['valores'] = $valores;
        return view("web.paginas.nosotros", $this->dataControlador);
    }   

    /**
     * Muestra la página de Clientes
     *
     * @return View
     */
    public function clientes()
    {
        $clientes = Clientes::obtenerDatos();
        $this->dataControlador['clientes'] = $clientes;
        return view("web.paginas.clientes", $this->dataControlador);
    }    

    /**
     * Muestra la página de Contacto
     *
     * @return View
     */
    public function contacto()
    {
        return view("web.paginas.contacto", $this->dataControlador);
    }

    /**
     * Muestra la página de Seguros
     *
     * @param string $tipoSeguro
     * @return View
     */
    public function seguros($seguro = null)
    {
        //  Si no se especifica el tipo de seguro, muestra la pagina principal de la seccion Seguros
        if (!$seguro) {
            return view("web.paginas.seguros.index", $this->dataControlador);
        }
        
        //  Comprueba que el parametro enviado coincida dentro del elemento slug del arreglo de solicitudes
        //  que se muestra al inicio de la funcion.
        //  Si no existe, se lanzará una excepcion.
        $seguroExiste = Seguro::verificarSiExisteSeguro($seguro);
        if (!$seguroExiste) {
            throw new NotFoundHttpException();
        }

        return view("web.paginas.seguros." . $seguro, $this->dataControlador);
    }

    /**
     * Mostrar la pagina de Solicitudes
     *
     * @param string $solicitud
     * @return View
     */
    public function serviciosEnLinea($servicio = null)
    {
        if (!$servicio) {
            return view('web.paginas.servicios.index', $this->dataControlador);
        }

        //  Comprueba que el parametro enviado coincida dentro del elemento slug del arreglo de solicitudes
        //  que se muestra al inicio de la funcion.
        //  Si no existe, se lanzará una excepcion.
        $servicioExiste = Servicio::verificarSiExisteServicio($servicio);
        if (!$servicioExiste) {
            throw new NotFoundHttpException();
        }

        //  Obtener datos para mostrar la pagina detalle de cada pagina de solicitud
        $this->dataControlador["tipoDocumentoIdentidad"] = $this->modelTipoDocumentoIdentidad->getByTipoCliente(
            Config::get("constants.tipo_cliente.persona_natural")
        );
        $this->dataControlador["claseVehiculo"] =  $this->modelClaseVehiculo->getAll();
        $this->dataControlador["paises"] = $this->modelPais->getAll();;

        return view("web.paginas.servicios." . $servicio, $this->dataControlador);
    }
}
