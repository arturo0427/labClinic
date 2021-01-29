@extends('backoffice.layouts.admin')

@section('title','Tipos de exámenes')

@section('head')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css"
          xmlns="">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.22/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.6/css/responsive.bootstrap4.min.css">
    <meta name="csrf-token" content="{{ csrf_token() }}">

@endsection

@section('name-page','Tipos de exámenes')

@section('breadcrums')
    {{-- <li class="breadcrumb-item"><a href="#"> </a></li> --}}
    <li class="breadcrumb-item"><a>Tipos de exámenes </a></li>

@endsection


@section('content')

    <section class="content">
        <div class="card">
            <div class="card-body">
                <a class="btn btn-primary" href="javascript:void(0)" id="createTipoExamen"> Crear tipo de exámen</a>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        Tipo de exámen
                    </div>
                    <div class="card-body">
                        <table class="table table-striped table-bordered" id="tipoExamenTable">
                            <thead>
                            <tr>
                                <th>Id</th>
                                <th>Nombre</th>
                                <th>Grupo</th>
                                <th>Consumo</th>
                                <th>Acción</th>
                            </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <!-- Modal para editar y crear TIPO DE EXAMEN-->
    <div class="modal fade" id="tipoExamenModal" tabindex="-1" role="dialog"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="tipoExamenModalTitle"></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="tipoExamenForm">
                    <input type="hidden" name="TipoExamen_id" id="TipoExamen_id">
                    <div class="modal-body">
                        <div class="form-group">
                            <label>Nombre del exámen</label>
                            <input type="text" name="name" class="form-control" id="name"
                                   placeholder="Ingresar nombre">
                        </div>
                        <div class="form-group">
                            <label>Slug</label>
                            <input type="text" name="slug" class="form-control" id="slug" disabled>
                        </div>
                        <div class="form-group">
                            <label>Consumo</label>
                            <input type="number" min="0" name="consumo" class="form-control" id="consumo"
                                   placeholder="Ingresar consumo">
                        </div>
                        <div class="form-group">

                            <label>Grupos de Exámen</label>
                            <div class="gruposExamen_edit">
                                @foreach($gruposExamen as $grupo)
                                    <div class="form-check">
                                        <label class="form-check-label">
                                            <input data-gruposExamen="{{ $grupo->id }}" name="gruposExamen"
                                                   type="radio" id="{{ $grupo->id }}"
                                                   class="form-check-input" value="{{ $grupo->id }}">
                                            {{ $grupo->name }}
                                        </label>
                                    </div>
                                @endforeach
                            </div>

                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                        <button type="submit" class="btn btn-primary" id="saveBtnTipoExamen">Guardar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Modal para ver grupos de examenes-->
    <div class="modal fade" tabindex="-1" role="dialog" id="showTipoExamenModal" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="showTipoExamenModalTitle"></h5>
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
                        <label>Consumo</label>
                        <p id="showConsumo"></p>
                    </div>
                    <div class="form-group">
                        <label>Pertenece al grupo de</label>
                        <p id="showGrupoExamen"></p>
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
            var tipoExamenTable = $('#tipoExamenTable').DataTable({
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
                    url: "{{ route('gruposDetalleTipoExamen.index') }}"
                },
                columns: [
                    {data: 'id', name: 'id'},
                    {data: 'name', name: 'name'},
                    {data: 'grupoExamen', name: 'grupoExamen'},
                    {data: 'consumo', name: 'consumo'},
                    {data: 'action', name: 'action', orderable: false, searchable: false},
                ],
            });


            // CREAR TIPO DE EXAMEN
            $('#createTipoExamen').click(function () {
                $('#saveBtnTipoExamen').val("create-tipoExamen");
                $('#tipoExamenModalTitle').html("Crear nuevo exámen");
                $('#TipoExamen_id').val('');
                $('#tipoExamenForm').trigger("reset");
                $('#tipoExamenModal').modal('show');
            });


            //LLenar modal de grupos examen para editar
            $('body').on('click', '.editTipoExamen', function () {
                $('input:radio').prop('checked', false);
                $('#saveBtnTipoExamen').val("edit-tipoExamen");
                var TipoExamen_id = $(this).data('id');
                $.get("{{url('gruposDetalleTipoExamen')}}" + '/' + TipoExamen_id + '/edit', function (data) {
                    var id_radioGrupoExamen = '#' + data.grupos_detalle_tipoExamen.grupos_id;
                    $(id_radioGrupoExamen).prop("checked", true);
                    $('#TipoExamen_id').val(data.grupos_detalle_tipoExamen.id);
                    $('#tipoExamenModalTitle').html("Editar tipo exámen");
                    $('#name').val(data.grupos_detalle_tipoExamen.name);
                    $('#slug').val(data.grupos_detalle_tipoExamen.slug);
                    $('#consumo').val(data.grupos_detalle_tipoExamen.consumo);
                    $('#tipoExamenModal').modal('show');
                });
            });

            //crear y editar
            $('#saveBtnTipoExamen').click(function (e) {
                e.preventDefault();
                var TipoExamen_id = $(this).data('id');
                if ($(this).val() === 'create-tipoExamen') {
                    var ruta = "{{ url('gruposDetalleTipoExamen/store') }}";
                    var type = "POST";
                } else if ($(this).val() === 'edit-tipoExamen') {

                    var ruta = "{{url('gruposDetalleTipoExamen')}}" + '/' + TipoExamen_id + '/update';
                    var type = "POST";
                }
                $.ajax({
                    data: $('#tipoExamenForm').serialize(),
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
                            $('#tipoExamenTable').DataTable().ajax.reload();
                            $('#tipoExamenForm').trigger("reset");
                            $('#tipoExamenModal').modal('hide');

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


            //ver grupos de examenes
            $('body').on('click', '.showTipoExamen', function () {

                var TipoExamen_id = $(this).data('id');
                $.ajax({
                    url: "{{url('gruposDetalleTipoExamen')}}" + '/' + TipoExamen_id + '/show',
                    type: "GET",
                    success: function (data) {
                        console.log('hola');
                        $('#showTipoExamenModal').modal('show');
                        $('#showTipoExamenModalTitle').html("Grupo " + data.grupos_detalle_tipoExamen.name);
                        $('#showId').html(data.grupos_detalle_tipoExamen.id);
                        $('#showName').html(data.grupos_detalle_tipoExamen.name);
                        $('#showConsumo').html(data.grupos_detalle_tipoExamen.consumo);
                        $('#showGrupoExamen').html(data.grupo_examen);


                    }
                });

            });

            //Eliminar
            $('body').on('click', '.deleteTipoExamen', function () {
                var TipoExamen_id = $(this).data("id");
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
                            url: "{{url('gruposDetalleTipoExamen')}}/" + TipoExamen_id,
                            data: {_token: CSRF_TOKEN},
                            type: "DELETE",
                            dataType: 'json',
                            success: function (data) {
                                $('#tipoExamenTable').DataTable().ajax.reload();
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
