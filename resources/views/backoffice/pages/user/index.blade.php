@extends('backoffice.layouts.admin')

@section('title','Usuarios del sistema')

@section('head')

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css"
          xmlns="">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.22/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.6/css/responsive.bootstrap4.min.css">
    <meta name="csrf-token" content="{{ csrf_token() }}">
@endsection

@section('name-page','Usuarios del sistema')

@section('breadcrums')
    {{-- <li><a href=""></a></li> --}}

    <li class="breadcrumb-item"><a>Usuarios del sistema</a></li>

@endsection


@section('content')


    <!-- Main content -->
    <section class="content">
        @can('users.create')
            <div class="card">
                <div class="card-body">
                    {{--                <a href="{{route('roles.create')}}" class="btn btn-primary iframe" data-toggle="modal"--}}
                    {{--                   data-target="#createRoleModal">Crear Rol</a>--}}

                    <a class="btn btn-primary" href="javascript:void(0)" id="createNewUser"> Crear Usuario</a>
                </div>
            </div>
        @endcan
        <div class="card card-primary card-outline">
            <div class="card-body">
                {{--CONTENIDO--}}
                <table class="table table-striped table-bordered" id="usersTable">
                    <thead>
                    <tr>
                        <th>Id</th>
                        <th>Nombres</th>
                        <th>Apellidos</th>
                        <th>Cédula</th>
                        <th>Rol</th>
                        <th>Correo</th>
                        <th>Acción</th>
                    </tr>
                    </thead>
                </table>
            </div>
        </div>
    </section>

    <div class="modal fade" id="userModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="userModalTitle"></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="userForm">
                    <input type="hidden" name="User_id" id="User_id">
                    <div class="modal-body">
                        <div class="row">
                            <div class="form-group col-md-8">
                                <label for="name">Nombres</label>
                                <input type="text" name="name" class="form-control" id="name"
                                       placeholder="Ingresar Nombres">

                            </div>
                            <div class="form-group col-md-4">
                                <label>Cédula</label>
                                <input type="text" name="cedula" class="form-control" id="cedula"
                                       placeholder="Ingresar Cédula">

                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-8">
                                <label for="apellido">Apellidos</label>
                                <input type="text" name="apellido" class="form-control" id="apellido"
                                       placeholder="Ingresar Apellidos">
                            </div>
                            <div class="form-group col-md-4">
                                <label for="apellido">Sexo</label>
                                <select id="sexo" name="sexo" class="form-control sexo_edit">
                                    <option selected disabled>Seleccionar...</option>
                                    <option value="Hombre">Masculino</option>
                                    <option value="Mujer">Femenino</option>
                                    <option value="Otro/a">Otro/a</option>
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-5">
                                <label>Fecha de Nacimiento</label>
                                <input type="date" name="fecha_nacimiento"
                                       class="form-control" id="fecha_nacimiento"
                                       placeholder="Ingresar Fecha de Nacimiento">
                            </div>
                            <div class="form-group col-md-3">
                                <label>Edad</label>
                                <input type="text" name="age" class="form-control" id="age"
                                       placeholder="Ingresar Edad">
                                {{--<small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>--}}
                            </div>
                            <div class="form-group col-md-4">
                                <label>Nacionalidad</label>
                                <input type="text" name="nacionalidad" class="form-control" id="nacionalidad"
                                       placeholder="Ingresar Nacionalidad">
                                {{--<small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>--}}
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-4">
                                <label>Teléfono Convencional</label>
                                <input type="text" name="telefono" class="form-control" id="telefono"
                                       placeholder="Ingresar Teléfono">
                                {{--<small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>--}}
                            </div>
                            <div class="form-group col-md-4">
                                <label>Celular</label>
                                <input type="text" name="celular" class="form-control" id="celular"
                                       placeholder="Ingresar Celular">
                                {{--<small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>--}}
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-8">
                                <label>Correo Electrónico</label>
                                <input type="email" name="email" class="form-control" id="email"
                                       placeholder="Ingresar Correo Eletrónico">
                                {{--<small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>--}}
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-8">
                                <label>Contraseña</label>
                                <input type="password" name="password" class="form-control" id="password"
                                       placeholder="Ingresar Contraseña">
                                {{--<small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>--}}
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col-md-8">
                                <label>Dirección</label>
                                <input type="text" name="direccion" class="form-control" id="direccion"
                                       placeholder="Ingresar Dirección">
                                {{--<small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>--}}
                            </div>
                        </div>
                        <div class="form-group ">
                            <div class="col-md-12">
                                <label>Asignar Roles</label>
                                <div class="roles_edit">
                                    @foreach($roles as $role)
                                        <div class="form-check">
                                            <label class="form-check-label">
                                                <input data-role="{{ $role->id }}" name="roles[]"
                                                       type="checkbox"
                                                       class="form-check-input" value="{{ $role->id }}">
                                                {{ $role->name }}
                                            </label>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                        <button type="submit" class="btn btn-primary" id="saveBtn">Guardar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection

