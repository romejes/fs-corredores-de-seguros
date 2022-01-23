<?php

namespace App\Mail;

use App\CustomClass\ContactData;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ContactMail extends Mailable
{
    use Queueable, SerializesModels;

    public $contactData;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(ContactData $_contactData)
    {
        $this->contactData = $_contactData;
    }

    /**
     * Build the message.
     *
     * @return View 
     */
    public function build()
    {
        return $this->subject($this->contactData->getAsunto())
            ->view("email.contact", [
                "contactData" => $this->contactData,
            ]);
    }
}
