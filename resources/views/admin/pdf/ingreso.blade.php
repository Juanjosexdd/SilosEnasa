<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ENASA | RECIBO DE INGRESO</title>
    <link rel="stylesheet" href="adminlte.min.css">
    <link rel="stylesheet" href="adminlte.min.css">
    <link rel="stylesheet" href="{{ asset('css/adminlte.min.css') }}">
    <style>
        body {
            margin: 0;
            font-family: "Source Sans Pro", -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol";
            font-size: 0.75rem;
            font-weight: 400;
            line-height: 1.5;
            color: #212529;
            text-align: left;
            background-color: #ffffff;
        }

        .container {
            width: 100%;
            padding-right: 7.5px;
            padding-left: 7.5px;
            margin-right: auto;
            margin-left: auto;
        }

        .card {
            position: relative;
            display: -ms-flexbox;
            display: flex;
            -ms-flex-direction: column;
            flex-direction: column;
            min-width: 0;
            word-wrap: break-word;
            background-color: #ffffff;
            background-clip: border-box;
            border: 0 solid rgba(0, 0, 0, 50%);
            border-radius: 0.75rem;
        }

        .elevation-4 {
            box-shadow: 0 14px 28px rgba(0, 0, 0, 0.25), 0 10px 10px rgba(0, 0, 0, 0.22) !important;
        }

        .col-md-12 {
            -ms-flex: 0 0 100%;
            flex: 0 0 100%;
            max-width: 100%;
        }

        .col-sm-12 {
            -ms-flex: 0 0 100%;
            flex: 0 0 100%;
            max-width: 100%;
        }

        .card-body {
            -ms-flex: 1 1 auto;
            flex: 1 1 auto;
            min-height: 1px;
            padding: 1.25rem;
        }

        .p-5 {
            padding: 3rem !important;
        }

        .row {
            display: -ms-flexbox;
            display: flex;
            -ms-flex-wrap: wrap;
            flex-wrap: wrap;
            margin-right: -7.5px;
            margin-left: -7.5px;
        }

        .img-fluid {
            max-width: 100%;
            height: auto;
        }

        .justify-content {
            justify-content: space-between;

        }

        .col-md-6 {
            -ms-flex: 0 0 50%;
            flex: 0 0 50%;
            max-width: 50%;
        }

        .font-weight-bold {
            font-weight: 700 !important;
        }

        .float-right {
            float: right !important;
        }

        .mt-2,
        .my-2 {
            margin-top: 0.5rem !important;
        }

        .rounded-lg {
            border-radius: 0.3rem !important;
        }

        .mb-2,
        .my-2 {
            margin-bottom: 0.5rem !important;
        }

        .mr-2,
        .mx-2 {
            margin-right: 0.5rem !important;
        }

        .pr-4,
        .px-4 {
            padding-right: 1.5rem !important;
        }

        .mr-4,
        .mx-4 {
            margin-right: 1.5rem !important;
        }

        .p-5 {
            padding: 3rem !important;
        }

        .pr-2,
        .px-2 {
            padding-right: 0.5rem !important;
        }

        .pl-4,
        .px-4 {
            padding-left: 1.5rem !important;
        }

        .text-center {
            text-align: center !important;
        }

        .text-secondary {
            color: #6c757d !important;
        }

        .m-1 {
            margin: 0.25rem !important;
        }

        .p-1 {
            padding: 0.25rem !important;
        }

        .table {
            border-collapse: collapse !important;
        }

        .table-bordered {
            border: 1px solid #dee2e6;
        }

        .table-bordered th,
        .table-bordered td {
            border: 1px solid #dee2e6;
        }

        .table-bordered thead th,
        .table-bordered thead td {
            border-bottom-width: 2px;
        }

        .table-striped tbody tr:nth-of-type(odd) {
            background-color: rgba(0, 0, 0, 0.05);
        }

        .text-nowrap {
            white-space: nowrap !important;
        }

        .m-4 {
            margin: 1.5rem !important;
        }

        th {
            text-align: inherit;
        }

        thead {
            display: table-header-group;
        }

        .table-responsive {
            display: block;
            width: 100%;
            overflow-x: auto;
            -webkit-overflow-scrolling: touch;
        }

        .table-responsive {
            overflow: auto;
        }

        .table-responsive>.table tr th,
        .table-responsive>.table tr td {
            white-space: normal !important;
        }

        .p-4 {
            padding: 1.5rem !important;
        }

        .px-5 {
            padding-right: 4rem !important;
        }

        .px-6 {
            padding-right: 8rem !important;
        }

    </style>
