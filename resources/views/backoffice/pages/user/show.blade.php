@extends('backoffice.layouts.admin')

@section('title','Vista de Usuario')

@section('head')

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.3/css/bootstrap.min.css"
          xmlns="">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.22/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.6/css/responsive.bootstrap4.min.css">
@endsection

@section('name-page', $user->name." ".$user->apellido)

@section('breadcrums')
    {{-- <li class="breadcrumb-item"><a href="#"> </a></li> --}}
    <li class="breadcrumb-item"><a href="{{ route('users.index') }}">Usuarios del sistema</a></li>
    <li class="breadcrumb-item"><a> {{$user->name}} {{$user->apellido}} </a></li>
@endsection


@section('content')

    <section class="content">
        {{--        <div class="card">--}}
        {{--            <div class="card-body">--}}
        {{--                --}}{{--                <a href="{{route('roles.create')}}" class="btn btn-primary iframe" data-toggle="modal"--}}
        {{--                --}}{{--                   data-target="#createRoleModal">Crear Rol</a>--}}

        {{--            </div>--}}
        {{--        </div>--}}

        <div class="card card-primary card-outline">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-4">
                        <input type="hidden" value="{{$user->id}}" id="User_id" name="User_id">
                        <div class="form-group">
                            <label> Nombres:</label>
                            <p>{{$user->name}}</p>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label> Apellidos:</label>
                            <p>{{$user->apellido}}</p>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label> Sexo:</label>
                            <p>{{$user->sexo}}</p>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>N° de cédula:</label>
                            <p>{{$user->cedula}}</p>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Teléfono convencional:</label>
                            <p>{{$user->telefono}}</p>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Celular:</label>
                            <p>{{$user->celular}}</p>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Fecha de nacimiento:</label>
                            <p>{{$user->fecha_nacimiento}}</p>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Edad:</label>
                            <p>{{$user->age}}</p>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Correo electrónico:</label>
                            <p>{{$user->email}}</p>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Dirección:</label>
                            <p>{{$user->direccion}}</p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Roles asignados:</label>
                            <ol>
                                @foreach($roles as $role)
                                    <li>{{$role}}</li>
                                @endforeach
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="card card-secondary card-outline">
            <div class="card-header">
                <div class="card-title">
                    <label>Historias clínicas</label>
                </div>
            </div>
            <div class="card-body">
                <table class="table table-striped table-bordered" id="historiasClinicasTable">
                    <thead>
                    <tr>
                        <th>Id</th>
                        <th>Fecha</th>
                        <th>Estado</th>
                        <th>Acción</th>
                    </tr>
                    </thead>
                </table>
            </div>
        </div>
    </section>

@endsection

@section('foot')

    <script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.22/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.6/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.6/js/responsive.bootstrap4.min.js"></script>

    <script>
        $(document).ready(function () {
            var User_id = $('#User_id').val();


            var table = $('#historiasClinicasTable').DataTable({
                serverSide: true,
                processing: true,
                responsive: true,
                autoWidth: false,
                "language": {
                    "lengthMenu": "Mostrar _MENU_ registros por página",
                    "zeroRecords": "No se ha encontrado",
                    "info": "Mostrando la página _PAGE_ de _PAGES_",
                    "infoEmpty": "No hay registros disponibles",
                    "infoFiltered": "(Filtrado de _MAX_ registros totales)",
                    "search": "Buscar:",
                    "paginate": {
                        "next": "Siguiente",
                        "previous": "Anterior"
                    },
                    "processing": "Procesando"
                },
                ajax: {
                    url: "{{url('users')}}" + '/' + User_id + '/show/historia'
                },
                columns: [
                    {data: 'id', name: 'id'},
                    {data: 'created_at', name: 'fecha'},
                    {data: 'status', name: 'estado'},
                    {data: 'action', name: 'action', orderable: false, searchable: false},
                ],
            });


        });
    </script>

@endsection
