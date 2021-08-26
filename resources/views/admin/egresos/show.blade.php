@extends('adminlte::page')

@section('title', 'ENASA | INGRESOS')


@section('content')
    @include('sweetalert::alert')

    @include('sweetalert::alert')

    <x-card-header>
        <div class="col-md-6">
            <h3 class="text-white">Salida de almacen</h3>
        </div>
        <div class="col-md-5">
            <div class="float-right">

                <a href=" {{ route('admin.egresos.index') }} "
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
                            @if ($egreso->solicitud)
                                <span class="font-weight-bold">Departamento Solicitante : </span>
                                {{ $egreso->solicitud->departamento->nombre }}
                                <br>
                                <span class="font-weight-bold">Solicitante :</span>
                                {{ $egreso->solicitud->user->name }}-{{ $egreso->solicitud->user->last_name }}
                                <br>
                                <span class="font-weight-bold">Cedula :</span>
                                {{ $egreso->solicitud->user->tipodocumento->abreviado }}-{{ $egreso->solicitud->user->cedula }}
                            @else
                                <span class="font-weight-bold">Departamento Solicitante :</span>
                                {{ $egreso->empleado->departamento->nombre }}
                                <br>
                                <span class="font-weight-bold">Solicitante :</span>
                                {{ $egreso->empleado->nombres }}-{{ $egreso->empleado->apellidos }}
                                <br>
                                <span class="font-weight-bold">Cedula : </span>
                                {{ $egreso->empleado->tipodocumento->abreviado }}-{{ $egreso->empleado->cedula }}

                            @endif
                            <br>
                            <span class="font-weight-bold">Tipo de movimiento : </span>
                            {{ $egreso->tipomovimiento->descripcion }}
                            <br>
                        </div>
                        <div class="col-md-6">
                            <div class="float-right">
                                <span class="font-weight-bold">Acarigua, 
                                    {{ $egreso->created_at->format('d-m-Y') }}</span>
                                <br>
                                @if ($egreso->correlativo)
                                    <span class="font-weight-bold">Egreso Nro. :</span> 
                                     {{ $egreso->correlativo }}</a>
                                @endif
                                <br>
                                @if ($egreso->solicitud)
                                    <span class="font-weight-bold">Solicitud Nro. : </span>
                                    <a href="{{route('admin.solicituds.show', $egreso->solicitud->id)}}">{{ $egreso->solicitud->id }}</a>
                                @endif
                                <br>
                                <span class="font-weight-bold">Usuario : </span>
                                    {{ $egreso->user->display_user }}

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
                        {{ $egreso->observacion }}</p>
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