@section('foot')
    <script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.22/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.6/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.6/js/responsive.bootstrap4.min.js"></script>

    <script>

        $(document).ready(function () {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            var table = $('#usersTable').DataTable({
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
                    url: "{{ route('users.index') }}"
                },
                columns: [
                    {data: 'id', name: 'id'},
                    {data: 'name', name: 'name'},
                    {data: 'apellido', name: 'apellido'},
                    {data: 'cedula', name: 'cedula'},
                    {data: 'role', name: 'role'},
                    {data: 'email', name: 'email'},
                    {data: 'action', name: 'action', orderable: false, searchable: false},
                ],
            });

            // CREAR USUARIO
            $('#createNewUser').click(function () {
                $('#saveBtn').val("create-user");
                $('#userModalTitle').html("Crear nuevo usuario");
                $('#User_id').val('');
                $('#userForm').trigger("reset");
                $('#userModal').modal('show');
            });

            // EDITAR USUARIO
            $('body').on('click', '.editUser', function () {
                $('input:checkbox').prop('checked', false);
                $('#saveBtn').val("edit-user");
                var User_id = $(this).data('id');

                $.get("{{url('users')}}" + '/' + User_id + '/edit', function (data) {
                    data.user.roles.map(res => {
                        $(".roles_edit").find(`[data-role='${res.id}']`).prop('checked', true);
                    });
                    $('#userModal').modal('show');
                    $('#userModalTitle').html("Editar Usuario");
                    $('#User_id').val(data.user.id);
                    $('#name').val(data.user.name);
                    $('#apellido').val(data.user.apellido);
                    $('#sexo').val(data.user.sexo);
                    $('#nacionalidad').val(data.user.nacionalidad);
                    $('#cedula').val(data.user.cedula);
                    $('#age').val(data.user.age);
                    $('#celular').val(data.user.celular);
                    $('#email').val(data.user.email);
                    $('#fecha_nacimiento').val(data.user.fecha_nacimiento);
                    $('#telefono').val(data.user.telefono);
                    $('#direccion').val(data.user.direccion);
                    // $('#password').val(data.user.password);


                });
            });

            // BOTON GUARDAR
            $('#saveBtn').click(function (e) {
                e.preventDefault();
                var User_id = $(this).data('id');

                if ($(this).val() === 'create-user') {
                    var ruta = "{{ url('users/store') }}";
                    var type = "POST";

                } else if ($(this).val() === 'edit-user') {
                    var ruta = "{{url('users')}}" + '/' + User_id + '/update';
                    var type = "POST";
                }

                $.ajax({
                    data: $('#userForm').serialize(),
                    url: ruta,
                    type: type,
                    dataType: 'json',
                    success: function (data) {
                        if (data.type === 'success') {
                            $('#usersTable').DataTable().ajax.reload();
                            $('#userForm').trigger("reset");
                            $('#userModal').modal('hide');
                            // console.log(data);
                            Swal.fire({
                                icon: 'success',
                                title: 'Correcto',
                                text: data.message
                            })
                        } else if (data.type === 'error') {

                            var errorsHtml = '';
                            if (data.errors) {
                                $.each(data.errors, function (key, val) {
                                    $('#error_' + key).html(val);
                                    errorsHtml += '<ul class="list-group"><li class="list-group-item alert alert-danger">' + val + '</li></ul>';
                                });
                            }
                            Swal.fire({
                                icon: 'error',
                                title: '¡Error!',
                                html: errorsHtml
                            });
                        }
                    }
                });

            });

            // ELIMINAR USUARIO
            $('body').on('click', '.deleteUser', function () {
                var User_id = $(this).data("id");
                var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
                Swal.fire({
                    title: '¿Estás seguro de eliminar?',
                    text: "¡No podrás revertir esto!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Si, Eliminar'
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            url: "{{url('users')}}/" + User_id,
                            data: {_token: CSRF_TOKEN},
                            type: "DELETE",
                            dataType: 'json',
                            success: function (data) {
                                $('#usersTable').DataTable().ajax.reload();
                                Swal.fire(
                                    '¡Eliminado!',
                                    data.success,
                                    'success'
                                )
                            },
                            error: function (data) {

                                Swal.fire({
                                    icon: 'error',
                                    title: 'Error',
                                    text: 'No eliminado '
                                })
                            }
                        });
                    } else {
                        result.dismiss;
                    }
                })
            });


        });
    </script>
@endsection
