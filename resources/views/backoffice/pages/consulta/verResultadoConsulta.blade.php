@extends('backoffice.layouts.admin')

@section('title','Resultados consulta')

@section('head')
@endsection

@section('name-page','Resultados consulta')

@section('breadcrums')
    {{-- <li class="breadcrumb-item"><a href="#"> </a></li> --}}
    <li class="breadcrumb-item"><a href="{{ route('consultas.index') }}">Consultas</a></li>
    <li class="breadcrumb-item"><a>Resultados consulta</a></li>
@endsection


@section('content')

    <section class="content">
        <div class="card card-primary card-outline">
            <div class="card-body">
                <h5><strong>Médico solicitante: </strong>{{ $medico->name }} {{ $medico->apellido }}</h5>
                <h5><strong>Paciente: </strong> {{ $consulta->user->name }} {{ $consulta->user->apellido }}</h5>
                <hr>
                <div class="row">
                    @foreach($consulta->grupos_detalles_tiposExamenes as $tipo)
                        <div class="form-group col-md-6">
                            <label>{{$tipo->name}}:</label>
                            @foreach($consulta->resultadoConsultas as $res)
                                @if($tipo->slug == $res->slug)
{{--                                    <p>{{$res->resultado}}</p>--}}
                                    <p>{{Crypt::decryptString($res->resultado)}}</p>
                                @endif
                            @endforeach
                        </div>
                        <div class="form-group col-md-3">
                            <label>Rango normal:</label>
                            @foreach($consulta->resultadoConsultas as $res)
                                @if($tipo->slug == $res->slug)
                                    <p>{{$res->rango}}</p>
                                @endif
                            @endforeach
                        </div>
                    @endforeach
                </div>
                <hr>
                @if(!Auth()->user()->hasRole('Médico'))
                <div class="row">
                    <div class="form-group col-md-3">
                        <label>Precio:</label>
                        <p>{{$consulta->precio}} $</p>
                    </div>
                </div>
                @endif
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
