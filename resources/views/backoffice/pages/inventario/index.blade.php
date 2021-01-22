@extends('backoffice.layouts.admin')

@section('title','Inventario')

@section('head')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css"
          xmlns="">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.22/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.6/css/responsive.bootstrap4.min.css">
    <meta name="csrf-token" content="{{ csrf_token() }}">
@endsection

@section('name-page','Inventario')

@section('breadcrums')
    {{-- <li class="breadcrumb-item"><a href="#"> </a></li> --}}
    <li class="breadcrumb-item"><a>Inventario </a></li>
@endsection


@section('content')

    <section class="content">
        @can('inventario.create')
            <div class="card">
                <div class="card-body">
                    <a class="btn btn-primary" href="javascript:void(0)" id="createNewInsumo">Registrar insumo
                        médico</a>
                </div>
            </div>
        @endcan
        <div class="card card-primary card-outline">
            <div class="card-body">
                {{--CONTENIDO--}}

                <table class="table table-striped table-bordered" id="insumosTable">
                    <thead>
                    <tr>
                        <th>Id</th>
                        <th>Nombre</th>
                        <th>Marca</th>
                        <th>Fecha caducidad</th>
                        <th>Estado</th>
                        <th>Usos disponibles</th>
                        <th>Acción</th>
                    </tr>
                    </thead>
                </table>
            </div>
        </div>
    </section>


    {{--    Modal para crear insumos--}}
    <div class="modal fade bd-example-modal-lg" id="createModalInsumos" tabindex="-1" role="dialog"
         aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="insumoModalTitle"></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="insumoForm">
                    <input type="hidden" name="Insumo_id" id="Insumo_id">
                    <div class="modal-body">
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="name">Nombre</label>
                                <input type="text" name="name" class="form-control" id="name"
                                       placeholder="Ingresar Nombre">
                            </div>

                            <div class="form-group col-md-6">
                                <label for="name">Marca</label>
                                <input type="text" name="marca" class="form-control" id="marca"
                                       placeholder="Ingresar Marca">
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="name">Fecha de caducidad</label>
                                <input type="date" name="fecha_caducidad" class="form-control" id="fecha_caducidad">
                            </div>
                            <div class="form-group col-md-3">
                                <label for="name">Usos totales</label>
                                <input type="text" name="usos" class="form-control" id="usos"
                                       placeholder="Ingresar cantidad">
                            </div>
                            <div class="form-group col-md-3">
                                <label for="name">Costo total</label>
                                <input type="text" name="costo" class="form-control" id="costo"
                                       placeholder="Ingresar Costo">
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="exampleFormControlTextarea1">Descripción</label>
                                <textarea class="form-control" name="descripcion" id="descripcion" rows="3"></textarea>
                            </div>
                        </div>
                        <hr>
                        <h4 align="center">Exámenes</h4>
                        <hr>
                        <div class="row">
                            @foreach($grupos as $grupo)
                                <div class="card card-primary" style="width: 19rem; padding: 5px;">
                                    <div class="card-header">
                                        <div class="card-title">
                                            <label> {{ $grupo->name }}</label>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <div class="form-group insumos_edit">
                                            @foreach($grupos_tipoExamen as $grupos_tipo)
                                                @if($grupo->id == $grupos_tipo->grupos_id)
                                                    <div class="form-check">
                                                        <label class="form-check-label">
                                                            <input data-insumo="{{$grupos_tipo->id}}"
                                                                   class="form-check-input"
                                                                   type="checkbox"
                                                                   value="{{$grupos_tipo->id}}" name="grupoTipo[]">
                                                            {{$grupos_tipo->name}}
                                                        </label>
                                                    </div>
                                                @endif
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar
                        </button>
                        <button type="submit" id="saveBtn" class="btn btn-primary" id="saveBtn">Guardar</button>
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

            //TOKEN
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            //TABLA INSUMOS
            var table = $('#insumosTable').DataTable({
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
                    url: "{{ route('inventario.index') }}"
                },
                columns: [
                    {data: 'id', name: 'id'},
                    {data: 'name', name: 'name'},
                    {data: 'marca', name: 'marca'},
                    {data: 'fecha_caducidad', name: 'fecha_caducidad'},
                    {data: 'status', name: 'status'},
                    {data: 'usos', name: 'usos'},
                    {data: 'action', name: 'action', orderable: false, searchable: false},
                ],
            });


            // CREAR INSUMO
            $('#createNewInsumo').click(function () {
                $('#saveBtn').val("create-insumo");
                $('#insumoModalTitle').html("Registrar insumo médico");
                $('#insumoForm').trigger("reset");
                $('#createModalInsumos').modal('show');
            });

            // EDITAR USUARIO
            $('body').on('click', '.editInsumo', function () {
                $('input:checkbox').prop('checked', false);
                $('#saveBtn').val("edit-insumo");
                var Insumo_id = $(this).data('id');


                $.get("{{url('inventario')}}" + '/' + Insumo_id + '/edit', function (data) {

                    data.tipoExamen.map(res => {
                        $(".insumos_edit").find(`[data-insumo='${res.id}']`).prop('checked', true);
                    });


                    $('#createModalInsumos').modal('show');
                    $('#insumoModalTitle').html("Editar insumo médico");
                    $('#Insumo_id').val(data.insumo.id);
                    $('#name').val(data.insumo.name);
                    $('#marca').val(data.insumo.marca);
                    $('#costo').val(data.insumo.costo);
                    $('#usos').val(data.insumo.usos);
                    $('#fecha_caducidad').val(data.insumo.fecha_caducidad);
                    $('#descripcion').val(data.insumo.descripcion);

                });
            });


            //BOTON GUARDAR
            $('#saveBtn').click(function (e) {
                e.preventDefault();

                if ($(this).val() === 'create-insumo') {
                    var ruta = "{{ url('inventario/store') }}";
                    var type = "POST";
                } else if ($(this).val() === 'edit-insumo') {
                    var ruta = "{{url('inventario')}}" + '/' + Insumo_id + '/update';
                    var type = "POST";
                }

                $.ajax({
                    data: $('#insumoForm').serialize(),
                    url: ruta,
                    type: type,
                    dataType: 'json',
                    success: function (data) {
                        console.log(data.type);
                        if (data.type === 'success') {
                            $('#insumosTable').DataTable().ajax.reload();
                            $('#insumoForm').trigger("reset");
                            $('#createModalInsumos').modal('hide');
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


            // ELIMINAR INSUMO
            $('body').on('click', '.deleteInsumo', function () {
                var Insumo_id = $(this).data("id");

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
                            url: "{{url('inventario')}}/" + Insumo_id,
                            data: {_token: CSRF_TOKEN},
                            type: "DELETE",
                            dataType: 'json',
                            success: function (data) {
                                $('#insumosTable').DataTable().ajax.reload();
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
