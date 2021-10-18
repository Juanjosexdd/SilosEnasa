<div class="container mt-0  mb-2">
    <div class="row ">
        <div class="col-md-3">
            <a class="text-uppercase text-secondary text-xs font-weight-bolder" href="{{ route('admin.solicituds.index') }}">
                <div class="mx-auto elevation-4 bg-navy btn-sm text-center">
                    <i class="fas fa-clipboard-list font-weight-bolder text-white"></i>
                    Solicitudes
                </div>
            </a>
        </div>
        <div class="col-md-3">
            @can('admin.requisicions.index')
                <a class="text-uppercase text-secondary text-xs font-weight-bolder" href="{{ route('admin.requisicions.index') }}">
                    <div class="mx-auto elevation-4 bg-navy btn-sm text-center">
                        <i class="fas fa-clipboard-list text-white"></i>
                        Requisiciones
                    </div>
                </a>
            @endcan
        </div>
        <div class="col-md-3">
            @can('admin.ingresos.index')
                <a class="text-uppercase text-secondary text-xs font-weight-bolder" href="{{ route('admin.ingresos.index') }}">
                    <div class="mx-auto elevation-4 bg-navy btn-sm text-center">
                        <i class="fas fa-people-carry text-white"></i>
                        Ingresos
                    </div>
                </a>
            @endcan
        </div>
        <div class="col-md-3">
            @can('admin.egresos.index')
                <a class="text-uppercase text-secondary text-xs font-weight-bolder" href="{{ route('admin.egresos.index') }}">
                    <div class="mx-auto elevation-4 bg-navy btn-sm text-center">
                        <i class="fas fa-dolly text-white"></i>
                        Egresos
                    </div>
                </a>
            @endcan
        </div>




    </div>
</div>
</div>
<div class="container">
    <div class="card bg-navy elevation-4 col-md-12 col-sm-12 pb-2" style="border-radius: 0.95rem">
        <div class="card-header d-flex ">
            <span class="card-tools mr-2 pr-2">
                <img src="{{ asset('vendor/adminlte/dist/img/logo.png') }}" alt="ENASA"
                    class="brand-image img-size-50" card-tools image elevation-3" style="opacity:.8">
            </span>
            {{ $slot }}

        </div>
    </div>
</div>
