<div class="card elevation-5 col-md-12 col-sm-12 pt-3" style="border-radius: 0.95rem" bis_skin_checked="1">
    <div class="card-header" style="padding: .75rem .25rem" bis_skin_checked="1">
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-search"></i></span>
            </div>
            <input wire:model="search" type="text" class="form-control mr-2" placeholder="Buscar">

            <a href="{{ route('admin.asignacions.create') }}" class="btn bg-navy btn-sm px-2 elevation-4"><i
                    class="fas fa-plus mt-2 px-3"></i>
            </a>
        </div>
    </div>
    <div class="card-body table-responsive">
        @if ($asignacionbiens->count())
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
                            wire:click="order('empleado_id')">
                            Solicitado por:
                            @if ($sort == 'empleado_id')
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
                            wire:click="order('empleado_id')">
                            Departamento 
                            @if ($sort == 'empleado_id')
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
                        <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7 ps-2">
                            Anular
                        </th>
                        <th colspan="2"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($asignacionbiens as $asignacionbien)
                        <tr class="text-secondary text-sm font-weight-bold">
                            <td>  {{ $asignacionbien->id }}
                            </td>
                            <td> {{ $asignacionbien->user->name . ' - ' . $asignacionbien->user->last_name }}
                            </td>
                            <td> {{ $asignacionbien->empleado->display_empleado }}</td>
                            <td> {{ $asignacionbien->empleado->departamento->display_departamento }}</td>
                            <td>
                                @if ($asignacionbien->estatus == 1)
                                    <p class="badge badge-success text-white  elevation-4">
                                        <i class="fas fa-check-circle"></i> Asignado
                                    </p>
                                @elseif ($asignacionbien->estatus == 0)
                                    <p class="badge badge-secondary text-white  elevation-4">
                                        <i class="fas fa-times-circle"></i> Anulada &nbsp; &nbsp;
                                    </p>
                                @elseif ($asignacionbien->estatus == 2)
                                    <p class="badge badge-success  text-white  elevation-4">
                                        <i class="fas fa-times-circle"></i> Procesada
                                    </p>
                                @elseif ($asignacionbien->estatus == 3)
                                    <p class="badge badge-info  text-white  elevation-4">
                                        <i class="fas fa-check-circle"></i> Solicitado a compra
                                    </p>
                                @endif
                            </td>
                            <td>
                                @if ($asignacionbien->estatus == 1)
                                    <form class="anular"
                                        action="{{ route('admin.asignacions.estatuasignacion', $asignacionbien) }}"
                                        method="get">
                                        @csrf
                                        <button type="submit" class="btn btn-warning text-white btn-sm elevation-4">
                                            <i class="fas fa-times-circle"></i> Anular &nbsp; &nbsp;
                                        </button>
                                    </form>
                                @elseif ($asignacionbien->estatus == 0)
                                    <p class="btn  btn-secondary btn-sm disabled text-white  elevation-4">
                                        <i class="fas fa-times-circle"></i> Anulada
                                    </p>
                                @elseif ($asignacionbien->estatus == 2)
                                    <p class="btn  btn-success btn-sm disabled text-white  elevation-4">
                                        <i class="fas fa-check-circle"></i> Asignado
                                    </p>
                                @elseif ($asignacionbien->estatus == 3)
                                    <p class="btn  btn-info btn-sm disabled text-white  elevation-4">
                                        <i class="fas fa-check-circle"></i> Solicitado a compra
                                    </p>
                                @endif
                            </td>
                            {{-- <td>
                                <div class="btn-group">
                                    <a href="{{url('admin/pdfSolicitud',$asignacionbien)}}" target="_blank">
                                        <button type="button" style="border-color: rgb(158, 157, 157);" class="btn btn-default elevation-4 btn-sm">
                                          <i class="far fa-fw fa-file-pdf text-red"></i>
                                        </button> &nbsp;
                                     </a>
                                    <a class="btn btn-default elevation-4 btn-sm"
                                        style="border-color: rgb(158, 157, 157);"
                                        href=" {{ route('admin.asignacionbiens.show', $asignacionbien->id) }} ">
                                        <i class="fas fa-eye text-yellow"></i>
                                    </a>
                                </div>
                            </td> --}}
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <span class="py-2 px-4 float-right ">
                {{ $asignacionbiens->links() }}
            </span>
        @else
            <div class="px-6 py-4 text-center text-sm">
                No existe ninguna coincidencia
            </div>
        @endif
    </div>
</div>
