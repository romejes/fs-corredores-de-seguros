<?php

namespace App\Mail;

use App\Models\DetalleCotizacionVtr;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class CotizacionSeguroVehiculoTodoRiesgoMail extends Mailable
{
    use Queueable, SerializesModels;


    public $data;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(DetalleCotizacionVtr $detalle)
    {
        $this->data = $detalle;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject("[Cotizacion Seguro Vehicular] Nueva solicitud")
            ->view("email.cotizacion_seguro_vehiculo_todo_riesgo")
            ->with("detalle", $this->data);
    }
}
