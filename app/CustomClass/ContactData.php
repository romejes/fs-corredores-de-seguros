<?php

namespace App\CustomClass;

class ContactData
{
    private $remitente;
    private $asunto;
    private $correo;
    private $telefono;
    private $mensaje;

    public function __construct($_remitente, $_asunto, $_correo, $_telefono, $_mensaje)
    {
        $this->remitente = $_remitente;
        $this->asunto = $_asunto;
        $this->correo = $_correo;
        $this->telefono = $_telefono;
        $this->mensaje = $_mensaje;
    }

    public function getRemitente()
    {
        return $this->remitente;
    }

    public function getAsunto()
    {
        return $this->asunto;
    }

    public function getCorreo()
    {
        return $this->correo;
    }

    public function getTelefono()
    {
        return $this->telefono;
    }

    public function getMensaje()
    {
        return $this->mensaje;
    }
}
