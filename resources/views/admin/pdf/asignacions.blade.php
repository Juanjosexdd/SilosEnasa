<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ENASA | ASIGNACIÓN DE BIENES NACIONALES</title>
    <link rel="stylesheet" href="adminlte.min.css">
    <link rel="stylesheet" href="{{ asset('css/adminlte.min.css') }}">

</head>

<body>

    <div class="card elevation-4 m-n4  col-md-12 col-sm-12">
        <div class="card-body table-responsive p-0">
            <div class="row">
                <img src="vendor/adminlte/dist/img/banner.png" alt="ENASA"
                    class="img-fluid card-tools image img-center image-responsive rounded" width="70%" ;>
            </div>
            <div class="row">
                <p class="text-center h5">Reporte de asignacion bienes nacionales</p>
            </div>
            <div class="row">
                <table class="table table-striped table-sm rounded-lg  justify-content-between">
                    <thead class="rounded-lg">
                        <tr class="text-secondary font-weight-bold justify-content-between">
                            <th width="40px" class="">Nro</th>
                            <th width="100px" class="">Responsable</th>
                            <th width="120px" class="">Asignado a</th>                           
                            <th width="120px" class="">Departamento</th>                           
                            <th width="120px" class="">Bien asignado</th>                           
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($asignacionbiens as $asignacionbien)
                        <tr class="text-secondary text-sm font-weight-bold">
                            <td>{{ $asignacionbien->id }}</td>
                            <td>{{ $asignacionbien->user->name . ' - ' . $asignacionbien->user->last_name }}</td>
                            <td>{{ $asignacionbien->empleado->display_empleado }}</td>
                            <td>{{ $asignacionbien->empleado->departamento->nombre }}</td>
                            <td>{{ $asignacionbien->bienesnacionales->display_bienes }}</td>
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
