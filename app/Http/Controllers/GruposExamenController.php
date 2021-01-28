<?php

namespace App\Http\Controllers;

use App\Grupos_examen;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\DataTables;

class GruposExamenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Grupos_examen::all();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $btn = '';
                    $btn = ' <a href="javascript:void(0)" data-toggle="tooltip"  data-id="' . $row->id . '" data-original-title="Show" class="btn btn-success btn-sm showGruposExamen">Ver</a>';
                    $btn = $btn . ' <a href="javascript:void(0)" data-toggle="tooltip"  data-id="' . $row->id . '" data-original-title="Edit" class="edit btn btn-primary btn-sm editGruposExamen">Editar</a>';
                    $btn = $btn . ' <a href="javascript:void(0)" data-toggle="tooltip"  data-id="' . $row->id . '" data-original-title="Delete" class="btn btn-danger btn-sm deleteGruposExamen">Eliminar</a>';
                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);

        }

        return view('backoffice.pages.grupo_examen.index');
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
                'name' => 'required|unique:grupos_examen',
            ];

            $messages = [
                'name.required' => 'El nombre es requerido',
                'name.unique' => 'El nombre ya se encuentra registrado',
            ];


            $validator = Validator::make($request->all(), $rules, $messages);

            if ($validator->fails()) {
                return response()->json([
                    'type' => 'error',
                    'errors' => $validator->getMessageBag()->toArray()
                ]);
            } else {
                $role = Grupos_examen::create([
                    'name' => $request->input('name'),
                    'description' => $request->input('description'),
                ]);
                return response()->json(['type' => 'success', 'message' => "Grupo creado"]);
            }
        } else {
            return response()->json(['status' => 'error', 'message' => "A fallado la solicitud Ajax"]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $gruposExamen = Grupos_examen::findOrFail($id);

        return response()->json([
            'grupoExamen' => $gruposExamen,
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
        $gruposExamen = Grupos_examen::find($id);

        return response()->json([
            'gruposExamen' => $gruposExamen,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        if ($request->ajax()) {
            $rules = [
                'name' => 'required|unique:grupos_examen,name,' . $request->input('GruposExamen_id'),
            ];

            $validator = Validator::make($request->all(), $rules);

            if ($validator->fails()) {
                return response()->json([
                    'type' => 'error',
                    'errors' => $validator->getMessageBag()->toArray()
                ]);
            } else {
                $grupoExamen = Grupos_examen::findOrFail($request['GruposExamen_id']);
                $grupoExamen->name = $request['name'];
                $grupoExamen->description = $request['description'];
                $grupoExamen->save();
                return response()->json(['type' => 'success', 'message' => "Grupo actualizado"]);
            }


        } else {
            return response()->json(['status' => 'error', 'message' => "A fallado la solicitud Ajax"]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Grupos_examen::find($id)->delete();
        return response()->json(['success' => 'Grupo eliminado correctamente.']);
    }
}
