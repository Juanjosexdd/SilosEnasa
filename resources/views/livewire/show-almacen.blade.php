<x-card-body>
    <div class="input-group mb-3">
        <div class="input-group-prepend">
            <span class="input-group-text"><i class="fas fa-search"></i></span>
        </div>
        <input wire:model="search" type="email" class="form-control mr-2" placeholder="Buscar">
        @can('admin.almacens.create')
        <a href="{{ route('admin.almacens.create') }}" class="btn bg-navy btn-sm px-2 elevation-4"><i
                class="fas fa-plus mt-2 px-3"></i></a>
        @endcan
    </div>
    <div class="card-body table-responsive p-0">
        @if ($almacens->count())
            <table class="table table-striped">
                <thead>
                    <tr class="text-uppercase text-secondary text-sm font-weight-bold opacity-7 ps-2">
                        <th scope="col" role="button"
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
                            wire:click="order('nombre')">
                            Nombre
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
                            wire:click="order('descripcion')">
                            Descripci??n
                            @if ($sort == 'descripcion')
                                @if ($direction == 'asc')
                                    <i class="fas fas fa-sort-amount-down-alt float-right mt-1"></i>
                                @else
                                    <i class="fas fa-sort-amount-down float-right mt-1"></i>
                                @endif
                            @else
                                <i class="fas fa-sort float-right mt-1"></i>
                            @endif
                        </th>
                        <th >Estatus
                        </th>
                        <th colspan="3"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($almacens as $almacen)
                        <tr class="text-secondary text-sm font-weight-bold">
                            <td>{{ $almacen->id }}</td>
                            <td>{{ $almacen->nombre }}</td>
                            <td>{{ $almacen->descripcion }}</td>
                            <td>
                                @if ($almacen->estatus == 1)
                                    <span class="badge badge-success">Activo</span>
                                @else
                                    <span class="badge badge-danger">Inactivo</span>
                                @endif
                            </td>
                            <td width="4px">
                                <div class="btn-group">
                                    @can('admin.almacens.estatualmacen')
                                    <a type="button" class="btn btn-default btn-sm"
                                        style="border-color: rgb(158, 157, 157)">
                                        @if ($almacen->estatus == 1)
                                            <form class="formulario-estatus"
                                                action="{{ route('admin.almacens.estatualmacen', $almacen) }}"
                                                method="get">
                                                @csrf
                                                <button type="submit"
                                                    class="btn btn-default text-success border-0 btn-sm p-0">
                                                    <i class="fas fa-check-circle"></i>
                                                </button>
                                            </form>
                                        @else
                                            <form class="formulario-estatus2"
                                                action="{{ route('admin.almacens.estatualmacen', $almacen) }}"
                                                method="get">
                                                @csrf
                                                <button type="submit"
                                                    class="btn btn-default text-danger border-0 btn-sm p-0">
                                                    <i class="fas fa-times-circle"></i>
                                                </button>
                                            </form>
                                        @endif
                                    </a>
                                    @endcan
                                    @can('admin.almacens.edit')
                                        
                                    <a class="btn btn-default btn-sm"
                                    style="border-color: rgb(158, 157, 157); border-top-left-radius: 0px; border-bottom-left-radius: 0px;"
                                    href=" {{ route('admin.almacens.edit', $almacen) }} "><i
                                    class="fas fa-edit text-blue"></i></a>
                                    @endcan
                                    @can('admin.almacens.destroy')
                                    <a type="button" class="btn btn-default btn-sm"
                                        style="border-color: rgb(158, 157, 157); border-top-left-radius: 0px; border-bottom-left-radius: 0px;">
                                        <form class="formulario-eliminar"
                                            action="{{ route('admin.almacens.destroy', $almacen) }}" method="POST">
                                            @csrf
                                            @method('delete')
                                            <button type="submit"
                                                class="btn btn-default btn-sm border-0 p-0 text-danger"><i
                                                    class="fas fa-trash"></i></button>
                                        </form>
                                    </a>
                                    @endcan
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <span class="py-2 px-4 float-right ">
                {{ $almacens->links() }}
            </span>
        @else
            <div class="px-6 py-4 text-center text-sm">
                No existe ninguna coincidencia
            </div>
        @endif
    </div>
</x-card-body>
