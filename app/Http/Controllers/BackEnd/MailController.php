<?php

namespace App\Http\Controllers\BackEnd;

use App\Mail\ContactMail;
use Illuminate\Http\Request;
use App\CustomClass\ContactData;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Config;

class MailController extends Controller
{
    private $correoDestino;

    public function __construct() {
        $this->correoDestino = Config::get('mail.to');
    }

    public function __invoke(Request $request)
    {
        $contactData = new ContactData(
            $request->input("nombres-apellidos"),
            $request->input("asunto"),
            $request->input("email"),
            $request->input("telefono"),
            $request->input("comentario")
        );

        Mail::to($this->correoDestino)->send(new ContactMail($contactData));
    }
}
