<?php

namespace App\Http\Controllers;

use App\Consulta;
use App\Grupos_detalle_tipoExamen;
use App\Grupos_examen;
use App\Insumo;
use App\ResultadoConsulta;
use App\User;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;


class GestionConsultasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        if ($request->ajax()) {
            $data = '';
            $user = Auth()->user();
            $rol = $user->getRoleNames();

//            $data = Consulta::latest()->where('status', 0);

            for ($i = 0; $i < count($rol); $i++) {
                if ($rol[$i] === 'Médico') {
                    $data = Consulta::latest()->where('medico_id', $user->id);
                }
            }

            if (empty($data)) {
                $data = Consulta::latest();
            }

            return DataTables::of($data)
                ->addColumn('id', function (Consulta $consulta) {
                    return $consulta->id;
                })
                ->addColumn('name', function (Consulta $consulta) {
                    return $consulta->user->name;
                })
                ->addColumn('apellido', function (Consulta $consulta) {
                    return $consulta->user->apellido;
                })
                ->addColumn('cedula', function (Consulta $consulta) {
                    return $consulta->user->cedula;
                })
                ->addColumn('creado', function (Consulta $consulta) {
                    return $consulta->created_at->format('d/m/Y h:m:s');
                })
                ->addColumn('status', function (Consulta $consulta) {
                    $badge = '';
                    if ($consulta->status == 0) {
                        $badge = '<span class="badge bg-danger">En espera</span>';
                        return $badge;
                    } else if ($consulta->status == 1) {
                        $badge = '<span class="badge bg-success">Atendido</span>';
                        return $badge;
                    }
                })
                ->addColumn('action', function (Consulta $consulta) {
                    $btn = '';
                    $user = Auth()->user();

                    if ($user->hasRole('Médico')) {
                        if ($user->can('consultas.show') && $consulta->status == 1) {
                            $btn = $btn . ' <a href="consultas/' . $consulta->id . '/verResultadoConsulta" data-toggle="tooltip"  data-id="' . $consulta->id . '" data-original-title="Ver" class="btn btn-info btn-sm btnVerResultadoConsulta">Ver</a>';
                        }

                        if ($user->can('crearConsultas.edit') && $consulta->status == 0) {
                            $btn = $btn . ' <a href="crearConsultas/' . $consulta->id . '/edit" data-toggle="tooltip"  data-id="' . $consulta->id . '" data-original-title="Ver" class="btn btn-info btn-sm btnEditarConsulta">Editar</a>';
                        }
                        if ($user->can('crearConsultas.destroy') && $consulta->status == 0) {
                            $btn = $btn . ' <a href="javascript:void(0)" data-toggle="tooltip"  data-id="' . $consulta->id . '" data-original-title="Delete" class="btn btn-danger btn-sm btnEliminarConsulta">Eliminar</a>';
                        }


                    } else {
                        if ($user->can('consultas.show') && $consulta->status == 1) {
                            $btn = $btn . ' <a href="consultas/' . $consulta->id . '/verResultadoConsulta" data-toggle="tooltip"  data-id="' . $consulta->id . '" data-original-title="Ver" class="btn btn-info btn-sm btnVerResultadoConsulta">Ver</a>';
                        }
                        if ($user->can('consultas.atender') && $consulta->status == 0) {
                            $btn = ' <a href="consultas/' . $consulta->id . '/atender" data-toggle="tooltip"  data-id="' . $consulta->id . '" class="btn btn-success btn-sm btnAtenderConsulta">Atender</a>';
                        }
                        if ($user->can('consultas.edit') && $consulta->status == 1) {
                            $btn = $btn . ' <a href="consultas/' . $consulta->id . '/edit" data-toggle="tooltip"  data-id="' . $consulta->id . '" class="btn btn-primary btn-sm btnEditarConsulta">Editar</a>';
                        }
                        if ($user->can('crearConsultas.edit')) {
                            $btn = $btn . ' <a href="crearConsultas/' . $consulta->id . '/edit" data-toggle="tooltip"  data-id="' . $consulta->id . '" class="btn btn-info btn-sm btnEditarConsulta">Editar</a>';
                        }
                        if ($user->can('crearConsultas.destroy')) {
                            $btn = $btn . ' <a href="javascript:void(0)" data-toggle="tooltip"  data-id="' . $consulta->id . '" data-original-title="Delete" class="btn btn-danger btn-sm btnEliminarConsulta">Eliminar</a>';
                        }
                    }

//                    if ($user->can('consultas.atender') && $consulta->status == 0) {
//                        $btn = ' <a href="consultas/' . $consulta->id . '/atender" data-toggle="tooltip"  data-id="' . $consulta->id . '" data-original-title="Ver" class="btn btn-success btn-sm btnAtenderConsulta">Atender</a>';
//                    }
//                    if ($user->can('consultas.edit')) {
//                        $btn = $btn . ' <a href="consultas/' . $consulta->id . '/edit" data-toggle="tooltip"  data-id="' . $consulta->id . '" data-original-title="Ver" class="btn btn-primary btn-sm btnEditarConsulta">Editar</a>';
//                    }
//                    if ($user->can('crearConsultas.edit') && $user->hasRole('Médico') && $consulta->status == 0) {
//                        $btn = $btn . ' <a href="crearConsultas/' . $consulta->id . '/edit" data-toggle="tooltip"  data-id="' . $consulta->id . '" data-original-title="Ver" class="btn btn-info btn-sm btnEditarConsulta">Editar</a>';
//                    }
//                    if ($user->can('crearConsultas.destroy')) {
//                        $btn = $btn . ' <a href="javascript:void(0)" data-toggle="tooltip"  data-id="' . $consulta->id . '" data-original-title="Delete" class="btn btn-danger btn-sm btnEliminarConsulta">Eliminar</a>';
//                    }

                    return $btn;
                })
                ->rawColumns(['status', 'action'])
                ->make(true);

        }


        return view('backoffice.pages.consulta.consultas');
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
    public function store(Request $request, $id)
    {

        $resultado = $request->input('resultado');
        $slug = $request->input('slug');


        for ($i = 0; $i < count($resultado); $i++) {
            ResultadoConsulta::create([
                'resultado' => $resultado[$i],
                'slug' => $slug[$i],
                'consulta_id' => $id,
            ]);
        }

        $consulta = Consulta::find($id);
        $consulta->precio = $request->input('precio');
        $consulta->status = 1;
        $consulta->save();





        $tiposExamenesConsulta = $consulta->grupos_detalles_tiposExamenes;

        foreach ($tiposExamenesConsulta as $examen) {
            $insumos = $examen->insumos;
            foreach ($insumos as $insumo_unitario) {
                $insumo_unitario->usos -= $examen->consumo;
                $insumo_unitario->save();
            }
        }





        toast('Consulta atendida', 'success')->autoClose(3000);
        return redirect()->route('consultas.index');
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

        return view('backoffice.pages.consulta.atenderConsultas', [
            'consulta' => $consulta,
            'medico' => $medico,
        ]);
    }

    public function verResultadoConsulta($id)
    {
        $consulta = Consulta::find($id);
        $medico = User::find($consulta->medico_id);


        return view('backoffice.pages.consulta.verResultadoConsulta', [
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
        $consulta = Consulta::find($id);

        $medico = User::find($consulta->medico_id);


        return view('backoffice.pages.consulta.editResultadoConsulta', [
            'consulta' => $consulta,
            'medico' => $medico,
        ]);
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
        $resultado = $request->input('resultado');
        $slug = $request->input('slug');

        $res = ResultadoConsulta::where('consulta_id', $id)->get();


        for ($i = 0; $i < count($resultado); $i++) {
            $res[$i]->resultado = $resultado[$i];
            $res[$i]->save();
        }


        $consulta = Consulta::find($id);
        $consulta->precio = $request->input('precio');
        $consulta->save();

        return redirect()->route('consultas.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {


    }
}
