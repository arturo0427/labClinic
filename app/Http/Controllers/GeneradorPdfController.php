<?php

namespace App\Http\Controllers;

use App\Consulta;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;


class GeneradorPdfController extends Controller
{
    public function imprimir($id)
    {
        $consulta = Consulta::find($id);
        $medico = User::find($consulta->medico_id);

        $pdf = \PDF::loadView('backoffice.pdf.resultadosPDF', compact('consulta', 'medico'));
//        return $pdf->download($consulta->id . '_' . $consulta->user->id . '.pdf');
        Mail::send();

        return $pdf->stream($consulta->id . '_' . $consulta->user->id . '.pdf');
    }


}
