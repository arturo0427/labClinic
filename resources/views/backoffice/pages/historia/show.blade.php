@extends('backoffice.layouts.admin')

@section('title','Historia de usuario')

@section('head')
@endsection

@section('name-page','Historia clínica')

@section('breadcrums')
    {{-- <li class="breadcrumb-item"><a href="#"> </a></li> --}}
    <li class="breadcrumb-item"><a href="{{ route('users.index') }}">Usuarios del sistema</a></li>
    <li class="breadcrumb-item"><a> {{$user->name}} {{$user->apellido}} </a></li>
    <li class="breadcrumb-item"><a>Historia clínica </a></li>
@endsection


@section('content')

    <section class="content">
        <div class="card card-primary card-outline">
            <div class="card-body">
                <div class="row">
                    @foreach($consulta->grupos_detalles_tiposExamenes as $tipo)
                        <div class="form-group col-md-6">
                            <label>{{$tipo->name}}:</label>
                            @foreach($resultados as $resultado)
                                @if($tipo->slug === $resultado->slug)
                                    <input name="resultado[]" type="text" class="form-control"
                                           value="{{Crypt::decryptString($resultado->resultado)}}" disabled>

                                @endif
                            @endforeach
                            <input type="hidden" name="slug[]" value="{{$tipo->slug}}">
                        </div>
                        <div class="form-group col-md-3">
                            <label>Rango normal</label>
                            @foreach($consulta->resultadoConsultas as $res)
                                @if($tipo->slug == $res->slug)
                                    <input type="text" name="rango[]" class="form-control"
                                           value="{{$res->rango}}" disabled>
                                @endif
                            @endforeach
                        </div>
                    @endforeach
                </div>
                <hr>
                <div class="row">
                    <div class="form-group col-md-3">
                        <label>Precio</label>
                        <div class="input-group mb-3">
                            <input type="text" step="0.01" name="precio" class="form-control"
                                   aria-label="Amount (to the nearest dollar)" value="{{$consulta->precio}}" disabled>
                            <span class="input-group-text">$</span>
                        </div>
                    </div>
                </div>
                @can('PDF_Resultados')
                    <div class="row">
                        <div class="form-group col-2">
                            <a target="_blank" type="submit" href="{{route('print', $consulta->id)}}"
                               class="btn btn-primary">Generar
                                PDF</a>

                        </div>
                        <div class="form-group col-2">
                            <a type="submit" href="{{route('email_resultados.index', $consulta->id)}}"
                               class="btn btn-secondary">Enviar PDF por email</a>

                        </div>
                    </div>
                @endcan
            </div>
        </div>
    </section>

@endsection

@section('foot')
@endsection
