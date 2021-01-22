<?php

namespace App\Http\Controllers;

use App\Consulta;
use App\Grupos_detalle_tipoExamen;
use App\Grupos_examen;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class ConsultaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $grupos_tipoExamen = Grupos_detalle_tipoExamen::all();
        $grupos = Grupos_examen::all();


        return view('backoffice.pages.consulta.index', [
            'grupos_tipoExamen' => $grupos_tipoExamen,
            'grupos' => $grupos,
        ]);
    }


    public function buscarPaciente($cedula)
    {
        $user = DB::table('users')->where('cedula', $cedula)->get();

        if ($user->isEmpty()) {
            return response()->json(['type' => 'error']);
        } else {

            return response()->json($user);
        }
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
            'User_id' => 'required',
            'grupoTipo' => ' required',
        ];

        $messages = [
            'User_id.required' => 'Es obligatorio buscar un usuario',
            'grupoTipo.required' => 'Debe seleccionar por lo menos una opción de exámen',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            toast('Debe completar todos los datos', 'error')->autoClose(5000);
            return redirect('crearConsultas')
                ->withErrors($validator)
                ->withInput();
        } else {
            $user = Auth()->user();
            $consulta = Consulta::create([
                'user_id' => $request->input('User_id'),
                'medico_id' => $user->id,
            ]);
            $consulta->grupos_detalles_tiposExamenes()->attach($request->input('grupoTipo'));
            toast('Consulta creada', 'success')->autoClose(4000);
            return redirect('consultas');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Consulta $consulta
     * @return \Illuminate\Http\Response
     */
    public function show(Consulta $consulta)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Consulta $consulta
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $grupos_tipoExamen = Grupos_detalle_tipoExamen::all();
        $grupos = Grupos_examen::all();
        $consulta = Consulta::find($id);


        return view('backoffice.pages.consulta.editCrearConsultas', [
            'consulta' => $consulta,
            'grupos_tipoExamen' => $grupos_tipoExamen,
            'grupos' => $grupos,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Consulta $consulta
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $consulta = Consulta::find($id);
        $consulta->grupos_detalles_tiposExamenes()->sync($request->input('grupoTipo'));

//        $consulta->sync($request->input('grupoTipo'));
//        dd($consulta);
        return redirect('consultas');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Consulta $consulta
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Consulta::find($id)->delete();
        return response()->json(['success' => 'Consulta eliminado correctamente.']);
    }
}
