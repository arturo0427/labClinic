<?php

namespace App\Http\Controllers;

use App\Reservation;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\DataTables;

class ReservationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {

            $reservations = Reservation::latest()->get();

            return Datatables::of($reservations)
                ->addIndexColumn()
                ->addColumn('status', function (Reservation $reservation) {
                    $badge = '';
                    if ($reservation->status == 0) {
                        $badge = '<span class="badge bg-danger">En espera</span>';
                        return $badge;
                    } else if ($reservation->status == 1) {
                        $badge = '<span class="badge bg-success">Atendido</span>';
                        return $badge;
                    }
                })
                ->rawColumns(['status'])
                ->make(true);


        }

        return view('backoffice.pages.reservation.index');
    }

    public function datosCalendario()
    {
        $reservations['eventos'] = DB::table('reservations')->where('status', 0)->get();

//        $reservations['eventos'] = Reservation::all();
        return response()->json($reservations['eventos']);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $rules = [
            'fecha_cita' => 'required',
            'hora_cita' => 'required',
            'des_diagnostico' => 'required',
        ];

        $messages = [
            'fecha_cita.required' => 'La fecha de cita es necesaria.',
            'hora_cita.required' => 'La hora de cita es necesaria.',
            'des_diagnostico.required' => 'La descripción del diagnóstio es necesaria.',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return redirect('reservations')
                ->withErrors($validator)
                ->withInput();
        } else {
            $user_id = Auth()->user()->id;
            $user_nombre = Auth()->user()->name;
            $user_apellido = Auth()->user()->apellido;
            $hora_inicio = $request->hora_cita;
            $hora_fin = Carbon::parse($hora_inicio)->addMinute(15)->toTimeString();


            $reservation = Reservation::create([
                'title' => $user_apellido . " " . $user_nombre,
                'start' => $request->input('fecha_cita') . " " . $hora_inicio,
                'end' => $request->input('fecha_cita') . " " . $hora_fin,
                'hora_inicio' => $hora_inicio,
                'hora_fin' => $hora_fin,
                'des_diagnostico' => $request->input('des_diagnostico'),
                'status' => 0,
                'user_id' => $user_id,
            ]);


            toast('Reservación asignada', 'success')->autoClose(4000);
            return view('backoffice.pages.reservation.index', [
                'reservation' => $reservation,
            ]);

        }

    }

    /**
     * Display the specified resource.
     *
     * @param \App\Reservation $reservation
     * @return \Illuminate\Http\Response
     */
    public function show()
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Reservation $reservation
     * @return \Illuminate\Http\Response
     */
    public function edit(Reservation $reservation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Reservation $reservation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Reservation $reservation)
    {
        //
    }

    public function atenderCita($id)
    {
        $reservation = Reservation::find($id);
        $reservation->status = 1;
        $reservation->save();

        return response()->json([
            'type' => 'success',
            'message' => 'Cita médica atendida']);

    }

    public function reservationTable(Request $request)
    {
        dd($request);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Reservation $reservation
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $userId = Auth()->user()->id;
        $user = Auth()->user();
        $reservacion = Reservation::find($id)->user_id;

        if ($userId == $reservacion || $user->hasRole('Administrador')) {
            Reservation::find($id)->delete();

            return response()->json([
                'type' => 'success',
                'message' => 'Evento eliminado correctamente']);
        } else {
            return response()->json([
                'type' => 'error',
                'message' => 'Solo el usuario que realizó la reservación puede eliminar']);
        }

    }
}
