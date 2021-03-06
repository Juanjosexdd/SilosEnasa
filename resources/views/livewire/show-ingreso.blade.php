<div class="card elevation-5 col-md-12 col-sm-12 pt-3" style="border-radius: 0.95rem" bis_skin_checked="1">
    <div class="card-header" style="padding: .75rem .25rem" bis_skin_checked="1">
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-search"></i></span>
            </div>
            <input wire:model="search" type="text" class="form-control mr-2" placeholder="Buscar">
            @can('admin.ingresos.create')
                
            <a href="{{ route('admin.ingresos.create') }}" class="btn bg-navy btn-sm px-2 elevation-4"><i
                class="fas fa-plus mt-2 px-3"></i>
            </a>
            @endcan
        </div>
    </div>
    <div class="card-body table-responsive">
        @if ($ingresos->count())
            <table class="table table-striped table-hover text-nowrap">
                <thead>
                    <tr>
                        <th scope="col" role="button" class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7 ps-2" wire:click="order('correlativo')">
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
                        {{-- <th scope="col" role="button" class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7 ps-2" wire:click="order('id')">
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

                        </th> --}}
                        <th scope="col" role="button" class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7 ps-2" wire:click="order('proveedor_id')">
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
                        <th scope="col" role="button" class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7 ps-2" wire:click="order('user_id')">
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
                        @can('admin.ingresos.estatuingresos')
                        <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7 ps-2">
                            Estatus
                        </th>
                        @endcan
                        <th colspan="2"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($ingresos as $ingreso)
                        <tr class="text-secondary text-sm font-weight-bold">
                            
                            <td> <a href="{{ route('admin.ingresos.show', $ingreso->id) }}">{{ $ingreso->correlativo}}</a></td>
                            {{-- <td> <a href="{{ route('admin.ingresos.show', $ingreso->id) }}">{{ $ingreso->created_at->toDateString() . '-' . $ingreso->id }}</a> </td> --}}
                            <td> <a href="{{ route('admin.ingresos.show', $ingreso->id) }}">{{ $ingreso->proveedor->nombre }}</a></td>
                            <td> <a href="{{ route('admin.ingresos.show', $ingreso->id) }}">{{ $ingreso->user->username }}</a> </td>
                            <td>
                                @if ($ingreso->estatus == 1)
                                    @can('admin.ingresos.estatuingresos')
                                    <form class="anular"
                                        action="{{ route('admin.ingresos.estatuingreso', $ingreso) }}" method="get">
                                        @csrf
                                        <button type="submit" class="btn btn-success btn-sm elevation-4">
                                            <i class="fas fa-check-circle"></i> Procesado
                                        </button>
                                    </form>
                                    @endcan
                                @else
                                    <p class="btn  btn-danger btn-sm disabled text-white  elevation-4">
                                        <i class="fas fa-times-circle"></i> Anulado &nbsp; &nbsp;
                                    </p>
                                @endif
                            </td>
                            <td>
                                <div class="btn-group">
                                    <a href="{{url('admin/pdfIngreso',$ingreso)}}" target="_blank">
                                        <button type="button" style="border-color: rgb(158, 157, 157);" class="btn btn-default elevation-4 btn-sm">
                                          <i class="far fa-fw fa-file-pdf text-red"></i>
                                        </button> &nbsp;
                                     </a>
                                    <a class="btn btn-default elevation-4 btn-sm"
                                        style="border-color: rgb(158, 157, 157);"
                                        href=" {{ route('admin.ingresos.show', $ingreso) }} "> 
                                        <i class="fas fa-eye text-yellow"></i>
                                    </a>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <span class="py-2 px-4 float-right ">
                {{ $ingresos->links() }}
            </span>
        @else
            <div class="px-6 py-4 text-center text-sm">
                No existe ninguna coincidencia
            </div>
        @endif
    </div>
</div>