</head>

<body>
    <div class="">
        <div class="card " style="border-radius: 0.95rem">
            <div class="card-body ">
                <div class="row mb-2">
                    <div class="justify-content">
                        <img src="vendor/adminlte/dist/img/banner.png" alt="ENASA"
                            class="img-fluid card-tools image img-center image-responsive rounded" width="100%" ;>
                    </div>
                </div>
                <br>
                <div style="border: 1px solid #dee2e6" class="p-2 my-2  rounded-lg text-secondary">
                    <div class="row  pr-2">
                        <div class="col-md-6 pl-4 pr-4">
                            <span class="font-weight-bold">Departamento :</span>
                            {{ $ingreso->proveedor->nombre }}
                            <br>
                            @if ($compra)
                                <span class="font-weight-bold">Responsable :</span> {{ $compra->users[0]->name }} -
                                {{ $compra->users[0]->last_name }}
                                <br>
                                <span class="font-weight-bold"> Cargo :</span> {{ $compra->nombre }}
                            @endif
                            <br>
                            <span class="font-weight-bold">Tipo de movimiento : </span>
                            {{ $ingreso->tipomovimiento->descripcion }}
                        </div>
                        <div class="col-md-6 float-right  pl-4">
                            <div class="">
                                <span class="font-weight-bold">Acarigua</span>,
                                {{ $ingreso->created_at->format('d-m-Y') }}
                                <br>
                                @if ($ingreso->correlativo)
                                    <span class="font-weight-bold">Ingreso Nro. :</span> {{ $ingreso->correlativo }}
                                @endif
                                <br>
                                @if ($ingreso->requisicion_id)
                                    <span class="font-weight-bold">Requisicion Nro. :</span>
                                    {{ $ingreso->requisicion->correlativo }}
                                @endif
                                <br>
                                <span class="font-weight-bold">Usuario :</span> {{ $ingreso->user->display_user }}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="text-center">
                    <h5 class="text-secondary font-weight-bold">Control Ingreso</h5>
                    <p>Siendo {{ $ingreso->created_at->toFormattedDateString() }} en horas de la mañana, la
                        coordinacion de
                        compras hace entrega a la gerencia de Almacen el siguiente material :</p>
                </div>
                <hr>
                <div class="">
                    <table class="table table-striped rounded-lg">
                        <thead class="rounded-lg">
                            <tr class="text-secondary font-weight-bold">
                                <th class="p-1">Material</th>
                                <th>Ubicación</th>
                                {{-- <th>Unidad</th> --}}
                                <th class="p-1">Marca</th>
                                <th class="p-1">Cant.</th>
                                <th class="p-1">Observación</th>
                            </tr>
                        </thead>
                        <tbody class="rounded-lg">
                            @foreach ($detalles as $detalle)
                                <tr class="text-secondary">
                                    <td class="p-1">{{ $detalle->producto }}</td>
                                    {{-- <td>
                                    @if ($detalle->almacen == 1)
                                        <span>AP</span>
                                    @endif
                                    </td> --}}
                                    {{-- <td>{{ $detalle->unidad }}</td> --}}
                                    <td class="p-1">{{ $detalle->almacen }}</td>
                                    <td class="p-1">{{ $detalle->marca }}</td>
                                    <td class="p-1">{{ $detalle->cantidad }}</td>
                                    <td class="p-1">{{ $detalle->observacionp }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <hr>
                <div style="border: 1px solid #dee2e6" class=" rounded-lg pl-4">
                    <p class="p-2 pr-2 text-secondary"><span class=" font-weight-bold">Observación:</span>
                        {{ $ingreso->observacion }}</p>
                </div>
                <br>
                <div class="text-center">
                    <table class="table table-bordered text-center">
                        <thead class="p-4">
                            <tr class="p-4 text-secondary font-weight-bold">
                                <th class=" p-4 px-6">Entrega :
                                    @if ($compra)
                                        {{ $compra->users[0]->name }} - {{ $compra->users[0]->last_name }}
                                        <br>
                                        {{ $compra->nombre }}
                                    @endif
                                </th>
                                <th class=" p-4 px-6">Recibe :
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
    </div>
</body>

</html>
