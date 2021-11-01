<table class="table table-striped rounded-lg  justify-content-between">
    <thead class="rounded-lg">
        <tr class="text-secondary font-weight-bold justify-content-between">
            <th class="p-1 pr-6">Producto</th>
            <th class="p-1 pr-6">Cantidad</th>
            <th class="p-1 pr-6">Observación</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($detalles as $detalle)
            <tr class="text-secondary text-sm">
                <td class="p-1 ">{{ $detalle->producto }}</td>
                <td class="p-1 ">{{ $detalle->cantidad }}</td>
                <td class="p-1 ">{{ $detalle->observacionp }}</td>
            </tr>
        @endforeach
    </tbody>
</table>