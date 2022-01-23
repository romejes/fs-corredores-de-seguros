<?php

namespace App\Mail;

use App\Models\DetalleCompraSoat;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class CompraSoatMail extends Mailable
{
    use Queueable, SerializesModels;

    public $data;
    
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(DetalleCompraSoat $detalle)
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
        return $this->subject("[Compra SOAT] Nueva solicitud")
            ->view("email.compra_soat")
            ->with("detalle", $this->data);
    }
}
