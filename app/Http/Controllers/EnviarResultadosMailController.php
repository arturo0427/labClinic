<?php

namespace App\Http\Controllers;

use App\Mail\EnviarResultadosMail;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Mail;


class EnviarResultadosMailController extends Controller
{

    public function sendEmailToUser()
    {



        $to_email = "familiapozonoboa1216@gmail.com";

        Mail::to($to_email)->send(new EnviarResultadosMail);

        return "<p> Your E-mail has been sent successfully. </p>";

    }
}
