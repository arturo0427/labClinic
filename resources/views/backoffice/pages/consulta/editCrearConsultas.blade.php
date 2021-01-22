@extends('backoffice.layouts.admin')

@section('title','Editar Consulta')

@section('head')
@endsection

@section('name-page','Editar Consulta')

@section('breadcrums')
    {{-- <li class="breadcrumb-item"><a href="#"> </a></li> --}}
    <li class="breadcrumb-item"><a href="{{ route('consultas.index') }}">Consultas</a></li>
    <li class="breadcrumb-item"><a>Editar Consulta</a></li>
@endsection


@section('content')

    <section class="content">
        {{--        <div class="card">--}}
        {{--            <div class="card-body">--}}
        {{--                <div class="row">--}}
        {{--                    <div class="form-group col-12 col-sm-6 col-md-4">--}}
        {{--                        <label>Buscar usuario por cédula:</label>--}}
        {{--                        <input type="text" class="form-control" id="txtCedula" placeholder="Ingresar Cédula">--}}
        {{--                    </div>--}}
        {{--                </div>--}}
        {{--                <div class="row">--}}
        {{--                    <div class="form-group col-12 col-sm-6 col-md-4">--}}
        {{--                        <button id="btnBuscarUsuario" class="btn btn-primary">Buscar Usuario</button>--}}
        {{--                    </div>--}}
        {{--                </div>--}}
        {{--            </div>--}}
        {{--        </div>--}}

        <div class="card card-primary card-outline">
            <div class="card-body">
                {{--CONTENIDO--}}

                <div class="row">

                    <div class="col-sm-3">
                        <div class="form-group">
                            <label>Nombres:</label>
                            <input type="text" class="form-control" id="txtNombre" value="{{ $consulta->user->name }}"
                                   disabled>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="form-group">
                            <label>Apellidos:</label>
                            <input type="text" class="form-control" id="txtApellido"
                                   value="{{ $consulta->user->apellido }}" disabled>
                        </div>
                    </div>
                    <div class="col-sm-2">
                        <div class="form-group">
                            <label>Edad:</label>
                            <input type="text" class="form-control" id="txtEdad" value="{{ $consulta->user->age }}"
                                   disabled>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label>Email:</label>
                            <input type="text" class="form-control" id="txtEmail" value="{{ $consulta->user->email }}"
                                   disabled>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-3">
                        <div class="form-group">
                            <label>Fecha de nacimiento:</label>
                            <input type="text" class="form-control" id="txtFechaNacimiento"
                                   value="{{ $consulta->user->fecha_nacimiento }}" disabled>
                        </div>
                    </div>
                </div>

                <hr>
                <h2 align="center">EXÁMENES</h2>
                <hr>
                <form action="{{ route('crearConsultas.update', $consulta->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <input type="hidden" name="User_id" value="{{$consulta->user->id}}">
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
                                                               value="{{$grupos_tipo->id}}" name="grupoTipo[]"

                                                               @foreach($consulta->grupos_detalles_tiposExamenes as $veri)
                                                                    @if($grupos_tipo->id == $veri->id) checked @endif
                                                               @endforeach>
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
                        <button type="submit" class="btn btn-primary btn-lg btn-block">Editar Consulta</button>
                    </div>
                </form>
            </div>
        </div>
    </section>

@endsection

@section('foot')
@endsection
