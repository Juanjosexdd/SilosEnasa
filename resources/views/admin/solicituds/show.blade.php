@extends('adminlte::page')

@section('title', 'ENASA | INGRESOS')


@section('content')
    @include('sweetalert::alert')

    @include('sweetalert::alert')
    <x-card-header>
        <h5 class="text-white">Salida para de {{ $solicitud->proveedor->display_proveedor }}</h5>
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
                <div style="border: 1px solid #dee2e6" class="p-4 rounded-lg">
                    <div class="row">
                        <div class="col-m-6">
                            {{ $solicitud->proveedor->display_proveedor }}
                            <br>
                            @if ($compra)
                                {{ $compra->users[0]->name }} - {{ $compra->users[0]->last_name }}
                                <br>
                                {{ $compra->nombre }}
                            @endif
                        </div>
                        <div class="col-md-6 float-right">
                            <div class="float-right">
                                Acarigua, {{ $solicitud->created_at->format('d-m-Y') }}
                                <br>
                                @if ($solicitud->correlativo)
                                    Ingreso Nro.: {{ $solicitud->correlativo }}
                                @endif
                                <br>
                                @if ($solicitud->requisicion_id)
                                    Requisicion Nro.: {{ $solicitud->requisicion->correlativo }}
                                @endif
                                <br>
                                Usuario : {{ $solicitud->user->display_user }}

                            </div>
                        </div>
                    </div>
                </div>
                <br>
                <div class="text-center">
                    <h5 class="text-secondary font-weight-bold">Control Ingreso</h5>
                    <p>Siendo {{ $solicitud->created_at->toFormattedDateString() }} en horas de la mañana, la coordinacion de
                        compras hace entrega a la gerencia de Almacen el siguiente material :</p>
                </div>
                <hr>
                <table class="table table-striped rounded-lg">
                    <thead class="rounded-lg">
                        <tr class="text-secondary text-sm font-weight-bold">
                            <th>Material</th>
                            <th>Ubicación</th>
                            <th>Unidad</th>
                            <th>Marca</th>
                            <th>Cantidad</th>
                            <th>Observación</th>
                        </tr>
                    </thead>
                    <tbody class="rounded-lg">
                        @foreach ($detalles as $detalle)
                            <tr class="text-secondary text-sm">
                                <td>{{ $detalle->producto }}</td>
                                <td>{{ $detalle->almacen }}</td>
                                <td>{{ $detalle->unidad }}</td>
                                <td>{{ $detalle->marca }}</td>
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
    </div>

    <br>
    </div>

    </div>
@stop


@section('footer')
    <x-footer></x-footer>
@stop
