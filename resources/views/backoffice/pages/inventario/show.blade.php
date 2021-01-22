@extends('backoffice.layouts.admin')

@section('title','Insumo médico')

@section('head')
@endsection

@section('name-page','Insumo médico: ' .$insumo->name)

@section('breadcrums')
    {{-- <li class="breadcrumb-item"><a href="#"> </a></li> --}}
    <li class="breadcrumb-item"><a href="{{route('inventario.index')}}">Inventario </a></li>
    <li class="breadcrumb-item"><a>{{$insumo->name}} </a></li>
@endsection


@section('content')

    <section class="content">
        <div class="card card-primary card-outline">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-4">
                        <input type="hidden" value="{{$insumo->id}}" id="Insumo_id" name="Insumo_id">
                        <div class="form-group">
                            <label> Nombre:</label>
                            <p>{{$insumo->name}}</p>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label> Marca:</label>
                            <p>{{$insumo->marca}}</p>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label> Usos disponibles:</label>
                            <p>{{$insumo->usos}}</p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <input type="hidden" value="{{$insumo->id}}" id="Insumo_id" name="Insumo_id">
                        <div class="form-group">
                            <label> Descripción:</label>
                            <p>{{$insumo->descripcion}}</p>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label> Fecha de caducidad:</label>
                            <p>{{$insumo->fecha_caducidad}}</p>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label> Costo total:</label>
                            <p>{{$insumo->costo}} $</p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label> Estado: </label>
                            @if($insumo->status === 1)
                                <span class="badge bg-success">Disponible</span>
                            @else
                                <span class="badge bg-danger">Agotado</span>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Exámenes asignados</label>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class=" col-md-4">
                        <div class="form-group">

                            <ol>
                                @foreach($insumo->tipoExamenes as $tipo)
                                    <li>{{$tipo->name}}</li>
                                @endforeach
                            </ol>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

@endsection

@section('foot')
@endsection
