<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class graficaController extends Controller
{

    public function insumos()
    {
        $insumos = DB::table('insumos')
            ->where('usos', '<=', 10)
            ->orderBy('usos', 'ASC')
            ->take(8)
            ->get();
//        dd($insumos);

        return response()->json([
            'insumos' => $insumos,
        ]);
    }

    public function total_costo_consultas()
    {
        dd('hola');
    }
}
