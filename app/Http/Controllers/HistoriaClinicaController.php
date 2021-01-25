<?php

namespace App\Http\Controllers;

use App\Consulta;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\DataTables;

class HistoriaClinicaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        if ($request->ajax()) {
            $user = Auth()->user();
            $consulta = DB::table('consultas')
                ->where('user_id', $user->id)
                ->where('status', 1)
                ->get();

            return Datatables::of($consulta)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $user = Auth()->user();
                    $btn = '';
                    if ($user->can('historiaClinica.show')) {
                        $btn = ' <a href="historiaClinica/' . $row->id . '/show" data-toggle="tooltip"  data-id="' . $row->id . '" data-original-title="Delete" class="btn btn-success btn-sm showHistoriaClinica">Ver</a>';
                    }
                    return $btn;
                })->addColumn('status', function ($consulta) {
                    $badge = '';
                    if ($consulta->status == 0) {
                        $badge = '<span class="badge bg-danger">En espera</span>';
                        return $badge;
                    } else if ($consulta->status == 1) {
                        $badge = '<span class="badge bg-success">Atendido</span>';
                        return $badge;
                    }
                })
                ->rawColumns(['action', 'status'])
                ->make(true);
        }

        return view('backoffice.pages.historiaClinica.index');
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $consulta = Consulta::find($id);
        $medico = User::find($consulta->medico_id);

        return view('backoffice.pages.historiaClinica.show', [
            'consulta' => $consulta,
            'medico' => $medico,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
