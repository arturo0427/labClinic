<?php

namespace App\Http\Controllers;

use App\Consulta;
use App\Reservation;
use App\User;
use Illuminate\Http\Request;

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
        $consultas = Consulta::where('status', 0)->get();
        $users = User::all();
        $reservation = Reservation::where('status', 0)->get();

        return view('backoffice.home', [
            'consultas' => $consultas,
            'users' => $users,
            'reservation' => $reservation,
        ]);
    }
}
