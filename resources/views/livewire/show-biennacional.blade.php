<x-card-body>

    <div class="input-group mb-3">
        <div class="input-group-prepend">
            <span class="input-group-text"><i class="fas fa-search"></i></span>
        </div>
        <input wire:model="search" type="text" class="form-control mr-2" placeholder="Buscar">
        {{-- @can('admin.biennacionals.create') --}}
        <a href="{{ route('admin.biennacionals.create') }}" class="btn bg-navy btn-sm px-2 elevation-4"><i
                class="fas fa-plus mt-2 px-3"></i>
        </a>
        {{-- @endcan --}}
    </div>
    <!-- /.card-header -->
    <div class="card-body table-responsive p-0">
        @if ($biennacionals->count())
            <table class="table table-striped table-hover text-nowrap">
                <thead>
                    <tr class="text-uppercase text-secondary text-sm font-weight-bold">
                        <th scope="col" role="button" wire:click="order('codigo')">
                            Codigo
                            @if ($sort == 'codigo')
                                @if ($direction == 'asc')
                                    <i class="fas fas fa-sort-amount-down-alt float-right mt-1"></i>
                                @else
                                    <i class="fas fa-sort-amount-down float-right mt-1"></i>
                                @endif
                            @else
                                <i class="fas fa-sort float-right mt-1"></i>
                            @endif
                        </th>
                        {{-- <th scope="col" role="button" wire:click="order('id')">
                            N
                            @if ($sort == 'id')
                                @if ($direction == 'asc')
                                    <i class="fas fas fa-sort-amount-down-alt float-right mt-1"></i>
                                @else
                                    <i class="fas fa-sort-amount-down float-right mt-1"></i>
                                @endif
                            @else
                                <i class="fas fa-sort float-right mt-1"></i>
                            @endif

                        </th> --}}
                        <th scope="col" role="button" wire:click="order('nombre')">
                            nombre
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
                        <th scope="col" role="button" wire:click="order('descripcion')">
                            Deescripción
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
                        {{-- <th scope="col" role="button" wire:click="order('codigo')">
                            Codigo
                            @if ($sort == 'codigo')
                                @if ($direction == 'asc')
                                    <i class="fas fas fa-sort-amount-down-alt float-right mt-1"></i>
                                @else
                                    <i class="fas fa-sort-amount-down float-right mt-1"></i>
                                @endif
                            @else
                                <i class="fas fa-sort float-right mt-1"></i>
                            @endif
                        </th> --}}
                        {{-- <th>Ingreso &nbsp;&nbsp;-&nbsp;&nbsp; Actualizado</th> --}}
                        <th>Estatus</th>
                        <th colspan="3"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($biennacionals as $biennacional)
                        <tr class="text-secondary font-weight-bold text-sm">
                            <td> <a href="{{route('admin.biennacionals.show', $biennacional)}}"> {{ $biennacional->codigo }}</a></td>
                            {{-- <td>{{ $biennacional->id }}</td> --}}
                            <td><a href="{{route('admin.biennacionals.show', $biennacional)}}"> {{ $biennacional->nombre }}</a></td>
                            <td><a href="{{route('admin.biennacionals.show', $biennacional)}}"> {{ $biennacional->descripcion }} </a></td>
                            {{-- <td>{{Str::limit( $biennacional->descripcion, 20) }}</td> --}}
                            {{-- <td>{{ $biennacional->created_at->toFormattedDateString()}} - {{ $biennacional->updated_at->toFormattedDateString()}}</td> --}}
                            <td>
                                @if ($biennacional->estatus == 1)
                                    <span class="badge badge-success">Activo</span>
                                @elseif ($biennacional->estatus == 2)
                                    <span class="badge badge-success text-white">Asignado</span>
                                @elseif ($biennacional->estatus == 0)
                                    <span class="badge badge-danger">Anulado</span>
                                @endif
                            </td>
                            <td width="4px">
                                <div class="btn-group">
                                    {{-- @can('admin.biennacionals.estatubiennacional') --}}
                                    <a type="button" class="btn btn-default btn-sm"
                                        style="border-color: rgb(158, 157, 157)">
                                        @if ($biennacional->estatus == 1)
                                            <form class="formulario-estatus"
                                                action="{{ route('admin.biennacionals.estatubiennacional', $biennacional) }}"
                                                method="get">
                                                @csrf
                                                <button type="submit"
                                                    class="btn btn-default text-success border-0 btn-sm p-0">
                                                    <i class="fas fa-check-circle"></i>
                                                </button>
                                            </form>
                                        @elseif ($biennacional->estatus == 2)
                                            <form class="formulario-estatus2"
                                                action="{{ route('admin.biennacionals.estatubiennacional', $biennacional) }}"
                                                method="get">
                                                @csrf
                                                <button type="submit"
                                                    class="btn btn-default text-warning border-0 btn-sm p-0">
                                                    <i class="fas fa-check-circle"></i>
                                                </button>
                                            </form>
                                        @elseif ($biennacional->estatus == 0)
                                        <button type="submit"
                                        class="btn btn-default text-warning border-0 btn-sm p-0">
                                            <i class="fas fa-check-circle text-danger"></i>

                                        </button>
                                        @endif
                                    </a>

                                    {{-- @endcan --}}
                                    <a class="btn btn-default btn-sm"
                                        style="border-color: rgb(158, 157, 157); border-top-left-radius: 0px; border-bottom-left-radius: 0px;"
                                        href=" {{ route('admin.biennacionals.show', $biennacional) }} "><i
                                            class="fas fa-eye text-yellow"></i>
                                    </a>
                                    {{-- @can('admin.biennacionals.edit') --}}
                                    <a class="btn btn-default btn-sm"
                                        style="border-color: rgb(158, 157, 157); border-top-left-radius: 0px; border-bottom-left-radius: 0px;"
                                        href=" {{ route('admin.biennacionals.edit', $biennacional) }} "><i
                                            class="fas fa-edit text-blue"></i>
                                    </a>
                                    {{-- @endcan --}}
                                    {{-- @can('admin.biennacionals.destroy') --}}
                                    <a type="button" class="btn btn-default btn-sm"
                                        style="border-color: rgb(158, 157, 157); border-top-left-radius: 0px; border-bottom-left-radius: 0px;">
                                        <form class="formulario-eliminar"
                                            action="{{ route('admin.biennacionals.destroy', $biennacional) }}"
                                            method="POST">
                                            @csrf
                                            @method('delete')
                                            <button type="submit"
                                                class="btn btn-default btn-sm border-0 p-0 text-danger"><i
                                                    class="fas fa-trash"></i></button>
                                        </form>
                                    </a>
                                    {{-- @endcan --}}
                                </div>

                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <span class="py-2 px-4 float-right ">
                {{ $biennacionals->links() }}
            </span>
        @else
            <div class="px-6 py-4 text-center text-sm">
                No existe ninguna coincidencia
            </div>
        @endif
    </div>
</x-card-body>
