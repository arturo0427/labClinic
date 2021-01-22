@extends('backoffice.layouts.admin')

@section('title','Consultas')

@section('head')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css"
          xmlns="">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.22/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.6/css/responsive.bootstrap4.min.css">
    <meta name="csrf-token" content="{{ csrf_token() }}">
@endsection

@section('name-page','Consultas')

@section('breadcrums')
    {{-- <li class="breadcrumb-item"><a href="#"> </a></li> --}}
    <li class="breadcrumb-item"><a>Consultas</a></li>
@endsection


@section('content')

    <section class="content">
        <div class="card card-primary card-outline">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered" id="consultasTable">
                        <thead>
                        <tr>
                            <th scope="col">Id</th>
                            <th scope="col">Nombre</th>
                            <th scope="col">Apellido</th>
                            <th scope="col">Cédula</th>
                            <th scope="col">Creado</th>
                            <th scope="col">Estado</th>
                            <th scope="col">Acción</th>
                        </tr>
                        </thead>
                    </table>
                </div>

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

            var table = $('#consultasTable').DataTable({
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
                    url: "{{ route('consultas.index') }}"
                },
                columns: [
                    {data: 'id', name: 'id'},
                    {data: 'name', name: 'name'},
                    {data: 'apellido', name: 'apellido'},
                    {data: 'cedula', name: 'cedula'},
                    {data: 'creado', name: 'creado'},
                    {data: 'status', name: 'status'},
                    {data: 'action', name: 'action', orderable: false, searchable: false},
                ],

            });


            // ELIMINAR CONSULTA
            $('body').on('click', '.btnEliminarConsulta', function () {
                var Consulta_id = $(this).data("id");
                var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

                Swal.fire({
                    title: '¿Estás seguro de eliminar?',
                    text: "¡No podrás revertir esto!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Si, Eliminar'
                }).then((resultado) => {
                    if (resultado.isConfirmed) {

                        $.ajax({
                            url: "{{url('crearConsultas')}}/" + Consulta_id+"/destroy",
                            data: {_token: CSRF_TOKEN},
                            type: "DELETE",
                            dataType: 'json',
                            success: function (data) {
                                $('#consultasTable').DataTable().ajax.reload();
                                Swal.fire(
                                    '¡Eliminado!',
                                    data.success,
                                    'success'
                                )
                            },
                            error: function (data) {
                                console.log(data);
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Error',
                                    text: 'No eliminado '
                                })
                            }
                        });
                    } else {
                        resultado.dismiss;
                    }
                })
            });


        });
    </script>
@endsection
