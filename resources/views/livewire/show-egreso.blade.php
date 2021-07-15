<div class="card elevation-5 col-md-12 col-sm-12 pt-3" style="border-radius: 0.95rem" bis_skin_checked="1">
    <div class="card-header" style="padding: .75rem .25rem" bis_skin_checked="1">
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-search"></i></span>
            </div>
            <input wire:model="search" type="text" class="form-control mr-2" placeholder="Buscar">

            <a href="{{ route('admin.egresos.create') }}" class="btn bg-navy btn-sm px-2 elevation-4"><i
                    class="fas fa-plus mt-2 px-3"></i>
            </a>
        </div>
    </div>
    <div class="card-body table-responsive">
        @if ($egresos->count())
            <table class="table table-striped table-hover text-nowrap">
                <thead>
                    <tr>
                        <th scope="col" role="button" wire:click="order('correlativo')">
                            Correlativo
                            @if ($sort == 'correlativo')
                                @if ($direction == 'asc')
                                    <i class="fas fas fa-sort-amount-down-alt float-right mt-1"></i>
                                @else
                                    <i class="fas fa-sort-amount-down float-right mt-1"></i>
                                @endif
                            @else
                                <i class="fas fa-sort float-right mt-1"></i>
                            @endif

                        </th>
                        <th scope="col" role="button" wire:click="order('id')">
                            Codigo
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
                        <th scope="col" role="button" wire:click="order('user_id')">
                            Responsable
                            @if ($sort == 'user_id')
                                @if ($direction == 'asc')
                                    <i class="fas fas fa-sort-amount-down-alt float-right mt-1"></i>
                                @else
                                    <i class="fas fa-sort-amount-down float-right mt-1"></i>
                                @endif
                            @else
                                <i class="fas fa-sort float-right mt-1"></i>
                            @endif
                        </th>
                        <th scope="col" role="button" wire:click="order('proveedor_id')">
                            Proveedor
                            @if ($sort == 'proveedor_id')
                                @if ($direction == 'asc')
                                    <i class="fas fas fa-sort-amount-down-alt float-right mt-1"></i>
                                @else
                                    <i class="fas fa-sort-amount-down float-right mt-1"></i>
                                @endif
                            @else
                                <i class="fas fa-sort float-right mt-1"></i>
                            @endif
                        </th>
                        <th>
                            Estatus
                        </th>
                        <th colspan="2"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($egresos as $egreso)
                        <tr>
                            
                            <td> <a href="{{ route('admin.egresos.show', $egreso->id) }}">{{ $egreso->correlativo}}</a>
                            <td> <a href="{{ route('admin.egresos.show', $egreso->id) }}">{{ $egreso->created_at->toDateString() . '-' . $egreso->id }}</a> </td>
                            <td> <a href="{{ route('admin.egresos.show', $egreso->id) }}">{{ $egreso->user->name . ' - ' . $egreso->user->last_name }}</a> </td>
                            <td> <a href="{{ route('admin.egresos.show', $egreso->id) }}">{{ $egreso->proveedor->nombre }}</a></td>
                            <td>
                                @if ($egreso->estatus == 1)
                                    <form class="anular"
                                        action="{{ route('admin.egresos.estatuegreso', $egreso) }}" method="get">
                                        @csrf
                                        <button type="submit" class="btn btn-success btn-sm elevation-4">
                                            <i class="fas fa-check-circle"></i> Procesado
                                        </button>
                                    </form>
                                @else
                                    <p class="btn  btn-danger btn-sm disabled text-white  elevation-4">
                                        <i class="fas fa-times-circle"></i> Anulado &nbsp; &nbsp;
                                    </p>
                                @endif
                            </td>
                            <td>
                                <div class="btn-group">
                                    <a class="btn btn-default elevation-4 btn-sm"
                                        style="border-color: rgb(158, 157, 157);"
                                        href=" {{ route('admin.egresos.show', $egreso->id) }} "> 
                                        <i class="fas fa-eye text-yellow"></i>
                                    </a>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <span class="py-2 px-4 float-right ">
                {{ $egresos->links() }}
            </span>
        @else
            <div class="px-6 py-4 text-center text-sm">
                No existe ninguna coincidencia
            </div>
        @endif
    </div>
</div>
