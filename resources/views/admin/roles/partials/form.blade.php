<a href=" {{ route('admin.roles.index') }} " class="float-right btn bg-navy btn-sm px-3 py-2 elevation-4"><i
        class="fas fa-reply"></i> Volver</a>
<p class="h3 text-blue">Rol</p>
<hr>
<div class="col-md-12">
    <div class="form-group">
        {!! Form::label('name', 'Nombre : ', ['class' => 'text-blue']) !!} <span class="text-danger">*</span>
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-clipboard-list text-blue"></i></span>
            </div>
            {{ Form::text('name', null, ['class' => 'form-control' . ($errors->has('name') ? ' is-invalid' : ''), 'placeholder' => 'Nombre']) }}
            {!! $errors->first('name', ' <div class="invalid-feedback text-center"><strong>:message</strong></div>') !!}

        </div>
    </div>
</div>
<h2 class="h4 text-center font-weight-bold text-secondary">Lista de permisos</h2>


{{-- Movimientos --}}
<div id="movimientos">
    <div class="card card-navy">
        <div class="card-header">
            <h4 class="card-title w-100">
                <a class="d-block w-100 collapsed" data-toggle="collapse" href="#collapsefive"  aria-expanded="false">
                    <i class="fas fa-truck-loading text-blue "></i> Movimientos
                </a>
            </h4>
        </div>
        <div id="collapsefive" class="collapse" data-parent="#movimientos">
            <div class="card-body table-responsive">
                <table class="table table-stripped">
                    <thead>
                        <tr>

                            <th>Modelo</th>
                            <th>Ver</th>
                            <th>Registrar</th>
                            <th>Editar</th>
                            <th>Eliminar</th>
                            <th>Estatus</th>
                        </tr>
                    </thead>
                    <tbody>

                        {{-- Proveedores --}}
                        <tr>
                            <th class="d-flex">
                                <i class="fas fa-fw fa-users text-blue"></i>&nbsp; Proveedores
                            </th>
                            <th>
                                <label class="text-muted d-inline">
                                    {!! Form::checkbox('permissions[]', 58, null, null, ['class' => 'icheckbox_flat']) !!} Ver Proveedores
                                </label>
                            </th>
                            <th>
                                <label class="text-muted d-inline">
                                    {!! Form::checkbox('permissions[]', 59, null, null, ['class' => 'icheckbox_flat']) !!} Registrar Proveedores
                                </label>
                            </th>
                            <th>
                                <label class="text-muted d-inline">
                                    {!! Form::checkbox('permissions[]', 60, null, null, ['class' => 'icheckbox_flat']) !!} Editar Proveedores
                                </label>
                            </th>
                            <th>
                                <label class="text-muted d-inline">
                                    {!! Form::checkbox('permissions[]', 61, null, null, ['class' => 'icheckbox_flat']) !!} Eliminar Proveedores
                                </label>
                            </th>
                            <th>
                                <label class="text-muted d-inline">
                                    {!! Form::checkbox('permissions[]', 62, null, null, ['class' => 'icheckbox_flat']) !!} Estatus Proveedores
                                </label>
                            </th>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
{{-- Inventario --}}
<div id="inventario">
    <div class="card card-navy">
        <div class="card-header">
            <h4 class="card-title w-100">
                <a class="d-block w-100 collapsed" data-toggle="collapse" href="#collapsefour"  aria-expanded="false">
                    <i class="fas fa-warehouse text-blue "></i> Inventario
                </a>
            </h4>
        </div>
        <div id="collapsefour" class="collapse" data-parent="#inventario">
            <div class="card-body table-responsive">
                <table class="table table-stripped">
                    <thead>
                        <tr>

                            <th>Modelo</th>
                            <th>Ver</th>
                            <th>Registrar</th>
                            <th>Editar</th>
                            <th>Eliminar</th>
                            <th>Estatus</th>
                        </tr>
                    </thead>
                    <tbody>

                        {{-- Empleados --}}
                        <tr>
                            <th class="d-flex">
                                <i class="fas fa-fw fa-users text-blue"></i>&nbsp; Empleados
                            </th>
                            <th>
                                <label class="text-muted d-inline">
                                    {!! Form::checkbox('permissions[]', 38, null, null, ['class' => 'icheckbox_flat']) !!} Ver empleados
                                </label>
                            </th>
                            <th>
                                <label class="text-muted d-inline">
                                    {!! Form::checkbox('permissions[]', 39, null, null, ['class' => 'icheckbox_flat']) !!} Registrar empleados
                                </label>
                            </th>
                            <th>
                                <label class="text-muted d-inline">
                                    {!! Form::checkbox('permissions[]', 40, null, null, ['class' => 'icheckbox_flat']) !!} Editar empleados
                                </label>
                            </th>
                            <th>
                                <label class="text-muted d-inline">
                                    {!! Form::checkbox('permissions[]', 41, null, null, ['class' => 'icheckbox_flat']) !!} Eliminar empleados
                                </label>
                            </th>
                            <th>
                                <label class="text-muted d-inline">
                                    {!! Form::checkbox('permissions[]', 42, null, null, ['class' => 'icheckbox_flat']) !!} Estatus empleados
                                </label>
                            </th>
                        </tr>
                        {{-- Almacenes --}}
                        <tr>
                            <th class="d-flex">
                                <i class="fas fa-warehouse text-blue "></i> Almacenes
                            </th>
                            <th>
                                <label class="text-muted d-inline">
                                    {!! Form::checkbox('permissions[]', 43, null, null, ['class' => 'icheckbox_flat']) !!} Ver almacenes
                                </label>
                            </th>
                            <th>
                                <label class="text-muted d-inline">
                                    {!! Form::checkbox('permissions[]', 44, null, null, ['class' => 'icheckbox_flat']) !!} Registrar almacenes
                                </label>
                            </th>
                            <th>
                                <label class="text-muted d-inline">
                                    {!! Form::checkbox('permissions[]', 45, null, null, ['class' => 'icheckbox_flat']) !!} Editar almacenes
                                </label>
                            </th>
                            <th>
                                <label class="text-muted d-inline">
                                    {!! Form::checkbox('permissions[]', 46, null, null, ['class' => 'icheckbox_flat']) !!} Eliminar almacenes
                                </label>
                            </th>
                            <th>
                                <label class="text-muted d-inline">
                                    {!! Form::checkbox('permissions[]', 47, null, null, ['class' => 'icheckbox_flat']) !!} estatus almacenes
                                </label>
                            </th>
                        </tr>
                        {{-- Clacificacion --}}
                        <tr>
                            <th class="d-flex">
                                <i class="fas fa-boxes text-blue "></i> Clacificacion
                            </th>
                            <th>
                                <label class="text-muted d-inline">
                                    {!! Form::checkbox('permissions[]', 48, null, null, ['class' => 'icheckbox_flat']) !!} Ver clacificaciones
                                </label>
                            </th>
                            <th>
                                <label class="text-muted d-inline">
                                    {!! Form::checkbox('permissions[]', 49, null, null, ['class' => 'icheckbox_flat']) !!} Registrar clacificaciones
                                </label>
                            </th>
                            <th>
                                <label class="text-muted d-inline">
                                    {!! Form::checkbox('permissions[]', 50, null, null, ['class' => 'icheckbox_flat']) !!} Editar clacificaciones
                                </label>
                            </th>
                            <th>
                                <label class="text-muted d-inline">
                                    {!! Form::checkbox('permissions[]', 51, null, null, ['class' => 'icheckbox_flat']) !!} Eliminar clacificaciones
                                </label>
                            </th>
                            <th>
                                <label class="text-muted d-inline">
                                    {!! Form::checkbox('permissions[]', 52, null, null, ['class' => 'icheckbox_flat']) !!} Estatus clacificaciones
                                </label>
                            </th>
                        </tr>
                        {{-- Productos --}}
                        <tr>
                            <th class="d-flex">
                                <i class="fab fa-product-hunt text-blue "></i> Productos
                            </th>
                            <th>
                                <label class="text-muted d-inline">
                                    {!! Form::checkbox('permissions[]', 53, null, null, ['class' => 'icheckbox_flat']) !!} Ver productos
                                </label>
                            </th>
                            <th>
                                <label class="text-muted d-inline">
                                    {!! Form::checkbox('permissions[]', 54, null, null, ['class' => 'icheckbox_flat']) !!} Registrar productos
                                </label>
                            </th>
                            <th>
                                <label class="text-muted d-inline">
                                    {!! Form::checkbox('permissions[]', 55, null, null, ['class' => 'icheckbox_flat']) !!} Editar productos
                                </label>
                            </th>
                            <th>
                                <label class="text-muted d-inline">
                                    {!! Form::checkbox('permissions[]', 56, null, null, ['class' => 'icheckbox_flat']) !!} Eliminar productos
                                </label>
                            </th>
                            <th>
                                <label class="text-muted d-inline">
                                    {!! Form::checkbox('permissions[]', 57, null, null, ['class' => 'icheckbox_flat']) !!} Estatus productos
                                </label>
                            </th>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

