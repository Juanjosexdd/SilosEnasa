@extends('adminlte::page')

@section('title', 'ENASA | INGRESOS')


@section('content')
    @include('sweetalert::alert')

    @include('sweetalert::alert')
    <div class="container">
        <div class="card elevation-4 col-md-12 col-sm-12" style="border-radius: 0.95rem">
            <div class="card-body">
                <a href=" {{ route('admin.ingresos.index') }} "
                    class="float-right btn bg-navy btn-sm px-3 py-2 elevation-4"><i class="fas fa-reply"></i> Volver</a>

                <h3 class="text-blue">Ingresos de {{ $ingreso->proveedor->display_proveedor }}</h3>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="card elevation-4 col-md-12 col-sm-12" style="border-radius: 0.95rem">
            <div class="card-body">

                {{ $ingreso->proveedor->display_proveedor }}
                <br>
                {{ $ingreso->user->display_user }}
                <br>
                {{ $ingreso->created_at->toDateString() . '-' . $ingreso->id }}
                <br>
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Producto</th>
                                <th>Almacen</th>
                                <th>Cantidad</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($detalles as $detalle)
                                <tr>
                                    <td>{{ $detalle->producto }}</td>
                                    <td>{{ $detalle->almacen }}</td>
                                    <td>{{ $detalle->cantidad }}</td>
                                </tr>
                            @endforeach
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
    <h5 class="text-center"><a href="https://github.com/Juanjosexdd/silosenasa" target="_blank">
            ENASA - UPTP "JJ MONTILLA"</a></h5>
@stop
