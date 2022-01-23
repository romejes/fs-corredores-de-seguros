<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Models\DetalleAfiliacionSeguroEstudiante;

class AfiliacionSeguroEstudianteMail extends Mailable
{
    use Queueable, SerializesModels;

    public $data;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(DetalleAfiliacionSeguroEstudiante $detalle)
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
        return $this->subject("[Afiliacion Seguro Estudiantil] Nueva solicitud")
            ->view("email.afiliacion_seguro_estudiante")
            ->with("detalle", $this->data);
    }
}
