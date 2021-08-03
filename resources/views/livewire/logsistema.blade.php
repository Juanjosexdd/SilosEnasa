<div class="card elevation-5 col-md-12 col-sm-12 pt-3" style="border-radius: 0.95rem" bis_skin_checked="1">
    <div class="card-header" style="padding: .75rem .25rem" bis_skin_checked="1">
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-search"></i></span>
            </div>
            <input wire:model="search" type="text" class="form-control mr-2" placeholder="Buscar">

        </div>
    </div>
    <!-- /.card-header -->
    <div class="card-body table-responsive">
        @if ($logs->count())
            <table class="table table-striped table-hover text-nowrap">
                <thead>
                    <tr>
                        <th scope="col" role="button"
                            class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7 ps-2"
                            wire:click="order('id')">
                            ID
                            @if ($sort == 'id')
                                @if ($direction == 'asc')
                                    <i class="fas fas fa-sort-amount-down-alt float-right mt-1"></i>
                                @else
                                    <i class="fas fa-sort-amount-down float-right mt-1"></i>
                                @endif
                            @else
                                <i class="fas fa-sort float-right mt-1"></i>
                            @endif

                        </th>
                        <th scope="col" role="button"
                            class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7 ps-2"
                            wire:click="order('nombre')">
                            Nombres
                            @if ($sort == 'nombre')
                                @if ($direction == 'asc')
                                    <i class="fas fas fa-sort-amount-down-alt float-right mt-1"></i>
                                @else
                                    <i class="fas fa-sort-amount-down float-right mt-1"></i>
                                @endif
                            @else
                                <i class="fas fa-sort float-right mt-1"></i>
                            @endif
                        </th>
                        <th scope="col" role="button"
                            class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7 ps-2"
                            wire:click="order('abreviado')">
                            Abreviacion
                            @if ($sort == 'abreviado')
                                @if ($direction == 'asc')
                                    <i class="fas fa-sort-numeric-up-alt float-right mt-1"></i>
                                @else
                                    <i class="fas fa-sort-numeric-down-alt float-right mt-1"></i>
                                @endif
                            @else
                                <i class="fas fa-sort float-right mt-1"></i>
                            @endif
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($logs as $log)
                        <tr>
                            <td>{{ $log->id }}</td>
                            <td>{{ $log->user_id }}</td>
                            <td>{{ $log->tx_descripcion }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <span class="py-2 px-4 float-right ">
                {{ $logs->links() }}
            </span>
        @else
            <div class="px-6 py-4 text-center text-sm">
                No existe ninguna coincidencia
            </div>
        @endif
    </div>
    <!-- /.card-body -->
</div>
