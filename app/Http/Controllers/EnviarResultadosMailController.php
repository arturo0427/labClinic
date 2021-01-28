<?php

namespace App\Http\Controllers;

use App\Mail\EnviarResultadosMail;

use Illuminate\Http\Request;
use App\Consulta;
use App\User;

use Illuminate\Support\Facades\Mail;


class EnviarResultadosMailController extends Controller
{

    public function sendEmailToUser()
    {


        $to_email = "familiapozonoboa1216@gmail.com";

        Mail::to($to_email)->send(new EnviarResultadosMail);

        return "<p> Your E-mail has been sent successfully. </p>";

    }

    public function enviar_resultados_email_to_user($id)
    {
        $consulta = Consulta::find($id);
        $data["email"] = $consulta->user->email;
        $data["title"] = "Laboratorio Clínico El Ángel";
        $data["body"] = "Resultados clínicos";

        $medico = User::find($consulta->medico_id);

        $pdf = \PDF::loadView('backoffice.pdf.resultadosPDF', compact('consulta', 'medico'));
        Mail::send('backoffice.pages.email.index', $data, function ($message) use ($data, $pdf) {
            $message->to($data["email"], $data["email"])
                ->subject($data["title"])
                ->attachData($pdf->output(), "resultadosExámen.pdf");
        });

        toast('Email enviado', 'success')->autoClose(3000);
        return redirect()->route('consultas.index');
    }
}
