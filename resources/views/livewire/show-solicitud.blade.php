<div class="card elevation-5 col-md-12 col-sm-12 pt-3" style="border-radius: 0.95rem" bis_skin_checked="1">
    <div class="card-header" style="padding: .75rem .25rem" bis_skin_checked="1">
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-search"></i></span>
            </div>
            <input wire:model="search" type="text" class="form-control mr-2" placeholder="Buscar">

            <a href="{{ route('admin.solicituds.create') }}" class="btn bg-navy btn-sm px-2 elevation-4"><i
                    class="fas fa-plus mt-2 px-3"></i>
            </a>
        </div>
    </div>
    <div class="card-body table-responsive">
        @if ($solicituds->count())
            <table class="table table-striped table-hover text-nowrap">
                <thead>
                    <tr>
                        <th scope="col" role="button"
                            class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7 ps-2"
                            wire:click="order('id')">
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
                        <th scope="col" role="button"
                            class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7 ps-2"
                            wire:click="order('user_id')">
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
                        <th scope="col" role="button"
                            class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7 ps-2"
                            wire:click="order('departamento_id')">
                            Departamento Solicitante
                            @if ($sort == 'departamento_id')
                                @if ($direction == 'asc')
                                    <i class="fas fas fa-sort-amount-down-alt float-right mt-1"></i>
                                @else
                                    <i class="fas fa-sort-amount-down float-right mt-1"></i>
                                @endif
                            @else
                                <i class="fas fa-sort float-right mt-1"></i>
                            @endif
                        </th>
                        <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7 ps-2">
                            Estatus
                        </th>
                        <th colspan="2"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($solicituds as $solicitud)
                        <tr>
                            <td> <a
                                    href="{{ route('admin.solicituds.show', $solicitud->id) }}">{{ $solicitud->id }}</a>
                            </td>
                            <td> <a
                                    href="{{ route('admin.solicituds.show', $solicitud->id) }}">{{ $solicitud->user->name . ' - ' . $solicitud->user->last_name }}</a>
                            </td>
                            <td> <a
                                    href="{{ route('admin.solicituds.show', $solicitud->id) }}">{{ $solicitud->departamento->display_departamento }}</a>
                            </td>
                            <td>
                                @if ($solicitud->estatus == 1)
                                    <form class="anular" action="{{ route('admin.solicituds.estatusolicitud', $solicitud) }}"
                                        method="get">
                                        @csrf
                                        <button type="submit" class="btn btn-warning btn-sm elevation-4">
                                            <i class="fas fa-check-circle"></i> Pendiente
                                        </button>
                                    </form>
                                @else
                                    <p class="btn  btn-success btn-sm disabled text-white  elevation-4">
                                        <i class="fas fa-times-circle"></i> Procesado
                                    </p>
                                @endif
                            </td>
                            <td>
                                <div class="btn-group">
                                    <a class="btn btn-default elevation-4 btn-sm"
                                        style="border-color: rgb(158, 157, 157);"
                                        href=" {{ route('admin.solicituds.show', $solicitud->id) }} ">
                                        <i class="fas fa-eye text-yellow"></i>
                                    </a>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <span class="py-2 px-4 float-right ">
                {{ $solicituds->links() }}
            </span>
        @else
            <div class="px-6 py-4 text-center text-sm">
                No existe ninguna coincidencia
            </div>
        @endif
    </div>
</div>
