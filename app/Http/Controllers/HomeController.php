<?php

namespace App\Http\Controllers;

use App\Consulta;
use App\Insumo;
use App\Reservation;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $now = new \DateTime();
        $fecha_caduca_isnumo = $now->format('Y-m-d');

        $user = Auth()->user();
        $consultas = Consulta::where('status', 0)->get();
        $users = User::all();
        $reservation = Reservation::where('status', 0)->get();
        $insumos_por_agotarse = Insumo::where('usos', '<', 10)->get()->take(10);
        $insumos_por_caducar = Insumo::where('fecha_caducidad', '<', $now->format('Y-m-d'))->get();

        return view('backoffice.home', [
            'consultas' => $consultas,
            'users' => $users,
            'reservation' => $reservation,
            'insumos_por_agotarse' => $insumos_por_agotarse,
            'insumos_por_caducar' => $insumos_por_caducar,
        ]);
    }

    public function totalCostos(Request $request)
    {


        if ($request->ajax()) {

            $rules = [
                'fecha_inicio_total_costo_consulta' => 'required',
                'fecha_fin_total_costo_consulta' => 'required',
            ];
            $messages = [
                'fecha_inicio_total_costo_consulta.required' => 'La fecha inicio es requerida',
                'fecha_fin_total_costo_consulta.required' => 'La fecha fin es requerida',
            ];

            $validator = Validator::make($request->all(), $rules, $messages);

            if ($validator->fails()) {
                return response()->json([
                    'type' => 'error',
                    'errors' => $validator->getMessageBag()->toArray()
                ]);
            } else {
                $fechaInicio = $request->input('fecha_inicio_total_costo_consulta');
                $fechaFin = $request->input('fecha_fin_total_costo_consulta');

                $consultas = DB::table('consultas')->whereBetween('created_at', [$fechaInicio, $fechaFin])->get();

                return response()->json([
                    'type' => 'success',
                    'consultas' => $consultas,
                ]);
            }

        } else {
            return response()->json(['status' => 'error', 'message' => "A fallado la solicitud Ajax"]);
        }

    }
}
