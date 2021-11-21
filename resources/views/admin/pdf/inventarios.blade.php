<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ENASA | INVENTARIO</title>
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
                <p class="text-center h5">Reporte de inventario</p>
            </div>
            <div class="row">
                <table class="table table-striped table-sm rounded-lg  justify-content-between">
                    <thead class="rounded-lg">
                        <tr class="text-secondary font-weight-bold justify-content-between">
                            <th width="40px" class="">Clasf.</th>
                            <th width="100px" class="">Nombre</th>
                            <th width="120px" class="">Descripción</th>
                            <th width="80px" class="">Ubicacion</th>
                            <th width="80px" class="">Unidad M.</th>
                            <th width="80px" class="">Stock</th>                            
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($inventarios as $inventario)
                            <tr class="text-secondary text-sm">
                                <td class=" ">{{ $inventario->clacificacion->abreviado }}{{ $inventario->id }}</td>
                                <td class="">{{$inventario->nombre}}</td>
                                <td class="">{{$inventario->descripcion}}</td>
                                <td class="">{{$inventario->ubicacion}}</td>
                                <td class="">{{$inventario->unidad_medida}}</td>
                                <td class="">{{$inventario->stock}}</td>
                                
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
