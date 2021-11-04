<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ENASA | EGRESOS</title>
    <link rel="stylesheet" href="adminlte.min.css">
    <link rel="stylesheet" href="{{ asset('css/adminlte.min.css') }}">

</head>

<body>

    <div class="card elevation-4 m-n4  col-md-12 col-sm-12">
        <div class="card-body table-responsive p-0">
            <div class="row">
                <img src="vendor/adminlte/dist/img/banner.png" alt="ENASA"
                    class="img-fluid card-tools image img-center image-responsive rounded" width="100%" ;>
            </div>
            <div class="row">
                <table class="table table-striped table-sm rounded-lg  justify-content-between">
                    <thead class="rounded-lg">
                        <tr class="text-secondary font-weight-bold justify-content-between">
                            <th width="80px" class="">Nº</th>
                            <th width="120px"class="">Usuario</th>
                            <th width="220px" class="">Solicitante</th>
                            <th width="220px" class="">Departamento</th>
                            {{-- <th width="300px" class="">Observación</th> --}}
                            <th class="">Fecha</th>
                            <th class="">Hora</th>
                            <th class="">Estatus</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($egresos as $egreso)
                            <tr class="text-secondary text-sm">
                                <td class=" ">{{ $egreso->correlativo }}</td>
                                <td class=" ">
                                    {{ $egreso->user->name . ' ' . $egreso->user->last_name }}</td>
                                <td class=" ">{{ $egreso->empleado->display_empleado }}</td>
                                <td class=" ">{{ $egreso->empleado->departamento->nombre }}</td>
                                {{-- <td class=" ">{{ $egreso->observacion }}</td> --}}
                                <td class=" ">{{ $egreso->created_at->toFormattedDateString() }}</td>
                                <td class=" ">{{ $egreso->created_at->toTimeString() }}</td>
                                <td>
                                    @if ($egreso->estatus == 0)
                                        Anulada
                                    @elseif ($egreso->estatus == 1)
                                        Aprobado
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <p class="float-right">{{ $today }}</p>

    <script type="text/php">
        if ( isset($pdf) ) {
            $pdf->page_script('
                $font = $fontMetrics->get_font("Arial, Helvetica, sans-serif", "normal");
                $pdf->text(270, 730, "Pagina $PAGE_NUM de $PAGE_COUNT", $font, 9);
            ');
        }
    </script>
</body>

</html>
