@extends('backoffice.layouts.admin')

@section('title','Roles del sistema')

@section('head')

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css"
          xmlns="">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.22/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.6/css/responsive.bootstrap4.min.css">
    <meta name="csrf-token" content="{{ csrf_token() }}"/>


@endsection

@section('name-page','Roles del sistema')

@section('breadcrums')
    {{-- <li class="breadcrumb-item"><a href="#"></a></li> --}}
    <li class="breadcrumb-item"><a>Roles del sistema</a></li>
@endsection


@section('content')

    <!-- Main content -->
    <section class="content">
        @can('roles.create')
            <div class="card">
                <div class="card-body">
                    {{--                <a href="{{route('roles.create')}}" class="btn btn-primary iframe" data-toggle="modal"--}}
                    {{--                   data-target="#createRoleModal">Crear Rol</a>--}}

                    <a class="btn btn-primary" href="javascript:void(0)" id="createNewRol"> Crear Rol</a>
                </div>
            </div>
        @endcan
        <div class="card card-primary card-outline">
            <div class="card-body">
                {{--CONTENIDO--}}
                <table class="table table-striped table-bordered" id="rolesTable">
                    <thead>
                    <tr>
                        <th>Id</th>
                        <th>Rol</th>
                        <th>Guardia</th>
                        <th>Creado</th>
                        <th>Acción</th>
                    </tr>
                    </thead>
                </table>
            </div>
        </div>
    </section>

    <!-- Modal para editar y crear roles-->
    <div class="modal fade" id="rolModal" tabindex="-1" role="dialog"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="rolModalTitle"></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="roleForm">
                    <input type="hidden" name="Role_id" id="Role_id">
                    <div class="modal-body">
                        <div class="form-group">
                            <label>Rol</label>
                            <input type="text" name="name" class="form-control" id="name" placeholder="Ingresar Rol">

                        </div>
                        <div class="form-group">
                            <label>Descripción</label>
                            <textarea class="form-control" id="description" name="description" rows="3"></textarea>
                        </div>
                        <div class="form-group">
                            <label>Guardia</label>
                            <input type="text" name="guard_name" class="form-control" id="guard_name"
                                   placeholder="Ingresar Guardia" value="web" readonly>

                        </div>

                    </div>
                    <div class="form-group">
                        <div class="col-md-12">
                            <label>Permisos</label>
                            <div class="permissions_edit">
                                @foreach($permission as $per)
                                    <div class="form-check">
                                        <label class="form-check-label">
                                            <input data-permiso="{{ $per->id }}" name="permissions[]"
                                                   type="checkbox"
                                                   class="form-check-input" value="{{ $per->id }}">
                                            {{ $per->description }}
                                        </label>
                                    </div>
                                @endforeach
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

    <!-- Modal para ver detalles del rol-->
    <div class="modal fade" id="showModalRole" tabindex="-1" role="dialog"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="rolShowTitleModal"></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label>Nombre:</label>
                        <p id="p_name"></p>
                    </div>
                    <div class="form-group">
                        <label>Descripción:</label>
                        <p id="p_description"></p>
                    </div>
                    <div class="form-group">
                        <label>Permisos asignados:</label>
                        <ol id="list_permissions" class="card border-primary">
                        </ol>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                </div>
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

            var table = $('#rolesTable').DataTable({
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
                    url: "{{ route('roles.index') }}"
                },
                columns: [
                    {data: 'id', name: 'id'},
                    {data: 'name', name: 'name'},
                    {data: 'guard_name', name: 'guard_name'},
                    {data: 'created_at', name: 'created_at'},
                    {data: 'action', name: 'action', orderable: false, searchable: false},
                ],

            });

            $('#createNewRol').click(function () {
                $('#saveBtn').val("create-rol");
                $('#Role_id').val('');
                $('#roleForm').trigger("reset");
                $('#rolModalTitle').html("Crear Nuevo Rol");
                $('#rolModal').modal('show');
            });

            $('body').on('click', '.editRole', function () {
                $('input:checkbox').prop('checked', false);
                $('#saveBtn').val("edit-rol");

                var Role_id = $(this).data('id');
                $.get("{{url('roles')}}" + '/' + Role_id + '/edit', function (data) {
                    data.permissions.map(res => {
                        $(".permissions_edit").find(`[data-permiso='${res.id}']`).prop('checked', true);
                    });
                    $('#rolModalTitle').html("Editar Rol");
                    $('#Role_id').val(data.role.id);
                    $('#name').val(data.role.name);
                    $('#description').val(data.role.description);
                    $('#guard_name').val(data.role.guard_name);
                    $('#rolModal').modal('show');


                });
            });

            $('body').on('click', '.showRole', function () {
                $('#list_permissions').empty();
                var Role_id = $(this).data('id');
                $.ajax({
                    url: "{{url('roles')}}" + '/' + Role_id + '/show',
                    type: "GET",
                    success: function (data) {
                        console.log(data.permissions);
                        $('#showModalRole').modal('show');
                        $('#rolShowTitleModal').html("Rol " + data.role.name);
                        $('#p_name').html(data.role.name);
                        $('#p_description').html(data.role.description);
                        $.each(data.permissions, (index, value) => {
                            $('#list_permissions').append('<li>' + value.description + '</li>');
                        });
                    }
                });

            });


            $('#saveBtn').click(function (e) {
                e.preventDefault();
                var Role_id = $(this).data('id');


                if ($(this).val() === 'create-rol') {
                    console.log('Boton de crear');
                    var ruta = "{{ url('roles/store') }}";
                    var type = "POST";

                } else if ($(this).val() === 'edit-rol') {
                    console.log('Boton de editar');
                    var ruta = "{{url('roles')}}" + '/' + Role_id + '/update';
                    var type = "POST";
                }


                $.ajax({
                    data: $('#roleForm').serialize(),
                    url: ruta,
                    type: type,
                    dataType: 'json',
                    success: function (data) {
                        console.log(data);
                        if (data.type === 'success') {
                            Swal.fire({
                                icon: 'success',
                                title: 'Correcto',
                                text: data.message
                            });
                            $('#rolesTable').DataTable().ajax.reload();
                            $('#roleForm').trigger("reset");
                            $('#rolModal').modal('hide');

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

            $('body').on('click', '.deleteRole', function () {
                var Role_id = $(this).data("id");
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
                            url: "{{url('roles')}}/" + Role_id,
                            data: {_token: CSRF_TOKEN},
                            type: "DELETE",
                            dataType: 'json',
                            success: function (data) {
                                $('#rolesTable').DataTable().ajax.reload();
                                Swal.fire(
                                    '¡Eliminado!',
                                    data.success,
                                    'success'
                                )
                            },
                            error: function (data) {
                                console.log('Error:', data);
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


