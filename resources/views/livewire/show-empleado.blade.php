<div class="card elevation-5 col-md-12 col-sm-12 pt-3" style="border-radius: 0.95rem">
    <div class="card-header" style="padding: .75rem .25rem">
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-search"></i></span>
            </div>
            <input wire:model="search" type="email" class="form-control mr-2" placeholder="Buscar">
            @can('admin.empleados.create')
                <a href="{{ route('admin.empleados.create') }}" class="btn bg-navy btn-sm px-2 elevation-4"><i
                        class="fas fa-plus mt-2 px-3"></i>
                </a>
            @endcan
        </div>
    </div>
    <!-- /.card-header -->
    <div class="card-body table-responsive p-0">
        @if ($empleados->count())
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col" role="button" wire:click="order('id')">
                            #
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
                        <th scope="col" role="button" wire:click="order('cedula')">
                            Cedula
                            @if ($sort == 'cedula')
                                @if ($direction == 'asc')
                                    <i class="fas fa-sort-numeric-up-alt float-right mt-1"></i>
                                @else
                                    <i class="fas fa-sort-numeric-down-alt float-right mt-1"></i>
                                @endif
                            @else
                                <i class="fas fa-sort float-right mt-1"></i>
                            @endif
                        </th>
                        <th scope="col" role="button" wire:click="order('nombres')">
                            Nombres
                            @if ($sort == 'nombres')
                                @if ($direction == 'asc')
                                    <i class="fas fas fa-sort-amount-down-alt float-right mt-1"></i>
                                @else
                                    <i class="fas fa-sort-amount-down float-right mt-1"></i>
                                @endif
                            @else
                                <i class="fas fa-sort float-right mt-1"></i>
                            @endif
                        </th>
                        {{-- <th scope="col" role="button" wire:click="order('email')">
                            Correo
                            @if ($sort == 'email')
                                @if ($direction == 'asc')
                                    <i class="fas fas fa-sort-amount-down-alt float-right mt-1"></i>
                                @else
                                    <i class="fas fa-sort-amount-down float-right mt-1"></i>
                                @endif
                            @else
                                <i class="fas fa-sort float-right mt-1"></i>
                            @endif
                        </th> --}}
                        <th scope="col" role="button" wire:click="order('cargo_id')">
                            Cargo
                            @if ($sort == 'cargo_id')
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
                        <th colspan="2"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($empleados as $empleado)
                        <tr>
                            <td><a href=" {{ route('admin.empleados.show', $empleado) }} ">{{ $empleado->id }}</a>
                            </td>
                            <td><a
                                    href=" {{ route('admin.empleados.show', $empleado) }} ">{{ $empleado->tipodocumento->abreviado }}-{{ $empleado->cedula }}</a>
                            </td>
                            <td><a href=" {{ route('admin.empleados.show', $empleado) }} ">{{ $empleado->nombres }}
                                    {{ $empleado->apellidos }}</a></td>
                            {{-- <td>{{ $empleado->email }}</a>
                            </td> --}}
                            <td><a
                                    href=" {{ route('admin.empleados.show', $empleado) }} ">{{ $empleado->cargo->nombre }}</a>
                            </td>
                            <td>
                                @if ($empleado->estatus == 1)
                                    <span class="badge badge-success">Activo</span>
                                @else
                                    <span class="badge badge-danger">Inactivo</span>
                                @endif
                            </td>
                            <td width="4px">
                                <div class="btn-group">
                                    @can('admin.empleados.estatuempleado')
                                        <a type="button" class="btn btn-default btn-sm"
                                            style="border-color: rgb(158, 157, 157)">
                                            @if ($empleado->estatus == 1)
                                                <form class="formulario-estatus"
                                                    action="{{ route('admin.empleados.estatuempleado', $empleado) }}"
                                                    method="get">
                                                    @csrf
                                                    <button type="submit"
                                                        class="btn btn-default text-success border-0 btn-sm p-0">
                                                        <i class="fas fa-check-circle"></i>
                                                    </button>
                                                </form>
                                            @else
                                                <form class="formulario-estatus2"
                                                    action="{{ route('admin.empleados.estatuempleado', $empleado) }}"
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
                                    @can('admin.empleados.edit')
                                        <a class="btn btn-default btn-sm"
                                            style="border-color: rgb(158, 157, 157); border-top-left-radius: 0px; border-bottom-left-radius: 0px;"
                                            href=" {{ route('admin.empleados.edit', $empleado) }} "><i
                                                class="fas fa-edit text-blue"></i>
                                        </a>
                                    @endcan
                                    <a class="btn btn-default btn-sm"
                                        style="border-color: rgb(158, 157, 157); border-top-left-radius: 0px; border-bottom-left-radius: 0px;"
                                        href=" {{ route('admin.empleados.show', $empleado) }} "><i
                                            class="fas fa-eye text-yellow"></i>
                                    </a>
                                    @can('admin.empleados.destroy')
                                        <a type="button" class="btn btn-default btn-sm"
                                            style="border-color: rgb(158, 157, 157); border-top-left-radius: 0px; border-bottom-left-radius: 0px;">
                                            <form class="formulario-eliminar"
                                                action="{{ route('admin.empleados.destroy', $empleado) }}" method="POST">
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
                {{ $empleados->links() }}
            </span>
        @else
            <div class="px-6 py-4 text-center text-sm">
                No existe ninguna coincidencia
            </div>
        @endif
    </div>
</div>
