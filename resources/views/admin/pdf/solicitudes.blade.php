<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ENASA | SOLICITUDES</title>
    <link rel="stylesheet" href="adminlte.min.css">
    <link rel="stylesheet" href="{{ asset('css/adminlte.min.css') }}">

</head>

<body>
    
        <div class="card elevation-4 col-md-12 col-sm-12">
            <div class="card-body">
                <div class="row">
                    <div class="">
                        <img src="vendor/adminlte/dist/img/banner.png" alt="ENASA"
                            class="img-fluid card-tools image img-center image-responsive rounded" width="100%" ;>
                    </div>
                </div>
                <div class="row">


                    <table class="table table-striped table-sm rounded-lg  justify-content-between">
                        <thead class="rounded-lg">
                            <tr class="text-secondary font-weight-bold justify-content-between">
                                <th class=" pr-6">Nº</th>
                                <th class=" pr-6">Solicitante:</th>
                                <th class=" pr-6">Dpto solicitante:</th>
                                <th class=" pr-6">Observación</th>
                                <th class=" pr-6">Fecha</th>
                                <th class=" pr-6">Hora S.</th>
                                <th class=" pr-6">Estatus</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($solicitudes as $solicitud)
                                <tr class="text-secondary text-sm">
                                    <td class=" ">{{ $solicitud->id }}</td>
                                    <td class=" ">{{ $solicitud->user->display_user }}</td>
                                    <td class=" ">{{ $solicitud->user->departamento->nombre }}</td>
                                    <td class=" ">{{ $solicitud->observacion }}</td>
                                    <td class=" ">{{ $solicitud->created_at->toFormattedDateString() }}</td>
                                    <td class=" ">{{ $solicitud->created_at->toTimeString() }}</td>
                                    <td>
                                        @if ($solicitud->estatus == 0)
                                            Anulada
                                        @elseif ($solicitud->estatus == 1)
                                            Pendiente
                                        @elseif ($solicitud->estatus == 2)
                                            Aprobado

                                        @elseif ($solicitud->estatus == 3)
                                            Solicitado a compras
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <p class="float-right">{{$today}}</p>

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
