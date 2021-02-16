<?php

namespace App\Http\Controllers;


use App\Consulta;
use App\ResultadoConsulta;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Traits\HasRoles;
use Yajra\Datatables\Datatables;


class UserController extends Controller
{
    use HasRoles;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = User::latest()->get();

            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $user = Auth()->user();
                    $btn = '';
                    if ($user->can('users.show')) {
                        $btn = ' <a href="users/' . $row->id . '/show" data-toggle="tooltip"  data-id="' . $row->id . '" data-original-title="Delete" class="btn btn-success btn-sm showUser">Ver</a>';
                    }
                    if ($user->can('users.edit')) {
                        $btn = $btn . ' <a href="javascript:void(0)" data-toggle="tooltip"  data-id="' . $row->id . '" data-original-title="Edit" class="edit btn btn-primary btn-sm editUser">Editar</a>';
                    }
                    if ($user->can('users.destroy')) {
                        $btn = $btn . ' <a href="javascript:void(0)" data-toggle="tooltip"  data-id="' . $row->id . '" data-original-title="Delete" class="btn btn-danger btn-sm deleteUser">Eliminar</a>';
                    }
                    return $btn;
                })
                ->addColumn('role', function ($user) {
                    $badge = '';

                    $roles = $user->getRoleNames();

                    for ($i = 0; $i < count($roles); $i++) {
                        $badge = $badge . '<span class="badge bg-primary">' . $roles[$i] . '</span> ';
                    }

                    return $badge;
                })
                ->rawColumns(['action', 'role'])
                ->make(true);
        }
        $roles = Role::get();

        return view('backoffice.pages.user.index', compact('roles'));
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

