<?php

namespace App\Http\Controllers;

use App\Insumo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class InsumoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
                'usos' => 'required',
                'fecha_caducidad' => 'required',
                'descripcion' => 'required',
            ];

            $messages = [
                'name.required' => 'El campo nombre es requerido',
                'marca.required' => 'La marca es requerida',
                'costo.required' => 'El costo es requerido',
                'usos.required' => 'Debe asignar el uso del insumo',
                'fecha_caducidad.required' => 'La fecha de caducidad es requerida',
                'descripcion.required' => 'La descripción es requerida',
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
     * @param \App\Insumo $insumo
     * @return \Illuminate\Http\Response
     */
    public function show(Insumo $insumo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Insumo $insumo
     * @return \Illuminate\Http\Response
     */
    public function edit(Insumo $insumo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Insumo $insumo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Insumo $insumo)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Insumo $insumo
     * @return \Illuminate\Http\Response
     */
    public function destroy(Insumo $insumo)
    {
        //
    }
}