{{-- Ajustes --}}
<div id="ajustes">
    <div class="card card-navy">
        <div class="card-header">
            <h4 class="card-title w-100">
                <a class="d-block w-100 collapsed" data-toggle="collapse" href="#collapsethree"  aria-expanded="false">
                    <i class="fas fa-cogs text-blue "></i> Ajustes de empresa
                </a>
            </h4>
        </div>
        <div id="collapsethree" class="collapse" data-parent="#ajustes">
            <div class="card-body table-responsive">
                <table class="table table-stripped">
                    <thead>
                        <tr>

                            <th>Modelo</th>
                            <th>Ver</th>
                            <th>Registrar</th>
                            <th>Editar</th>
                            <th>Eliminar</th>
                            <th>Estatus</th>
                        </tr>
                    </thead>
                    <tbody>

                        {{-- Tipo documento --}}
                        <tr>
                            <th class="d-flex">
                                <i class="far fa-file-alt text-blue "></i> Documento
                            </th>
                            <th>
                                <label class="text-muted d-inline">
                                    {!! Form::checkbox('permissions[]', 13, null, null, ['class' => 'icheckbox_flat']) !!} Ver documento
                                </label>
                            </th>
                            <th>
                                <label class="text-muted d-inline">
                                    {!! Form::checkbox('permissions[]', 14, null, null, ['class' => 'icheckbox_flat']) !!} Registrar documento
                                </label>
                            </th>
                            <th>
                                <label class="text-muted d-inline">
                                    {!! Form::checkbox('permissions[]', 15, null, null, ['class' => 'icheckbox_flat']) !!} Editar documento
                                </label>
                            </th>
                            <th>
                                <label class="text-muted d-inline">
                                    {!! Form::checkbox('permissions[]', 16, null, null, ['class' => 'icheckbox_flat']) !!} Eliminar documento
                                </label>
                            </th>
                            <th>
                                <label class="text-muted d-inline">
                                    {!! Form::checkbox('permissions[]', 17, null, null, ['class' => 'icheckbox_flat']) !!} Estatus documento
                                </label>
                            </th>
                        </tr>
                        {{-- Cargos --}}
                        <tr>
                            <th class="d-flex">
                                <i class="fas fa-project-diagram text-blue "></i> Cargos
                            </th>
                            <th>
                                <label class="text-muted d-inline">
                                    {!! Form::checkbox('permissions[]', 18, null, null, ['class' => 'icheckbox_flat']) !!} Ver cargo
                                </label>
                            </th>
                            <th>
                                <label class="text-muted d-inline">
                                    {!! Form::checkbox('permissions[]', 19, null, null, ['class' => 'icheckbox_flat']) !!} Registrar cargo
                                </label>
                            </th>
                            <th>
                                <label class="text-muted d-inline">
                                    {!! Form::checkbox('permissions[]', 20, null, null, ['class' => 'icheckbox_flat']) !!} Editar cargo
                                </label>
                            </th>
                            <th>
                                <label class="text-muted d-inline">
                                    {!! Form::checkbox('permissions[]', 21, null, null, ['class' => 'icheckbox_flat']) !!} Eliminar cargo
                                </label>
                            </th>
                            <th>
                                <label class="text-muted d-inline">
                                    {!! Form::checkbox('permissions[]', 22, null, null, ['class' => 'icheckbox_flat']) !!} Estatus cargo
                                </label>
                            </th>
                        </tr>
                        {{-- Departamentos --}}
                        <tr>
                            <th class="d-flex">
                                <i class="fas fa-sitemap text-blue "></i> Departamentos
                            </th>
                            <th>
                                <label class="text-muted d-inline">
                                    {!! Form::checkbox('permissions[]', 23, null, null, ['class' => 'icheckbox_flat']) !!} Ver departamentos
                                </label>
                            </th>
                            <th>
                                <label class="text-muted d-inline">
                                    {!! Form::checkbox('permissions[]', 24, null, null, ['class' => 'icheckbox_flat']) !!} Registrar departamentos
                                </label>
                            </th>
                            <th>
                                <label class="text-muted d-inline">
                                    {!! Form::checkbox('permissions[]', 25, null, null, ['class' => 'icheckbox_flat']) !!} Editar departamentos
                                </label>
                            </th>
                            <th>
                                <label class="text-muted d-inline">
                                    {!! Form::checkbox('permissions[]', 26, null, null, ['class' => 'icheckbox_flat']) !!} Eliminar departamentos
                                </label>
                            </th>
                            <th>
                                <label class="text-muted d-inline">
                                    {!! Form::checkbox('permissions[]', 27, null, null, ['class' => 'icheckbox_flat']) !!} Estatus departamentos
                                </label>
                            </th>
                        </tr>
                        {{-- Estados --}}
                        <tr>
                            <th class="d-flex">
                                <i class="fas fa-map-marked-alt text-blue "></i> Estados
                            </th>
                            <th>
                                <label class="text-muted d-inline">
                                    {!! Form::checkbox('permissions[]', 28, null, null, ['class' => 'icheckbox_flat']) !!} Ver estados
                                </label>
                            </th>
                            <th>
                                <label class="text-muted d-inline">
                                    {!! Form::checkbox('permissions[]', 29, null, null, ['class' => 'icheckbox_flat']) !!} Registrar estados
                                </label>
                            </th>
                            <th>
                                <label class="text-muted d-inline">
                                    {!! Form::checkbox('permissions[]', 30, null, null, ['class' => 'icheckbox_flat']) !!} Editar estados
                                </label>
                            </th>
                            <th>
                                <label class="text-muted d-inline">
                                    {!! Form::checkbox('permissions[]', 31, null, null, ['class' => 'icheckbox_flat']) !!} Eliminar estados
                                </label>
                            </th>
                            <th>
                                <label class="text-muted d-inline">
                                    {!! Form::checkbox('permissions[]', 32, null, null, ['class' => 'icheckbox_flat']) !!} Estatus estados
                                </label>
                            </th>
                        </tr>
                        {{-- Municipios --}}
                        <tr>
                            <th class="d-flex">
                                <i class="fas fa-map-marked-alt text-blue"></i> Municipios
                            </th>
                            <th>
                                <label class="text-muted d-inline">
                                    {!! Form::checkbox('permissions[]', 33, null, null, ['class' => 'icheckbox_flat']) !!} Ver Municipios
                                </label>
                            </th>
                            <th>
                                <label class="text-muted d-inline">
                                    {!! Form::checkbox('permissions[]', 34, null, null, ['class' => 'icheckbox_flat']) !!} Registrar Municipios
                                </label>
                            </th>
                            <th>
                                <label class="text-muted d-inline">
                                    {!! Form::checkbox('permissions[]', 35, null, null, ['class' => 'icheckbox_flat']) !!} Editar Municipios
                                </label>
                            </th>
                            <th>
                                <label class="text-muted d-inline">
                                    {!! Form::checkbox('permissions[]', 36, null, null, ['class' => 'icheckbox_flat']) !!} Eliminar Municipios
                                </label>
                            </th>
                            <th>
                                <label class="text-muted d-inline">
                                    {!! Form::checkbox('permissions[]', 37, null, null, ['class' => 'icheckbox_flat']) !!} Estatus Municipios
                                </label>
                            </th>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