//        dd($this->validate($request, ['cedula' => 'ecuador:ci',]));

        if ($request->ajax()) {
            $rules = [
                'name' => 'required',
                'apellido' => 'required',
                'sexo' => 'required',
                'age' => 'required|numeric',
                'nacionalidad' => 'required',
                'cedula' => 'required|unique:users,cedula|numeric|ecuador:ci',
                'fecha_nacimiento' => 'required|date',
                'email' => 'required|email|unique:users,email',
                'password' => 'required',
                'celular' => 'numeric|nullable',
                'telefono' => 'numeric|nullable',
                'direccion' => 'required',
                'roles' => 'required',
            ];

            $messages = [
                'name.required' => 'El campo nombre es requerido',
                'apellido.required' => 'El campo apellido es requerido',
                'sexo.required' => 'El campo sexo es requerido',
                'age.required' => 'El campo edad es requerido',
                'age.numeric' => 'El campo edad debe ser numérico',
                'nacionalidad.numeric' => 'La nacionalidad es requerido',
                'cedula.required' => 'El campo cédula es requerido',
                'cedula.unique' => 'La cédula ya se encuentra registrada',
                'cedula.numeric' => 'El campo cédula debe ser numérico',
                'cedula.ecuador:ci' => 'Cédula incorrecta',
                'fecha_nacimiento.required' => 'El campo fecha de nacimiento es requerido',
                'email.required' => 'El campo email es requerido',
                'email.unique' => 'El email ya existe',
                'password.required' => 'El campo contraseña es requerido',
                'celular.numeric' => 'El campo celular debe ser numérico',
                'telefono.numeric' => 'El campo telefono debe ser numérico',
                'direccion.required' => 'El campo dirección es requerido',
                'roles.required' => 'El usuario debe tener al menos un rol seleccionado',

            ];

            $validator = Validator::make($request->all(), $rules, $messages);
            if ($validator->fails()) {
//                dd($validator->getMessageBag()->toArray());

                return response()->json([
                    'type' => 'error',
                    'errors' => $validator->getMessageBag()->toArray()
                ]);
            } else {
//                $age = Carbon::parse($request->fecha_nacimiento)->age;
                $user = User::create([
                    'name' => $request->input('name'),
                    'apellido' => $request->input('apellido'),
                    'sexo' => $request->input('sexo'),
                    'age' => $request->input('age'),
                    'nacionalidad' => $request->input('nacionalidad'),
                    'cedula' => $request->input('cedula'),
                    'celular' => $request->input('celular'),
                    'telefono' => $request->input('telefono'),
                    'fecha_nacimiento' => $request->input('fecha_nacimiento'),
                    'direccion' => $request->input('direccion'),
                    'email' => $request->input('email'),
                    'password' => Hash::make($request->input('password')),
                ]);

                $user->syncRoles($request->input('roles'));
                return response()->json(['type' => 'success', 'message' => "Usuario creado"]);
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


        $user = User::findOrFail($id);

        $roles = $user->getRoleNames();


        return view('backoffice.pages.user.show', [
            'user' => $user,
            'roles' => $roles,
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
        $user = User::find($id);
        $roles = $user->getRoleNames();

        return response()->json([
            'user' => $user,
            'roles' => $roles
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
                'apellido' => 'required',
                'sexo' => 'required',
                'age' => 'max:3',
                'nacionalidad' => 'required',
                'cedula' => 'required|numeric|unique:users,cedula,' . $request->input('User_id'),
                'fecha_nacimiento' => 'required|date',
                'email' => 'required|email|unique:users,email,' . $request->input('User_id'),
//                'password' => 'required',
                'celular' => 'numeric|nullable',
                'telefono' => 'numeric|nullable',
                'direccion' => 'required',
                'roles' => 'required',
            ];
            $validator = Validator::make($request->all(), $rules);
            if ($validator->fails()) {
                return response()->json([
                    'type' => 'error',
                    'errors' => $validator->getMessageBag()->toArray()
                ]);
            } else {
//                $age = Carbon::parse($request->fecha_nacimiento)->age;

                $user = User::findOrFail($request['User_id']);
                $user->name = $request['name'];
                $user->apellido = $request['apellido'];
                $user->sexo = $request['sexo'];
                $user->age = $request['age'];
                $user->nacionalidad = $request['nacionalidad'];
                $user->cedula = $request['cedula'];
                $user->fecha_nacimiento = $request['fecha_nacimiento'];
                $user->email = $request['email'];
                $user->password = bcrypt($request['password']);
                $user->celular = $request['celular'];
                $user->telefono = $request['telefono'];
                $user->fecha_nacimiento = $request['fecha_nacimiento'];
                $user->direccion = $request['direccion'];
                $user->save();

                $user->syncRoles($request->input('roles'));
                return response()->json(['type' => 'success', 'message' => "Usuario actualizado"]);
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
        User::find($id)->delete();
        return response()->json(['success' => 'Usuario eliminado correctamente.']);
    }


    public function historias($id)
    {
        $consulta = DB::table('consultas')
            ->where('user_id', $id)
            ->where('status', 1)
            ->get();

        return Datatables::of($consulta)
            ->addIndexColumn()
            ->addColumn('action', function ($row) {
                $user = Auth()->user();
                $btn = '';
                if ($user->can('historia.show')) {
                    $btn = ' <a href="historia/' . $row->id . '/show" data-toggle="tooltip"  data-id="' . $row->id . '" data-original-title="Delete" class="btn btn-success btn-sm showUser">Ver</a>';
                }
                if ($user->can('historia.destroy')) {
                    $btn = $btn . ' <a href="javascript:void(0)" data-toggle="tooltip"  data-id="' . $row->id . '" data-original-title="Delete" class="btn btn-danger btn-sm deleteUser">Eliminar</a>';
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

    public function historias_show($id, $id_historia)
    {

        $user = User::find($id);

        $resultados = DB::table('resultado_consultas')->where('consulta_id', $id_historia)->get();

        $consulta = Consulta::find($id_historia);

//        dd($resultados);

        return view('backoffice.pages.historia.show', [
            'resultados' => $resultados,
            'consulta' => $consulta,
            'user' => $user,
        ]);
    }

    public function info()
    {
        $count_user = User::all()->count();

        return view('index', [
            'count_user' => $count_user,
        ]);
    }
}
