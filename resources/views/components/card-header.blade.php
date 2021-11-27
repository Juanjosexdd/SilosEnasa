<div class="container mt-0">
    <div class="row ">
        <div class="col-md-12 d-sm-none d-xs-none d-md-block">
            <div class="info-box d-flex justify-content-between">
                <a class="btn btn-app bg-warning text-white elevation-4 border-2" href="{{ route('admin.solicituds.index') }}">
                    <i class="fas fa-clipboard-list "></i> Solicitudes
                </a>
                @can('admin.requisicions.index')
                <a class="btn btn-app bg-cyan elevation-4 border-2" href="{{ route('admin.requisicions.index') }}"> <i class="fas fa-clipboard-list "></i> Requisiciones
                </a>
                @endcan
                @can('admin.ingresos.index')
                <a class="btn btn-app bg-success elevation-4 border-2" href="{{ route('admin.ingresos.index') }}">
                    <i class="fas fa-people-carry"></i> Ingresos
                </a>
                @endcan
                @can('admin.egresos.index')
                <a class="btn btn-app bg-danger elevation-4 border-2" href="{{ route('admin.egresos.index') }}">
                    <i class="fas fa-dolly  "></i> Egresos
                </a>
                @endcan
                @can('admin.biennacionals.index')
                <a class="btn btn-app bg-info elevation-4 border-2" href="{{ route('admin.biennacionals.index') }}">
                    <i class="fas fa-archive"></i> Bienes
                </a>
                @endcan
                @can('admin.asignacions.index')
                <a class="btn btn-app bg-success elevation-4 border-2" href="{{ route('admin.asignacions.index') }}">
                    <i class="fas fa-child"></i> Asignacion
                </a>
                @endcan
                @can('admin.report.index')
                <a class="btn btn-app bg-danger elevation-4 border-2" href="{{ route('admin.report.index') }}">
                    <i class="far fa-file-pdf"></i> Reportes
                </a>
                @endcan
                @can('admin.productos.index')
                <a class="btn btn-app bg-olive elevation-4 border-2" href="{{ route('admin.productos.index') }}">
                    <i class="fab fa-product-hunt"></i> Inventario
                </a>
                @endcan
                @can('admin.users.index')
                <a class="btn btn-app bg-gray elevation-4 border-2" href="{{ route('admin.users.index') }}">
                    <i class="fas fa-users-cog"></i> Usuarios
                </a>
                @endcan
                @can('admin.logins.index')
                <a class="btn btn-app bg-lightblue elevation-4 border-2" href="{{ route('admin.logins.index') }}">
                    <i class="fas fa-traffic-light "></i> Sesiones
                </a>
                @endcan
                @can('admin.respaldos.index')
                <a class="btn btn-app bg-danger elevation-4 border-2" href="{{ route('admin.respaldos.index') }}">
                    <i class="fas fa-cloud-download-alt"></i> Respaldos
                </a>
                @endcan
            </div>
        </div>
        <!-- <div class="col-md-3">
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
        </div> -->
    </div>
</div>
</div>
<div class="container">
    <div class="card bg-navy elevation-4 col-md-12 col-sm-12" style="border-radius: 0.95rem">
        <div class="card-header d-flex ">
            <span class="card-tools mr-2 pr-2">
                <img src="{{ asset('vendor/adminlte/dist/img/logo.png') }}" alt="ENASA" class="brand-image img-size-50" card-tools image elevation-3" style="opacity:.8">
            </span>
            {{ $slot }}

        </div>
    </div>
</div>