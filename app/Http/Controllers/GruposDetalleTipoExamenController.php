<?php

namespace App\Http\Controllers;

use App\Grupos_detalle_tipoExamen;
use App\Grupos_examen;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Str;

class GruposDetalleTipoExamenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Grupos_detalle_tipoExamen::all();


            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $btn = '';
                    $btn = ' <a href="javascript:void(0)" data-toggle="tooltip"  data-id="' . $row->id . '" data-original-title="Show" class="btn btn-success btn-sm showTipoExamen">Ver</a>';
                    $btn = $btn . ' <a href="javascript:void(0)" data-toggle="tooltip"  data-id="' . $row->id . '" data-original-title="Edit" class="edit btn btn-primary btn-sm editTipoExamen">Editar</a>';
                    $btn = $btn . ' <a href="javascript:void(0)" data-toggle="tooltip"  data-id="' . $row->id . '" data-original-title="Delete" class="btn btn-danger btn-sm deleteTipoExamen">Eliminar</a>';
                    return $btn;
                })->addColumn('grupoExamen', function ($row) {

                    if ($row->grupos_examen == null) {
                        return '';
                    } else {
                        $grupoExamen = Grupos_examen::find($row->grupos_id);

                        return $grupoExamen->name;
                    }
                })
                ->rawColumns(['action', 'grupoExamen'])
                ->make(true);

        }
        $gruposExamen = Grupos_examen::all();

        return view('backoffice.pages.tipo_examen.index', [
            'gruposExamen' => $gruposExamen,
        ]);
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
        if ($request->ajax()) {
            $rules = [
                'name' => 'required|unique:grupos_detalle_tipo_examen',
                'consumo' => 'required',
                'gruposExamen' => 'required'
            ];

            $validator = Validator::make($request->all(), $rules);

            if ($validator->fails()) {
                return response()->json([
                    'type' => 'error',
                    'errors' => $validator->getMessageBag()->toArray()
                ]);
            } else {
                $slug = Str::slug($request->input('name'), '_');


                $grupoExamen = Grupos_detalle_tipoExamen::create([
                    'name' => $request->input('name'),
                    'consumo' => $request->input('consumo'),
                    'slug' => $slug,
                    'grupos_id' => $request->input('gruposExamen'),
                ]);
                return response()->json(['type' => 'success', 'message' => "Tipo de exámen registrado"]);
            }


        } else {
            return response()->json(['status' => 'error', 'message' => "A fallado la solicitud Ajax"]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Grupos_detalle_tipoExamen $grupos_detalle_tipoExamen
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $grupos_detalle_tipoExamen = Grupos_detalle_tipoExamen::findOrFail($id);
        $grupo_examen = $grupos_detalle_tipoExamen->grupos_examen->name;

        return response()->json([
            'grupos_detalle_tipoExamen' => $grupos_detalle_tipoExamen,
            'grupo_examen' => $grupo_examen,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Grupos_detalle_tipoExamen $grupos_detalle_tipoExamen
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $grupos_detalle_tipoExamen = Grupos_detalle_tipoExamen::find($id);
        $gruposExamen = Grupos_examen::all();

        return response()->json([
            'grupos_detalle_tipoExamen' => $grupos_detalle_tipoExamen,
            'gruposExamen' => $gruposExamen,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Grupos_detalle_tipoExamen $grupos_detalle_tipoExamen
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {

        if ($request->ajax()) {
            $rules = [
                'name' => 'required|unique:grupos_detalle_tipo_examen,name,' . $request->input('TipoExamen_id'),
                'consumo' => 'required',
                'gruposExamen' => 'required'
            ];

            $validator = Validator::make($request->all(), $rules);

            if ($validator->fails()) {
                return response()->json([
                    'type' => 'error',
                    'errors' => $validator->getMessageBag()->toArray()
                ]);
            } else {
                $grupoExamen = Grupos_detalle_tipoExamen::findOrFail($request['TipoExamen_id']);
                $grupoExamen->name = $request['name'];
                $grupoExamen->consumo = $request['consumo'];
                $grupoExamen->grupos_id = $request['gruposExamen'];
                $grupoExamen->save();
                return response()->json(['type' => 'success', 'message' => "Tipo de exámen actualizado"]);
            }


        } else {
            return response()->json(['status' => 'error', 'message' => "A fallado la solicitud Ajax"]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Grupos_detalle_tipoExamen $grupos_detalle_tipoExamen
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        Grupos_detalle_tipoExamen::find($id)->delete();
        return response()->json(['success' => 'Tipo de exámen eliminado correctamente.']);
    }
}
