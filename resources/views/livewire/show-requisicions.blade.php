<div class="card elevation-5 col-md-12 col-sm-12 pt-3" style="border-radius: 0.95rem" bis_skin_checked="1">
    <div class="card-header" style="padding: .75rem .25rem" bis_skin_checked="1">
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-search"></i></span>
            </div>
            <input wire:model="search" type="text" class="form-control mr-2" placeholder="Buscar">
            @can('admin.requisicions.create')
            <a href="{{ route('admin.requisicions.create') }}" class="btn bg-navy btn-sm px-2 elevation-4"><i
                class="fas fa-plus mt-2 px-3"></i>
            </a>
            @endcan
        </div>
    </div>
    <div class="card-body table-responsive">
        @if ($requisicions->count())
            <table class="table table-striped table-hover text-nowrap">
                <thead>
                    <tr>
                        <th scope="col" role="button"
                            class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7 ps-2"
                            wire:click="order('correlativo')">
                            Nro.
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
                        <th scope="col" role="button"
                            class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7 ps-2"
                            wire:click="order('user_id')">
                            Solicitante
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
                        @can('admin.requisicions.estaturequisicions')
                            
                        <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7 ps-2">
                            Anular
                        </th>
                        @endcan
                        <th colspan="2"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($requisicions as $requisicion)
                        <tr class="text-secondary text-sm font-weight-bold">

                            <td> <a href="{{ route('admin.requisicions.show', $requisicion->id) }}">{{ $requisicion->correlativo }}</a>
                            </td>
                            <td>
                                @if($requisicion->solicitud_id == true)

                                    <a href="{{ route('admin.requisicions.show', $requisicion->id) }}">{{ $requisicion->solicitud->user->display_user }}</a>

                                @elseif($requisicion->empleado_id == true)

                                    <a href="{{ route('admin.requisicions.show', $requisicion->id) }}">{{ $requisicion->empleado->display_empleado }}</a>


                                @endif
                            </td>
                            <td>
                                @if($requisicion->solicitud_id == true)

                                    <a href="{{ route('admin.requisicions.show', $requisicion->id) }}">{{ $requisicion->solicitud->user->departamento->nombre }}</a>
                                 
                                @elseif($requisicion->empleado_id == true)

                                    <a href="{{ route('admin.requisicions.show', $requisicion->id) }}">{{ $requisicion->empleado->departamento->nombre }}</a>
                                    
                                @endif
                                
                            </td>
                            
                            <td>
                                @if ($requisicion->estatus == 1)
                                <p class="badge badge-warning text-white  elevation-4">
                                    <i class="fas fa-exclamation-circle"></i> Pendiente
                                </p>
                                @elseif ($requisicion->estatus == 0)
                                    <p class="badge badge-secondary text-white  elevation-4">
                                        <i class="fas fa-times-circle"></i> Anulada &nbsp; &nbsp;
                                    </p>
                                @elseif ($requisicion->estatus == 2)
                                    <p class="badge badge-success  text-white  elevation-4">
                                        <i class="fas fa-check-circle"></i> Procesada
                                    </p>
                                @endif
                            </td>
                            <td>
                                @if ($requisicion->estatus == 1)
                                    @can('admin.requisicions.estaturequisicions')
                                    <form class="anular" action="{{ route('admin.requisicions.estaturequisicion', $requisicion) }}"
                                        method="get">
                                        @csrf
                                        <button type="submit" class="btn btn-warning text-white btn-sm elevation-4">
                                            <i class="fas fa-exclamation-circle"></i> Pendiente
                                        </button>
                                    </form>
                                    @endcan

                                @elseif ($requisicion->estatus == 0)
                                    <p class="btn  btn-secondary btn-sm disabled text-white  elevation-4">
                                        <i class="fas fa-times-circle"></i> Anulado &nbsp; &nbsp;
                                    </p>

                                @elseif ($requisicion->estatus == 2)
                                    <p class="btn  btn-success btn-sm disabled text-white  elevation-4">
                                        <i class="fas fa-check-circle"></i> Procesado
                                    </p>

                                @endif
                            </td>
                            <td>
                                <div class="btn-group">
                                    <a href="{{url('admin/pdfRequisicion',$requisicion)}}" target="_blank">
                                        <button type="button" style="border-color: rgb(158, 157, 157);" class="btn btn-default elevation-4 btn-sm">
                                          <i class="far fa-fw fa-file-pdf text-red"></i>
                                        </button> &nbsp;
                                     </a>
                                    <a class="btn btn-default elevation-4 btn-sm"
                                        style="border-color: rgb(158, 157, 157);"
                                        href=" {{ route('admin.requisicions.show', $requisicion->id) }} ">
                                        <i class="fas fa-eye text-yellow"></i>
                                    </a>
                                    <a type="button" class="btn btn-default btn-sm"
                                        style="border-color: rgb(158, 157, 157); border-top-left-radius: 0px; border-bottom-left-radius: 0px;">
                                        <form class="formulario-eliminar"
                                            action="{{ route('admin.requisicions.destroy', $requisicion->id) }}"
                                            method="POST">
                                            @csrf
                                            @method('delete')
                                            <button type="submit"
                                                class="btn btn-default btn-sm border-0 p-0 text-danger"><i
                                                    class="fas fa-trash"></i></button>
                                        </form>
                                    </a>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <span class="py-2 px-4 float-right ">
                {{ $requisicions->links() }}
            </span>
        @else
            <div class="px-6 py-4 text-center text-sm">
                No existe ninguna coincidencia
            </div>
        @endif
    </div>
</div>
