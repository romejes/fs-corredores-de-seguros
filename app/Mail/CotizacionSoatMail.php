<?php

namespace App\Mail;

use App\Models\DetalleCotizacionSoat;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class CotizacionSoatMail extends Mailable
{
    use Queueable, SerializesModels;

    public $data;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(DetalleCotizacionSoat $detalle)
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
        return $this->subject("[Cotización SOAT] Nueva solicitud")
        ->view("email.cotizacion_soat")
        ->with("detalle", $this->data);
    }
}
