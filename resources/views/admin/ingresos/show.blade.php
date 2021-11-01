@extends('adminlte::page')

@section('title', 'ENASA | INGRESOS')


@section('content')
    @include('sweetalert::alert')

    @include('sweetalert::alert')
    <x-card-header>
        <div class="col-md-8">
        <h5 class="text-white">Ingresos de {{ $ingreso->proveedor->display_proveedor }}</h5>
        </div>
        <div class="col-md-3">
            <div class="float-right">
                <a href="{{url('admin/pdfIngreso',$ingreso)}}" target="_blank">
                    <button type="button" style="border-color: rgb(158, 157, 157);" class="btn btn-default btn-sm px-3 py-2 elevation-4">
                      <i class="far fa-fw fa-file-pdf text-red"></i> Exportar PDF
                    </button> &nbsp;
                 </a>

                <a href=" {{ route('admin.ingresos.index') }} "
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
                        <div class="col-m-6">
                            <span class="font-weight-bold">Departamento :</span> 
                            {{ $ingreso->proveedor->nombre }}
                            <br>
                            @if ($compra)
                                <span class="font-weight-bold">Responsable :</span> {{ $compra->users[0]->name }} - {{ $compra->users[0]->last_name }}
                                <br>
                                <span class="font-weight-bold"> Cargo :</span> {{ $compra->nombre }}
                            @endif
                            <br>
                            <span class="font-weight-bold">Tipo de movimiento : </span>
                            {{$ingreso->tipomovimiento->descripcion}}
                        </div>
                        <div class="col-md-6 float-right">
                            <div class="float-right">
                                <span class="font-weight-bold">Acarigua</span>, {{ $ingreso->created_at->format('d-m-Y') }}
                                <br>
                                @if ($ingreso->correlativo)
                                <span class="font-weight-bold">Ingreso Nro. :</span> {{ $ingreso->correlativo }}
                                @endif
                                <br>
                                @if ($ingreso->requisicion_id)
                                <span class="font-weight-bold">Requisicion Nro. :</span> <a href="{{ route('admin.requisicions.show', $ingreso->requisicion->id)}}" target="_blank"> {{ $ingreso->requisicion->correlativo }}</a>
                                @endif
                                <br>
                                <span class="font-weight-bold">Usuario :</span> {{ $ingreso->user->display_user }}

                            </div>
                        </div>
                    </div>
                </div>
                <br>
                <div class="text-center">
                    <h5 class="text-secondary font-weight-bold">Control Ingreso</h5>
                    <p>Siendo {{ $ingreso->created_at->toFormattedDateString() }} en horas de la mañana, la coordinacion de
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
                        {{ $ingreso->observacion }}</p>
                </div>
                <br>
                <table class="table table-bordered text-center">
                    <thead>
                        <tr class="p-4 text-secondary font-weight-bold">
                            <th>Entrega :
                                @if ($compra)
                                    {{ $compra->users[0]->name }} - {{ $compra->users[0]->last_name }}
                                    <br>
                                    {{ $compra->nombre }}
                                @endif
                            </th>
                            <th>Recibe :
                                @if ($almacen)
                                    {{ $almacen->users[0]->name }} - {{ $almacen->users[0]->last_name }}
                                    <br>
                                    {{ $almacen->nombre }}
                                @endif

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
