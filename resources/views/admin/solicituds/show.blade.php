@extends('adminlte::page')

@section('title', 'ENASA | INGRESOS')


@section('content')
    @include('sweetalert::alert')

    @include('sweetalert::alert')

    <x-card-header>
        <div class="col-md-6">
            <h3 class="text-white">Solicitud a almacen</h3>
        </div>
        <div class="col-md-5">
            <div class="float-right">

                <a href=" {{ route('admin.solicituds.index') }} "
                    class="float-right btn btn-default btn-sm px-3 py-2 elevation-4"><i class="fas fa-reply"></i> Volver</a>
            </div>
        </div>

    </x-card-header>

    <div class="container">
        <div class="card elevation-4 col-md-12 col-sm-12" style="border-radius: 0.95rem">
            <div class="card-body p-5">
                <div class="row">
                    <div class="justify-content">
                        <img src="{{ asset('vendor/adminlte/dist/img/banner.png') }}" alt="ENASA"
                            class="img-fluid card-tools image img-center image-responsive rounded" width="100%" ;>
                    </div>
                </div>
                <br>
                <div style="border: 1px solid #dee2e6" class="p-4 rounded-lg text-secondary">
                    <div class="row">
                        <div class="col-md-6">
                            <span class="font-weight-bold">Departamento Solicitante : </span>
                            {{ $solicitud->departamento->nombre }}
                            <br>
                            <span class="font-weight-bold">Solicitante :</span>
                            {{ $solicitud->user->name }}-{{ $solicitud->user->last_name }}
                            <br>
                            <span class="font-weight-bold">Cedula :</span>
                            {{ $solicitud->user->tipodocumento->abreviado }}-{{ $solicitud->user->cedula }}

                            <br>
                        </div>


                        <div class="col-md-6">
                            <div class="float-right">
                                <span class="font-weight-bold">Acarigua,
                                    {{ $solicitud->created_at->format('d-m-Y') }}</span>

                                <br>
                                <span class="font-weight-bold">Solicitud Nro. : </span>
                                <a href="{{ route('admin.solicituds.show', $solicitud->id) }}">
                                    {{ $solicitud->departamento->abreviado }}-{{ $solicitud->id }}</a>
                                <br>
                                <span class="font-weight-bold">Estatus :</span>
                                @if ($solicitud->estatus == 0)
                                    Anulada 
                                @elseif ($solicitud->estatus == 2)
                                   Aprobado 
                            
                                @elseif ($solicitud->estatus == 3)
                                   Solicitado a compras 
                                @endif

                            </div>
                        </div>
                    </div>
                </div>
                <br>
                <table class="table table-striped rounded-lg">
                    <thead class="rounded-lg">
                        <tr class="text-secondary text-sm font-weight-bold">
                            <th>Producto</th>
                            <th>Cantidad</th>
                            <th>Observación</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($detalles as $detalle)
                            <tr class="text-secondary text-sm">
                                <td>{{ $detalle->producto }}</td>
                                <td>{{ $detalle->cantidad }}</td>
                                <td>{{ $detalle->observacionp }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <hr>
                <div style="border: 1px solid #dee2e6" class="p-4 rounded-lg">
                    <p class="p-2 text-secondary"><span class=" font-weight-bold">Observación:</span>
                        {{ $solicitud->observacion }}</p>
                </div>
                <br>
                <table class="table table-bordered text-center">
                    <thead>
                        <tr class="p-4 text-secondary font-weight-bold">
                            <th>Entrega :

                            </th>
                            <th>Recibe :


                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td style="height: 80px"></td>
                            <td style="height: 80px"></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <br>
    </div>

    </div>
@stop

@section('footer')
    <x-footer></x-footer>
@stop
