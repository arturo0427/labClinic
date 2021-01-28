<?php

namespace App\Http\Controllers;

use App\Grupos_detalle_tipoExamen;
use App\Grupos_examen;
use App\Insumo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\DataTables;

class InventarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $grupos_tipoExamen = Grupos_detalle_tipoExamen::all();
        $grupos = Grupos_examen::all();
        if ($request->ajax()) {
            $insumos = Insumo::latest()->get();

            return DataTables::of($insumos)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $user = Auth()->user();
                    $btn = '';
                    if ($user->can('inventario.show')) {
                        $btn = ' <a href="inventario/' . $row->id . '/show" data-toggle="tooltip"  data-id="' . $row->id . '" data-original-title="Show" class="btn btn-success btn-sm showInsumo">Ver</a>';
                    }
                    if ($user->can('inventario.edit')) {
                        $btn = $btn . ' <a href="javascript:void(0)" data-toggle="tooltip"  data-id="' . $row->id . '" data-original-title="Edit" class="edit btn btn-primary btn-sm editInsumo">Editar</a>';
                    }
                    if ($user->can('inventario.destroy')) {
                        $btn = $btn . ' <a href="javascript:void(0)" data-toggle="tooltip"  data-id="' . $row->id . '" data-original-title="Delete" class="btn btn-danger btn-sm deleteInsumo">Eliminar</a>';
                    }
                    return $btn;
                })
                ->addColumn('status', function (Insumo $insumo) {
                    $badge = '';

                    if ($insumo->usos < 1 || $insumo->status == 0) {
                        $badge = '<span class="badge bg-danger">Agotado</span>';
                        return $badge;
                    } else if ($insumo->usos > 0 && $insumo->status == 1) {
                        $badge = '<span class="badge bg-success">Disponible</span>';
                        return $badge;
                    }


                })
                ->rawColumns(['action', 'status'])
                ->make(true);

        }

        return view('backoffice.pages.inventario.index', [
            'grupos_tipoExamen' => $grupos_tipoExamen,
            'grupos' => $grupos,
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
                'name' => 'required',
                'marca' => 'required',
                'costo' => 'required',
                'usos' => 'required|numeric',
                'fecha_caducidad' => 'required',
                'descripcion' => 'required',
                'grupoTipo' => 'required',
            ];

            $messages = [
                'name.required' => 'El campo nombre es requerido',
                'marca.required' => 'La marca es requerida',
                'costo.required' => 'El costo es requerido',
                'usos.required' => 'Debe asignar el uso del insumo',
                'usos.numeric' => 'La cantidad de usos debe ser numérico',
                'fecha_caducidad.required' => 'La fecha de caducidad es requerida',
                'descripcion.required' => 'La descripción es requerida',
                'grupoTipo.required' => 'Seleccionar al menos un tipo de exámen',
            ];
            $validator = Validator::make($request->all(), $rules, $messages);

            if ($validator->fails()) {
                return response()->json([
                    'type' => 'error',
                    'errors' => $validator->getMessageBag()->toArray()
                ]);
            } else {
                $insumo = Insumo::create([
                    'name' => $request->input('name'),
                    'marca' => $request->input('marca'),
                    'costo' => $request->input('costo'),
                    'usos' => $request->input('usos'),
                    'fecha_caducidad' => $request->input('fecha_caducidad'),
                    'descripcion' => $request->input('descripcion'),
                ]);

                $insumo->tipoExamenes()->attach($request->input('grupoTipo'));

                return response()->json(['type' => 'success', 'message' => "Insumo registrado"]);
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
        $insumo = Insumo::findOrFail($id);

//        dd($insumo->tipoExamenes->grupos_id);

        return view('backoffice.pages.inventario.show', [
            'insumo' => $insumo,
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
        $insumo = Insumo::find($id);
        $tipoExamen = $insumo->tipoExamenes;


        return response()->json([
            'insumo' => $insumo,
            'tipoExamen' => $tipoExamen
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
                'name' => 'required',
                'marca' => 'required',
                'costo' => 'required',
                'usos' => 'required|numeric',
                'fecha_caducidad' => 'required',
                'descripcion' => 'required',
                'grupoTipo' => 'required',
            ];

            $messages = [
                'name.required' => 'El campo nombre es requerido',
                'marca.required' => 'La marca es requerida',
                'costo.required' => 'El costo es requerido',
                'usos.required' => 'Debe asignar el uso del insumo',
                'usos.numeric' => 'La cantidad de usos debe ser numérico',
                'fecha_caducidad.required' => 'La fecha de caducidad es requerida',
                'descripcion.required' => 'La descripción es requerida',
                'grupoTipo.required' => 'Seleccionar al menos un tipo de exámen',
            ];
            $validator = Validator::make($request->all(), $rules, $messages);

            if ($validator->fails()) {
                return response()->json([
                    'type' => 'error',
                    'errors' => $validator->getMessageBag()->toArray()
                ]);
            } else {

                $insumo = Insumo::findOrFail($request['Insumo_id']);
                $insumo->name = $request['name'];
                $insumo->marca = $request['marca'];
                $insumo->fecha_caducidad = $request['fecha_caducidad'];
                $insumo->costo = $request['costo'];
                $insumo->usos = $request['usos'];
                $insumo->descripcion = $request['descripcion'];
                $insumo->save();

                $insumo->tipoExamenes()->sync($request['grupoTipo']);

                return response()->json(['type' => 'success', 'message' => "Insumo actualizado"]);
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
        Insumo::find($id)->delete();
        return response()->json(['success' => 'Insumo eliminado correctamente.']);
    }
}