{{-- Seguridad --}}
<div id="seguro">
    <div class="card card-navy">
        <div class="card-header">
            <h4 class="card-title w-100">
                <a class="d-block w-100 collapsed" data-toggle="collapse" href="#collapseOne"  aria-expanded="false">
                    <i class="fas fa-fw fa-user-shield text-blue "></i> Permisos de seguridad del sistema
                </a>
            </h4>
        </div>
        <div id="collapseOne" class="collapse" data-parent="#seguro">
            <div class="card-body table-responsive">
                <table class="table table-stripped">
                    <thead>
                        <tr>
                            <th>Modelo</th>
                            <th>Ver</th>
                            <th>Registrar</th>
                            <th>Editar</th>
                            <th>Eliminar</th>
                            <th>Estatus</th>
                        </tr>
                    </thead>
                    <tbody>

                        <tr>
                            <th class="d-flex">
                                <i class="fas fa-fw fa-users-cog text-blue "></i> Usuarios
                            </th>
                            <th>
                                <label class="text-muted d-inline">
                                    {!! Form::checkbox('permissions[]', 2, null, null, ['class' => 'icheckbox_flat']) !!} Ver Usuario
                                </label>
                            </th>
                            <th>
                                <label class="text-muted d-inline">
                                    {!! Form::checkbox('permissions[]', 3, null, null, ['class' => 'icheckbox_flat']) !!} Registrar Usuario
                                </label>
                            </th>
                            <th>
                                <label class="text-muted d-inline">
                                    {!! Form::checkbox('permissions[]', 4, null, null, ['class' => 'icheckbox_flat']) !!} Editar Usuario
                                </label>
                            </th>
                            <th>
                                <label class="text-muted d-inline">
                                    {!! Form::checkbox('permissions[]', 5, null, null, ['class' => 'icheckbox_flat']) !!} Eliminar Usuario
                                </label>
                            </th>
                            <th>
                                <label class="text-muted d-inline">
                                    {!! Form::checkbox('permissions[]', 6, null, null, ['class' => 'icheckbox_flat']) !!} Estatus Usuario
                                </label>
                            </th>
                        </tr>
                        <tr>
                            <th class="d-flex">
                                <i class="fas fa-code-branch text-blue "></i> Roles
                            </th>
                            <th>
                                <label class="text-muted d-inline">
                                    {!! Form::checkbox('permissions[]', 7, null, null, ['class' => 'icheckbox_flat']) !!} Ver rol
                                </label>
                            </th>
                            <th>
                                <label class="text-muted d-inline">
                                    {!! Form::checkbox('permissions[]', 8, null, null, ['class' => 'icheckbox_flat']) !!} Registrar rol
                                </label>
                            </th>
                            <th>
                                <label class="text-muted d-inline">
                                    {!! Form::checkbox('permissions[]', 9, null, null, ['class' => 'icheckbox_flat']) !!} Editar rol
                                </label>
                            </th>
                            <th>
                                <label class="text-muted d-inline">
                                    {!! Form::checkbox('permissions[]', 10, null, null, ['class' => 'icheckbox_flat']) !!} Eliminar rol
                                </label>
                            </th>
                            <th>
                                <label class="text-muted d-inline font-italic text-center">
                                    *** X ***
                                </label>
                            </th>
                        </tr>
                        <tr>
                            <th class="d-flex">
                                <i class="fas fa-clipboard-list text-blue "></i> Registros
                            </th>
                            <th>
                                <label class="text-muted d-inline">
                                    {!! Form::checkbox('permissions[]', 10, null, null, ['class' => 'icheckbox_flat']) !!} Ver registros
                                </label>
                            </th>
                            <th>
                                <label class="text-muted d-inline font-italic text-center">
                                    *** X ***
                                </label>
                            </th>
                            <th>
                                <label class="text-muted d-inline font-italic text-center">
                                    *** X ***
                                </label>
                            </th>
                            <th>
                                <label class="text-muted d-inline font-italic text-center">
                                    *** X ***
                                </label>
                            </th>
                            <th>
                                <label class="text-muted d-inline font-italic text-center">
                                    *** X ***
                                </label>
                            </th>
                        </tr>
                        <tr>
                            <th class="d-flex">
                                <i class="fas fa-traffic-light text-blue "></i> Sesiones
                            </th>
                            <th>
                                <label class="text-muted d-inline">
                                    {!! Form::checkbox('permissions[]', 12, null, null, ['class' => 'icheckbox_flat']) !!} Ver sesiones
                                </label>
                            </th>
                            <th>
                                <label class="text-muted d-inline font-italic text-center">
                                    *** X ***
                                </label>
                            </th>
                            <th>
                                <label class="text-muted d-inline font-italic text-center">
                                    *** X ***
                                </label>
                            </th>
                            <th>
                                <label class="text-muted d-inline font-italic text-center">
                                    *** X ***
                                </label>
                            </th>
                            <th>
                                <label class="text-muted d-inline font-italic text-center">
                                    *** X ***
                                </label>
                            </th>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@section('css')
    <link rel="stylesheet" href="{{ asset('vendor/icheck/skins/flat/flat.css') }}">
@stop

@section('js')
    <script src=" {{ asset('vendor/jquery/jquery.min.js') }}  "></script>
    <script src=" {{ asset('vendor/icheck/icheck.js') }}  "></script>
    <script src=" {{ asset('vendor/adminlte/dist/js/demo.js') }}  "></script>
    <script src="{{ asset('vendor/jQuery-Plugin-stringToSlug-1.3/jquery.stringToSlug.min.js') }}"></script>

    <script>
        $(document).ready(function() {
            $('input').iCheck({
                checkboxClass: 'icheckbox_flat',
                radioClass: 'iradio_flat'
            });
        });
    </script>
@endsection
