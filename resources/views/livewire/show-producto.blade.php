<x-card-body>
    <div class="input-group mb-3">
        <div class="input-group-prepend">
            <span class="input-group-text"><i class="fas fa-search"></i></span>
        </div>
        <input wire:model="search" type="email" class="form-control mr-2" placeholder="Buscar">
        @can('admin.productos.create')
        <a href="{{ route('admin.productos.create') }}" class="btn bg-navy btn-sm px-2 elevation-4"><i
                class="fas fa-plus mt-2 px-3"></i></a>
        @endcan
    </div>

    <div class="card-body card-body table-responsive p-0">
        <ul class="nav nav-tabs pb-4" id="custom-content-above-tab" role="tablist">
            <li class="nav-item active">
                <a class="nav-link px-5 px-5 mx-5 active" id="almacenprincipal-tab" data-toggle="pill" href="#almacenprincipal" role="tab"
                    aria-controls="almacenprincipal" aria-selected="true">Almacen principal</a>
            </li>
            <li class="nav-item">
                <a class="nav-link px-5 px-5 mx-5" id="almacenquimicos-tab" data-toggle="pill" href="#almacenquimicos" role="tab"
                    aria-controls="almacenquimicos" aria-selected="false">Almacen quimicos</a>
            </li>
        </ul>
        <div class="tab-content" id="custom-content-above-tabContent">
            <div class="tab-pane fade show active" id="almacenprincipal" role="tabpanel" aria-labelledby="almacenprincipal-tab">
                @if ($productos->count())
                    <table class="table table-striped">
                        <thead>
                            <tr class="text-uppercase text-secondary text-sm font-weight-bold">
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
                                <th scope="col" role="button" wire:click="order('nombre')">
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
                                <th scope="col" role="button" wire:click="order('unidad_medida')">
                                    Unidad medidad
                                    @if ($sort == 'unidad_medida')
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
                                    Stock
                                </th>
                                <th scope="col" role="button" wire:click="order('minimo')">
                                    Minimo
                                    @if ($sort == 'minimo')
                                        @if ($direction == 'asc')
                                            <i class="fas fas fa-sort-amount-down-alt float-right mt-1"></i>
                                        @else
                                            <i class="fas fa-sort-amount-down float-right mt-1"></i>
                                        @endif
                                    @else
                                        <i class="fas fa-sort float-right mt-1"></i>
                                    @endif
                                </th>
                                <th scope="col" role="button" wire:click="order('maximo')">
                                    Maximo
                                    @if ($sort == 'maximo')
                                        @if ($direction == 'asc')
                                            <i class="fas fas fa-sort-amount-down-alt float-right mt-1"></i>
                                        @else
                                            <i class="fas fa-sort-amount-down float-right mt-1"></i>
                                        @endif
                                    @else
                                        <i class="fas fa-sort float-right mt-1"></i>
                                    @endif
                                </th>
                                <th>Estatus</th>
                                <th colspan="3"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($productos as $producto)
                            @if($producto->almacen_id == 1)
                                <tr class="text-secondary text-sm font-weight-bold">
                                    <td><a href="{{ route('admin.productos.show', $producto)}}"> {{ $producto->clacificacion->abreviado }}{{ $producto->id }}</a></td>
                                    <td><a href="{{ route('admin.productos.show', $producto)}}"> {{ $producto->nombre }}</a></td>
                                    <td><a href="{{ route('admin.productos.show', $producto)}}"> {{ $producto->unidad_medida }}</a></td>
                                    <td><a href="{{ route('admin.productos.show', $producto)}}"> 
                                        @if ($producto->stock == 0)
                                            <span class="badge badge-danger">{{ $producto->stock }}</span>
                                        @else
                                            <span class="badge badge-success">{{ $producto->stock }}</span>
                                        @endif</a>
                                    </td>
                                    <td><a href="{{ route('admin.productos.show', $producto)}}"> {{ $producto->minimo }}</a></td>
                                    <td><a href="{{ route('admin.productos.show', $producto)}}"> {{ $producto->maximo }}</a></td>
                                    <td>
                                        @if ($producto->estatus == 1)
                                            <span class="badge badge-success">Activo</span>
                                        @else
                                            <span class="badge badge-danger">Inactivo</span>
                                        @endif
                                    </td>
                                    <td width="4px">
                                        <div class="btn-group">
                                            @can('admin.productos.estatuproducto')
                                            <a type="button" class="btn btn-default btn-sm"
                                                style="border-color: rgb(158, 157, 157)">
                                                @if ($producto->estatus == 1)
                                                    <form class="formulario-estatus"
                                                        action="{{ route('admin.productos.estatuproducto', $producto) }}"
                                                        method="get">
                                                        @csrf
                                                        <button type="submit"
                                                            class="btn btn-default text-success border-0 btn-sm p-0">
                                                            <i class="fas fa-check-circle"></i>
                                                        </button>
                                                    </form>
                                                @else
                                                    <form class="formulario-estatus2"
                                                        action="{{ route('admin.productos.estatuproducto', $producto) }}"
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
                                            @can('admin.productos.edit')
                                            <a class="btn btn-default btn-sm"
                                                style="border-color: rgb(158, 157, 157); border-top-left-radius: 0px; border-bottom-left-radius: 0px;"
                                                href=" {{ route('admin.productos.edit', $producto) }} "><i
                                                class="fas fa-edit text-blue"></i></a>
                                            @endcan
                                            @can('admin.productos.destroy')
                                            <a type="button" class="btn btn-default btn-sm"
                                                style="border-color: rgb(158, 157, 157); border-top-left-radius: 0px; border-bottom-left-radius: 0px;">
                                                <form class="formulario-eliminar"
                                                    action="{{ route('admin.productos.destroy', $producto) }}" method="POST">
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
                                @endif
                            @endforeach
                        </tbody>
                    </table>
                    <span class="py-2 px-4 float-right ">
                        {{ $productos->links() }}
                    </span>
                @else
                    <div class="px-6 py-4 text-center text-sm">
                        No existe ninguna coincidencia
                    </div>
                @endif
            </div>
            
            <div class="tab-pane fade show" id="almacenquimicos" role="tabpanel" aria-labelledby="almacenquimicos-tab">
            @if ($productos->count())

                    <table class="table table-striped">
                        <thead>
                            <tr class="text-uppercase text-secondary text-sm font-weight-bold">
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
                                <th scope="col" role="button" wire:click="order('nombre')">
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
                                <th scope="col" role="button" wire:click="order('unidad_medida')">
                                    Unidad medidad
                                    @if ($sort == 'unidad_medida')
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
                                    Stock
                                </th>
                                <th scope="col" role="button" wire:click="order('minimo')">
                                    Minimo
                                    @if ($sort == 'minimo')
                                        @if ($direction == 'asc')
                                            <i class="fas fas fa-sort-amount-down-alt float-right mt-1"></i>
                                        @else
                                            <i class="fas fa-sort-amount-down float-right mt-1"></i>
                                        @endif
                                    @else
                                        <i class="fas fa-sort float-right mt-1"></i>
                                    @endif
                                </th>
                                <th scope="col" role="button" wire:click="order('maximo')">
                                    Maximo
                                    @if ($sort == 'maximo')
                                        @if ($direction == 'asc')
                                            <i class="fas fas fa-sort-amount-down-alt float-right mt-1"></i>
                                        @else
                                            <i class="fas fa-sort-amount-down float-right mt-1"></i>
                                        @endif
                                    @else
                                        <i class="fas fa-sort float-right mt-1"></i>
                                    @endif
                                </th>
                                <th>Estatus</th>
                                <th colspan="3"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($productos as $producto)
                                @if($producto->almacen_id == 2)
                                    <tr class="text-secondary text-sm font-weight-bold">
                                        <td><a href="{{ route('admin.productos.show', $producto)}}"> {{ $producto->clacificacion->abreviado }}{{ $producto->id }}</a></td>
                                        <td><a href="{{ route('admin.productos.show', $producto)}}"> {{ $producto->nombre }}</a></td>
                                        <td><a href="{{ route('admin.productos.show', $producto)}}"> {{ $producto->unidad_medida }}</a></td>
                                        <td><a href="{{ route('admin.productos.show', $producto)}}"> 
                                            @if ($producto->stock == 0)
                                                <span class="badge badge-danger">{{ $producto->stock }}</span>
                                            @else
                                                <span class="badge badge-success">{{ $producto->stock }}</span>
                                            @endif</a>
                                        </td>
                                        <td><a href="{{ route('admin.productos.show', $producto)}}"> {{ $producto->minimo }}</a></td>
                                        <td><a href="{{ route('admin.productos.show', $producto)}}"> {{ $producto->maximo }}</a></td>
                                        <td>
                                            @if ($producto->estatus == 1)
                                                <span class="badge badge-success">Activo</span>
                                            @else
                                                <span class="badge badge-danger">Inactivo</span>
                                            @endif
                                        </td>
                                        <td width="4px">
                                            <div class="btn-group">
                                                @can('admin.productos.estatuproducto')
                                                <a type="button" class="btn btn-default btn-sm"
                                                    style="border-color: rgb(158, 157, 157)">
                                                    @if ($producto->estatus == 1)
                                                        <form class="formulario-estatus"
                                                            action="{{ route('admin.productos.estatuproducto', $producto) }}"
                                                            method="get">
                                                            @csrf
                                                            <button type="submit"
                                                                class="btn btn-default text-success border-0 btn-sm p-0">
                                                                <i class="fas fa-check-circle"></i>
                                                            </button>
                                                        </form>
                                                    @else
                                                        <form class="formulario-estatus2"
                                                            action="{{ route('admin.productos.estatuproducto', $producto) }}"
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
                                                @can('admin.productos.edit')
                                                <a class="btn btn-default btn-sm"
                                                    style="border-color: rgb(158, 157, 157); border-top-left-radius: 0px; border-bottom-left-radius: 0px;"
                                                    href=" {{ route('admin.productos.edit', $producto) }} "><i
                                                    class="fas fa-edit text-blue"></i></a>
                                                @endcan
                                                @can('admin.productos.destroy')
                                                <a type="button" class="btn btn-default btn-sm"
                                                    style="border-color: rgb(158, 157, 157); border-top-left-radius: 0px; border-bottom-left-radius: 0px;">
                                                    <form class="formulario-eliminar"
                                                        action="{{ route('admin.productos.destroy', $producto) }}" method="POST">
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
                                @endif
                            @endforeach
                        </tbody>
                    </table>
                    <span class="py-2 px-4 float-right ">
                        {{ $productos->links() }}
                    </span>
                @else
                    <div class="px-6 py-4 text-center text-sm">
                        No existe ninguna coincidencia
                    </div>
                @endif
            </div>
        </div>

    </div>
</x-card-body>
