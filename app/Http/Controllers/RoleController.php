<?php

namespace App\Http\Controllers;


use Spatie\Permission\Models\Role;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\Validator;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {

            $data = Role::latest()->get();

            return Datatables::of($data)
                ->editColumn('created_at', function ($request) {
                    return $request->created_at->format('d-m-Y'); // human readable format
                })
                ->addIndexColumn()
                ->addColumn('action', function ($row) {

                    $user = Auth()->user();
                    $btn = '';
                    if ($user->can('roles.show')) {
                        $btn = ' <a href="javascript:void(0)" data-toggle="tooltip"  data-id="' . $row->id . '" data-original-title="Ver" class="btn btn-success btn-sm showRole">Ver</a>';
                    }
                    if ($user->can('roles.edit')) {
                        $btn = $btn . ' <a href="javascript:void(0)" data-toggle="tooltip"  data-id="' . $row->id . '" data-original-title="Edit" class="edit btn btn-primary btn-sm editRole">Editar</a>';
                    }
                    if ($user->can('roles.destroy')) {
                        if ($row->name != 'Administrador' && $row->name != 'Médico' && $row->name != 'Laboratorista' && $row->name != 'Paciente') {
                            $btn = $btn . ' <a href="javascript:void(0)" data-toggle="tooltip"  data-id="' . $row->id . '" data-original-title="Delete" class="btn btn-danger btn-sm deleteRole">Eliminar</a>';
                        }


                    }
                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        $permission = Permission::get();


        return view('backoffice.pages.role.index', compact('permission'));


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

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
                'name' => 'required|unique:roles',
                'description' => 'required',
                'guard_name' => 'required',
                'permissions' => 'required',
            ];

            $messages = [
                'name.required' => 'El nombre es requerido',
                'name.unique' => 'El nombre ya se encuentra registrado',
                'description.required' => 'La descripción es requerida',
                'permissions.required' => 'Debe asignar al menos un permiso al rol',
                'des_diagnostico.required' => 'La descripción del diagnóstio es necesaria.',
            ];


            $validator = Validator::make($request->all(), $rules, $messages);

            if ($validator->fails()) {
                return response()->json([
                    'type' => 'error',
                    'errors' => $validator->getMessageBag()->toArray()
                ]);
            } else {
                $role = Role::create([
                    'name' => $request->input('name'),
                    'description' => $request->input('description'),
                    'guard_name' => $request->input('guard_name')
                ]);
                $role->syncPermissions($request->input('permissions'));
                return response()->json(['type' => 'success', 'message' => "Rol creado"]);
            }
        } else {
            return response()->json(['status' => 'error', 'message' => "A fallado la solicitud Ajax"]);
        }

    }

    /**
     * Display the specified resource.
     *
     * @param \App\Role $role
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $role = Role::findOrFail($id);
        $permissions = $role->getAllPermissions();
        return response()->json([
            'role' => $role,
            'permissions' => $permissions
        ]);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Role $role
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $role = Role::find($id);
        $permissions = $role->getAllPermissions();
        return response()->json([
            'role' => $role,
            'permissions' => $permissions
        ]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Role $role
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        if ($request->ajax()) {
            $rules = [
                'name' => 'required|unique:roles,name,' . $request->input('Role_id'),
                'description' => 'required',
                'guard_name' => 'required',
                'permissions' => 'required',
            ];


            $validator = Validator::make($request->all(), $rules);

            if ($validator->fails()) {
                return response()->json([
                    'type' => 'error',
                    'errors' => $validator->getMessageBag()->toArray()
                ]);
            } else {
                $role = Role::findOrFail($request['Role_id']);
                $role->name = $request['name'];
                $role->description = $request['description'];
                $role->save();
                $role->syncPermissions($request->input('permissions'));
                return response()->json(['type' => 'success', 'message' => "Rol actualizado"]);
            }


        } else {
            return response()->json(['status' => 'error', 'message' => "A fallado la solicitud Ajax"]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Role $role
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        Role::find($id)->delete();

        return response()->json(['success' => 'Rol eliminado correctamente.']);
    }
}
