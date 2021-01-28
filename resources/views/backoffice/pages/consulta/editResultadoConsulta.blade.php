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
                <form action="{{route('consultas.update', $consulta->id)}}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        @foreach($consulta->grupos_detalles_tiposExamenes as $tipo)
                            <div class="form-group col-md-6">
                                <label>{{$tipo->name}}:</label>
                                @foreach($consulta->resultadoConsultas as $res)
                                    @if($tipo->slug == $res->slug)
                                        <input type="text" name="resultado[]" class="form-control"
                                               value="{{Crypt::decryptString($res->resultado)}}" required>

                                        <input type="hidden" name="slug[]" value="{{$tipo->slug}}">
                                    @endif
                                @endforeach
                            </div>
                            <div class="form-group col-md-3">
                                <label>Rango normal</label>
                                @foreach($consulta->resultadoConsultas as $res)
                                    @if($tipo->slug == $res->slug)
                                        <input type="text" name="rango[]" class="form-control"
                                               value="{{$res->rango}}" required>
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
                                       aria-label="Amount (to the nearest dollar)" value="{{$consulta->precio}}">
                                <span class="input-group-text">$</span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group ">
                        <button type="submit" class="btn btn-info col-md-3">Actualizar datos</button>
                    </div>
                </form>
            </div>
        </div>
    </section>

@endsection

@section('foot')
@endsection
