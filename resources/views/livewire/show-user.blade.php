<div class="card elevation-5 col-md-12 col-sm-12 pt-3" style="border-radius: 0.95rem">
    <div class="card-header" style="padding: .75rem .25rem">
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-search"></i></span>
            </div>
            <input wire:model="search" type="text" class="form-control mr-2" placeholder="Buscar">
            @can('admin.users.create')
                <a href="{{ route('admin.users.create') }}" class="btn bg-navy btn-sm px-2 elevation-4"><i
                        class="fas fa-plus mt-2 px-3"></i>
                </a>
            @endcan
        </div>
    </div>
    <!-- /.card-header -->
    <div class="card-body table-responsive p-0">
        @if ($users->count())
            <table class="table table-striped table-hover text-nowrap">
                <thead>
                    <tr>
                        <th scope="col" role="button" wire:click="order('name')">
                            Nombres
                            @if ($sort == 'name')
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
                        <th scope="col" role="button" wire:click="order('username')">
                            Usuario
                            @if ($sort == 'username')
                                @if ($direction == 'asc')
                                    <i class="fas fa-sort-numeric-up-alt float-right mt-1"></i>
                                @else
                                    <i class="fas fa-sort-numeric-down-alt float-right mt-1"></i>
                                @endif
                            @else
                                <i class="fas fa-sort float-right mt-1"></i>
                            @endif
                        </th>

                        <th scope="col" role="button" wire:click="order('email')">
                            Correo electronico
                            @if ($sort == 'email')
                                @if ($direction == 'asc')
                                    <i class="fas fas fa-sort-amount-down-alt float-right mt-1"></i>
                                @else
                                    <i class="fas fa-sort-amount-down float-right mt-1"></i>
                                @endif
                            @else
                                <i class="fas fa-sort float-right mt-1"></i>
                            @endif
                        </th>
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
                        <th colspan="3"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                        <tr>
                            <td><a href=" {{ route('admin.users.show', $user) }} "> <img
                                        class="img-size-32  img-circle image elevation-2"
                                        src="{{ $user->profile_photo_url }}" alt="{{ $user->name }}" />
                                    {{ $user->name }} {{ $user->last_name }}</a></td>
                            <td><a href=" {{ route('admin.users.show', $user) }} ">{{ $user->tipodocumento->abreviado }}-{{ $user->cedula }}
                                </a></td>
                            <td><a href=" {{ route('admin.users.show', $user) }} ">{{ $user->username }}</a></td>
                            <td><a href=" {{ route('admin.users.show', $user) }} ">{{ $user->email }}</a></td>
                            <td><a
                                    href=" {{ route('admin.users.show', $user) }} ">{{ Str::limit($user->cargo->nombre, 20) }}</a>
                            </td>
                            <td>
                                @if ($user->estatus == 1)
                                    <span class="badge badge-success">Activo</span>
                                @else
                                    <span class="badge badge-danger">Inactivo</span>
                                @endif
                            </td>
                            <td width="4px">
                                <div class="btn-group">
                                    @can('admin.users.UpdateStatus')
                                        <a type="button" class="btn btn-default btn-sm"
                                            style="border-color: rgb(158, 157, 157)">
                                            @if ($user->estatus == 1)
                                                <form class="formulario-estatus"
                                                    action="{{ route('admin.users.UpdateStatus', $user) }}" method="get">
                                                    @csrf
                                                    <button type="submit" class="btn btn-default border-0 btn-sm p-0"><i
                                                            class="fas fa-user-check text-success"></i></button>
                                                </form>
                                            @else
                                                <form class="formulario-estatus2"
                                                    action="{{ route('admin.users.UpdateStatus', $user) }}" method="get">
                                                    @csrf
                                                    <button type="submit"
                                                        class="btn btn-default text-danger border-0 btn-sm p-0"><i
                                                            class="fas fa-user-times"></i></button>
                                                </form>
                                            @endif
                                        </a>
                                    @endcan
                                    @can('admin.users.edit')
                                        <a class="btn btn-default btn-sm"
                                            style="border-color: rgb(158, 157, 157); border-top-left-radius: 0px; border-bottom-left-radius: 0px;"
                                            href=" {{ route('admin.users.edit', $user) }} "><i
                                                class="fas fa-edit text-blue"></i>
                                        </a>
                                    @endcan
                                    <a class="btn btn-default btn-sm"
                                        style="border-color: rgb(158, 157, 157); border-top-left-radius: 0px; border-bottom-left-radius: 0px;"
                                        href=" {{ route('admin.users.show', $user) }} "><i
                                            class="fas fa-eye text-yellow"></i>
                                    </a>
                                    @can('admin.users.destroy')
                                        <a type="button" class="btn btn-default btn-sm"
                                            style="border-color: rgb(158, 157, 157); border-top-left-radius: 0px; border-bottom-left-radius: 0px;">
                                            <form class="formulario-eliminar"
                                                action="{{ route('admin.users.destroy', $user) }}" method="POST">
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
                {{ $users->links() }}
            </span>
        @else
            <div class="px-6 py-4 text-center text-sm">
                No existe ninguna coincidencia
            </div>
        @endif
    </div>
</div>
