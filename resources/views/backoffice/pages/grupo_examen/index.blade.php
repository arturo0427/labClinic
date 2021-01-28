@extends('backoffice.layouts.admin')

@section('title','Grupos de exámenes')

@section('head')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css"
          xmlns="">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.22/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.6/css/responsive.bootstrap4.min.css">
    <meta name="csrf-token" content="{{ csrf_token() }}">

@endsection

@section('name-page','Grupos de exámenes')

@section('breadcrums')
    {{-- <li class="breadcrumb-item"><a href="#"> </a></li> --}}
    <li class="breadcrumb-item"><a>Grupos de exámenes </a></li>

@endsection


@section('content')

    <section class="content">
        <div class="card">
            <div class="card-body">
                <a class="btn btn-primary" href="javascript:void(0)" id="createGrupoDeExamen"> Crear Grupo de exámen</a>

            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        Grupo de exámen
                    </div>
                    <div class="card-body">
                        <table class="table table-striped table-bordered" id="grupoDeExamenTable">
                            <thead>
                            <tr>
                                <th>Id</th>
                                <th>Nombre</th>
                                <th>Acción</th>
                            </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>

        </div>
    </section>

    <!-- Modal para editar y crear grupos de examenes-->
    <div class="modal fade" id="gruposExamenModal" tabindex="-1" role="dialog"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="gruposExamenModalTitle"></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="gruposExamenForm">
                    <input type="hidden" name="GruposExamen_id" id="GruposExamen_id">
                    <div class="modal-body">
                        <div class="form-group">
                            <label>Nombre del grupo</label>
                            <input type="text" name="name" class="form-control" id="name"
                                   placeholder="Ingresar nombre">
                        </div>
                        <div class="form-group">
                            <label>Descripción</label>
                            <textarea class="form-control" id="description" name="description"
                                      rows="3"></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                        <button type="submit" class="btn btn-primary" id="saveBtnGrupoExamen">Guardar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Modal para ver grupos de examenes-->
    <div class="modal fade" tabindex="-1" role="dialog" id="showGruposExamenModal" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="showGruposExamenModalTitle"></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label>ID</label>
                        <p id="showId"></p>
                    </div>
                    <div class="form-group">
                        <label>Nombre</label>
                        <p id="showName"></p>
                    </div>
                    <div class="form-group">
                        <label>Descripción</label>
                        <p id="showDescription"></p>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
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

            //Tabla de Tipos de exámenes
            var grupoDeExamenTable = $('#grupoDeExamenTable').DataTable({
                serverSide: true,
                processing: true,
                responsive: true,
                autoWidth: false,
                "language": {
                    "lengthMenu": "Mostrar _MENU_ registros",
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
                    url: "{{ route('gruposExamenes.index') }}"
                },
                columns: [
                    {data: 'id', name: 'id'},
                    {data: 'name', name: 'name'},
                    {data: 'action', name: 'action', orderable: false, searchable: false},
                ],
            });


            // CREAR GRUPO DE EXAMEN
            $('#createGrupoDeExamen').click(function () {
                $('#saveBtnGrupoExamen').val("create-grupoExamen");
                $('#gruposExamenModalTitle').html("Crear nuevo grupo de exámen");
                $('#GruposExamen_id').val('');
                $('#gruposExamenForm').trigger("reset");
                $('#gruposExamenModal').modal('show');
            });


            //LLenar modal de grupos examen para editar
            $('body').on('click', '.editGruposExamen', function () {
                $('#saveBtnGrupoExamen').val("edit-grupoExamen");

                var GruposExamen_id = $(this).data('id');

                $.get("{{url('gruposExamenes')}}" + '/' + GruposExamen_id + '/edit', function (data) {

                    $('#GruposExamen_id').val(data.gruposExamen.id);
                    $('#name').val(data.gruposExamen.name);
                    $('#description').val(data.gruposExamen.description);
                    $('#gruposExamenModalTitle').html("Editar grupo de exámen");
                    $('#gruposExamenModal').modal('show');

                });
            });


            //crear y editar
            $('#saveBtnGrupoExamen').click(function (e) {
                e.preventDefault();
                var GruposExamen_id = $(this).data('id');
                if ($(this).val() === 'create-grupoExamen') {
                    var ruta = "{{ url('gruposExamenes/store') }}";
                    var type = "POST";
                } else if ($(this).val() === 'edit-grupoExamen') {
                    var ruta = "{{url('gruposExamenes')}}" + '/' + GruposExamen_id + '/update';
                    var type = "POST";
                }
                $.ajax({
                    data: $('#gruposExamenForm').serialize(),
                    url: ruta,
                    type: type,
                    dataType: 'json',
                    success: function (data) {
                        if (data.type === 'success') {
                            Swal.fire({
                                icon: 'success',
                                title: 'Correcto',
                                text: data.message
                            });
                            $('#grupoDeExamenTable').DataTable().ajax.reload();
                            $('#gruposExamenForm').trigger("reset");
                            $('#gruposExamenModal').modal('hide');

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

            //Eliminar
            $('body').on('click', '.deleteGruposExamen', function () {
                var GruposExamen_id = $(this).data("id");
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
                            url: "{{url('gruposExamenes')}}/" + GruposExamen_id,
                            data: {_token: CSRF_TOKEN},
                            type: "DELETE",
                            dataType: 'json',
                            success: function (data) {
                                $('#grupoDeExamenTable').DataTable().ajax.reload();
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


            //ver grupos de examenes
            $('body').on('click', '.showGruposExamen', function () {

                var GruposExamen_id = $(this).data('id');
                $.ajax({
                    url: "{{url('gruposExamenes')}}" + '/' + GruposExamen_id + '/show',
                    type: "GET",
                    success: function (data) {
                        $('#showGruposExamenModal').modal('show');
                        $('#showGruposExamenModalTitle').html("Grupo " + data.grupoExamen.name);
                        $('#showId').html(data.grupoExamen.id);
                        $('#showName').html(data.grupoExamen.name);
                        $('#showDescription').html(data.grupoExamen.description);

                    }
                });

            });

        });


    </script>


@endsection
