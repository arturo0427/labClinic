@extends('backoffice.layouts.admin')

@section('title','Crear Consulta')

@section('head')
    <meta name="csrf-token" content="{{ csrf_token() }}"/>
@endsection

@section('name-page','Crear Consulta')

@section('breadcrums')
    {{-- <li class="breadcrumb-item"><a href="#"> </a></li> --}}
    <li class="breadcrumb-item"><a>Crear Consulta</a></li>
@endsection


@section('content')

    <section class="content">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="form-group col-12 col-sm-6 col-md-4">
                        <label>Buscar usuario por cédula:</label>
                        <input type="text" class="form-control" id="txtCedula" placeholder="Ingresar Cédula">
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-12 col-sm-6 col-md-4">
                        <button id="btnBuscarUsuario" class="btn btn-primary">Buscar Usuario</button>
                    </div>
                </div>
            </div>
        </div>

        <div class="card card-primary card-outline">
            <div class="card-body">
                {{--CONTENIDO--}}

                <div class="row">

                    <div class="col-sm-3">
                        <div class="form-group">
                            <label>Nombres:</label>
                            <input type="text" class="form-control" id="txtNombre" disabled>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="form-group">
                            <label>Apellidos:</label>
                            <input type="text" class="form-control" id="txtApellido" disabled>
                        </div>
                    </div>
                    <div class="col-sm-2">
                        <div class="form-group">
                            <label>Edad:</label>
                            <input type="text" class="form-control" id="txtEdad" disabled>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label>Email:</label>
                            <input type="text" class="form-control" id="txtEmail" disabled>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-3">
                        <div class="form-group">
                            <label>Fecha de nacimiento:</label>
                            <input type="text" class="form-control" id="txtFechaNacimiento" disabled>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="form-group">
                            <label>Sexo:</label>
                            <input type="text" class="form-control" id="txtSexo" disabled>
                        </div>
                    </div>
                </div>

                <hr>
                <h2 align="center">EXÁMENES</h2>
                <hr>
                <form action="{{route('crearConsultas.store')}}" method="POST">
                    {{ csrf_field() }}
                    <div class="row">
                        <input type="hidden" name="User_id" id="User_id">
                        @foreach($grupos as $grupo)
                            <div class="card card-primary" style="width: 19rem; padding: 5px;">
                                <div class="card-header">
                                    <div class="card-title">
                                        <label> {{ $grupo->name }}</label>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="form-group">
                                        @foreach($grupos_tipoExamen as $grupos_tipo)
                                            @if($grupo->id == $grupos_tipo->grupos_id)
                                                <div class="form-check">
                                                    <label class="form-check-label">
                                                        <input class="form-check-input" type="checkbox"
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
                    <div class="row">
                        <button type="submit" class="btn btn-info btn-lg btn-block">Crear Consulta</button>
                    </div>
                </form>
            </div>
        </div>
    </section>


@endsection

@section('foot')

    <script>
        $(document).ready(function () {


            function buscarUsuario(accion, type) {
                var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

                $.ajax({
                    type: type,
                    url: "{{ url('/crearConsultas') }}" + accion,
                    data: {_token: CSRF_TOKEN},
                    success: function (data) {
                        if (data.type == 'error') {
                            Swal.fire({
                                icon: 'error',
                                title: '¡Error!',
                                text: 'Cédula no encontrada'
                            });
                            $('#User_id').val('');
                            $('#txtNombre').val('');
                            $('#txtApellido').val('');
                            $('#txtEdad').val('');
                            $('#txtEmail').val('');
                            $('#txtFechaNacimiento').val('');
                            $('#txtSexo').val('');
                        } else {
                            $('#User_id').val(data[0].id);
                            $('#txtNombre').val(data[0].name);
                            $('#txtApellido').val(data[0].apellido);
                            $('#txtEdad').val(data[0].age);
                            $('#txtEmail').val(data[0].email);
                            $('#txtFechaNacimiento').val(data[0].fecha_nacimiento);
                            $('#txtSexo').val(data[0].sexo);

                        }
                    },
                    error: function (data) {
                        alert('Error' + data)
                        Swal.fire({
                            icon: 'error',
                            title: 'Error',
                            text: 'No eliminado '
                        })
                    }
                });
            }


            $('#btnBuscarUsuario').click(function () {

                cedula = $('#txtCedula').val();
                buscarUsuario('/' + cedula, 'GET');

            });

        });

    </script>


@endsection
