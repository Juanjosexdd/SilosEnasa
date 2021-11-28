@extends('adminlte::page')

@section('title', 'ENASA | REPORTES')

@section('content')
    @include('sweetalert::alert')

    <x-card-header>
        <h3 class="text-white">Reportes del sistema</h3>
    </x-card-header>
    <x-card-body>
        <ul class="nav nav-tabs pb-4" id="custom-content-above-tab" role="tablist">
            <li class="nav-item active">
                <a class="nav-link active" id="solicitudes-tab" data-toggle="pill" href="#solicitudes" role="tab"
                    aria-controls="solicitudes" aria-selected="true">Solicitudes</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="ingresos-tab" data-toggle="pill" href="#ingresos" role="tab"
                    aria-controls="ingresos" aria-selected="false">Ingresos</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="egresos-tab" data-toggle="pill" href="#egresos" role="tab"
                    aria-controls="egresos" aria-selected="false">Egresos</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="requisicion-tab" data-toggle="pill"
                    href="#requisicion" role="tab" aria-controls="requisicion"
                    aria-selected="false">Requisiciones</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="inventario-tab" data-toggle="pill" href="#inventario" role="tab"
                    aria-controls="inventario" aria-selected="false">Inventario</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="trabajador-tab" data-toggle="pill" href="#trabajador" role="tab"
                    aria-controls="trabajador" aria-selected="false">Empleados</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="bienes-tab" data-toggle="pill" href="#bienes" role="tab"
                    aria-controls="bienes" aria-selected="false">Bienes</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="asignacion-tab" data-toggle="pill" href="#asignacion" role="tab"
                    aria-controls="asignacion" aria-selected="false">Asignacion de bienes</a>
            </li>
        </ul>

        <div class="tab-content" id="custom-content-above-tabContent">
            <div class="tab-pane fade show active" id="solicitudes" role="tabpanel" aria-labelledby="solicitudes-tab">
                <form class="" action="{{ route('admin.solicitudes.pdf') }}">
                    <div class="row">
                        <div class="col-md-12">
                            <label class="h4 offset-4">Reportes de Solicitudes:</label>
                        </div>
                    </div>
                    <div class="row">
                        <br>
                        <div class="col-md-4 offset-2">
                            <div class="form-group">
                                <label>Desde: </label>
                                <input class="form-control mr-sm-2" name="desde" id="desde" type="date" placeholder="Search"
                                    aria-label="Search">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Hasta: </label>
                                <input class="form-control mr-sm-2" name="hasta" id="hasta" type="date" placeholder="Search"
                                    aria-label="Search">
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-4 offset-2">
                            <label for="">Estatus :</label>
                            <select class="form-control select2" name="estatus" id="estatus">
                                <option value="" selected="selected">Selecciona una opción!</option>
                                <option value="0">Anuladas</option>
                                <option value="1">Pendiente</option>
                                <option value="2">Aprobado</option>
                                <option value="3">Solicitado a compras </option>
                            </select>
                        </div>
                        <div class="col-md-4">
                            <label for="">Usuario :</label>
                            {!! Form::select('user_id', $users, null, ['class' => 'form-control selectpicker select2' . ($errors->has('user_id') ? ' is-invalid' : ''), 'placeholder' => '']) !!}
                            {!! $errors->first('user_id', ' <div class="invalid-feedback text-center"><strong>:message</strong></div>') !!}
                        </div>

                    </div>
                    <div class="form-group row">
                        <div class="col-md-8 offset-2">
                            <label for="">Departamento :</label>
                            {!! Form::select('departamento_id', $departamentos, null, ['class' => 'form-control selectpicker select2' . ($errors->has('departamento_id') ? ' is-invalid' : ''), 'placeholder' => '']) !!}
                            {!! $errors->first('departamento_id', ' <div class="invalid-feedback text-center"><strong>:message</strong></div>') !!}
                        </div>

                    </div>

                    <button target="_blank"
                        class="btn elevation-2 my-2 my-sm-0 bg-navy btn-md rounded btn-block col-md-8 offset-2"
                        title="Generar reporte" type="submit">BUSCAR </button>
                </form>
            </div>
            <div class="tab-pane fade" id="ingresos" role="tabpanel" aria-labelledby="ingresos-tab">
                <div class="row">
                    <div class="col-md-12">
                        <label class="h4 offset-4">Reportes de ingresos:</label>
                    </div>
                </div>
                <form class="" action="{{ route('admin.ingresos.pdf') }}">
                    <div class="row">
                        <br>
                        <div class="col-md-4 offset-2">
                            <div class="form-group">
                                <label>Desde: </label>
                                <input class="form-control mr-sm-2" name="desde" id="desde" type="date" placeholder="Search"
                                    aria-label="Search" required>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Hasta: </label>
                                <input class="form-control mr-sm-2" name="hasta" id="hasta" type="date" placeholder="Search"
                                    aria-label="Search" required>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-4 offset-2">
                            <label for="">Estatus :</label>
                            <select class="form-control select2" name="estatus" id="estatus">
                                <option value="" selected="selected">Selecciona una opción!</option>
                                <option value="0">Anuladas</option>
                                <option value="1">Procesado</option>
                            </select>
                        </div>
                        <div class="col-md-4">
                            <label for="">Responsable :</label>
                            {!! Form::select('correlativo', $users, null, ['class' => 'form-control selectpicker select2' . ($errors->has('correlativo') ? ' is-invalid' : ''), 'placeholder' => '']) !!}
                            {!! $errors->first('correlativo', ' <div class="invalid-feedback text-center"><strong>:message</strong></div>') !!}
                        </div>

                    </div>

                    <button target="_blank"
                        class="btn elevation-2 my-2 my-sm-0 bg-navy btn-md rounded btn-block col-md-8 offset-2"
                        title="Generar reporte" type="submit">BUSCAR </button>
                </form>
            </div>
            <div class="tab-pane fade" id="egresos" role="tabpanel" aria-labelledby="egresos-tab">
                <div class="row">
                    <div class="col-md-12">
                        <label class="h4 offset-4">Reportes de egresos:</label>
                    </div>
                </div>
                <form class="" action="{{ route('admin.egresos.pdf') }}">
                    <div class="row">
                        <br>
                        <div class="col-md-4 offset-2">
                            <div class="form-group">
                                <label>Desde: </label>
                                <input class="form-control mr-sm-2" name="desde" id="desde" type="date" placeholder="Search"
                                    aria-label="Search">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Hasta: </label>
                                <input class="form-control mr-sm-2" name="hasta" id="hasta" type="date" placeholder="Search"
                                    aria-label="Search">
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">

                        <div class="col-md-4 offset-2">
                            <label for="">Usuario :</label>
                            {!! Form::select('user_id', $users, null, ['class' => 'form-control selectpicker select2' . ($errors->has('user_id') ? ' is-invalid' : ''), 'placeholder' => '']) !!}
                            {!! $errors->first('user_id', ' <div class="invalid-feedback text-center"><strong>:message</strong></div>') !!}
                        </div>
                        <div class="col-md-4">
                            <label for="">Solicitante :</label>
                            {!! Form::select('empleado_id', $empleados, null, ['class' => 'form-control selectpicker select2' . ($errors->has('empleado_id') ? ' is-invalid' : ''), 'placeholder' => '']) !!}
                            {!! $errors->first('empleado_id', ' <div class="invalid-feedback text-center"><strong>:message</strong></div>') !!}
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-8 offset-2">
                            <label for="">Estatus :</label>
                            <select class="form-control select2" name="estatus" id="estatus">
                                <option value="" selected="selected">Selecciona una opción!</option>
                                <option value="0">Anuladas</option>
                                <option value="1">Procesado</option>
                            </select>
                        </div>


                    </div>

                    <button target="_blank"
                        class="btn elevation-2 my-2 my-sm-0 bg-navy btn-md rounded btn-block col-md-8 offset-2"
                        title="Generar reporte" type="submit">BUSCAR </button>
                </form>
            </div>
            <div class="tab-pane fade" id="requisicion" role="tabpanel"
                aria-labelledby="requisicion-tab">
                <div class="row">
                    <div class="col-md-12">
                        <label class="h4 offset-4">Report de requisiciones :</label>
                    </div>
                </div>
                <form class="" action="{{ route('admin.requisiciones.pdf') }}">
                    <div class="row">
                        <br>
                        <div class="col-md-4 offset-2">
                            <div class="form-group">
                                <label>Desde: </label>
                                <input class="form-control mr-sm-2" name="desde" id="desde" type="date" placeholder="Search"
                                    aria-label="Search">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Hasta: </label>
                                <input class="form-control mr-sm-2" name="hasta" id="hasta" type="date" placeholder="Search"
                                    aria-label="Search">
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-4 offset-2">
                            <label for="">Usuario :</label>
                            {!! Form::select('user_id', $users, null, ['class' => 'form-control selectpicker select2' . ($errors->has('user_id') ? ' is-invalid' : ''), 'placeholder' => '']) !!}
                            {!! $errors->first('user_id', ' <div class="invalid-feedback text-center"><strong>:message</strong></div>') !!}
                        </div>
                        <div class="col-md-4">
                            <label for="">Solicitante :</label>
                            {!! Form::select('empleado_id', $empleados, null, ['class' => 'form-control selectpicker select2' . ($errors->has('empleado_id') ? ' is-invalid' : ''), 'placeholder' => '']) !!}
                            {!! $errors->first('empleado_id', ' <div class="invalid-feedback text-center"><strong>:message</strong></div>') !!}
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-8 offset-2">
                            <label for="">Estatus :</label>
                            <select class="form-control select2" name="estatus" id="estatus">
                                <option value="" selected="selected">Selecciona una opción!</option>
                                <option value="0">Anuladas</option>
                                <option value="1">Peniente</option>
                                <option value="2">Aprobado</option>
                                <option value="3">Solicitados a compra</option>
                            </select>
                        </div>
                    </div>
                    <button target="_blank"
                        class="btn elevation-2 my-2 my-sm-0 bg-navy btn-md rounded btn-block col-md-8 offset-2"
                        title="Generar reporte" type="submit">BUSCAR </button>
                </form>
            </div>
            <div class="tab-pane fade" id="inventario" role="tabpanel" aria-labelledby="inventario-tab">
                <div class="row">
                    <div class="col-md-12">
                        <label class="h4 offset-4">Reportes de inventario :</label>
                    </div>
                </div>
                <form class="" action="{{ route('admin.inventarios.pdf') }}">
                    
                    <div class="form-group row">
                        <div class="col-md-4 offset-2">
                            <label for="">Clasificación :</label>
                            {!! Form::select('clacificacion_id', $clacificaciones, null, ['class' => 'form-control selectpicker select2' . ($errors->has('clacificacion_id') ? ' is-invalid' : ''), 'placeholder' => '']) !!}
                            {!! $errors->first('clacificacion_id', ' <div class="invalid-feedback text-center"><strong>:message</strong></div>') !!}
                        </div>
                        <div class="col-md-4">
                            <label for="">Ubicación :</label>
                            {!! Form::select('ubicacion', $ubicacions, null, ['class' => 'form-control selectpicker select2' . ($errors->has('ubicacion') ? ' is-invalid' : ''), 'placeholder' => '']) !!}
                            {!! $errors->first('ubicacion', ' <div class="invalid-feedback text-center"><strong>:message</strong></div>') !!}
                        </div>
                    </div>
                    <button target="_blank"
                        class="btn elevation-2 my-2 my-sm-0 bg-navy btn-md rounded btn-block col-md-8 offset-2"
                        title="Generar reporte" type="submit">BUSCAR </button>
                </form>
            </div>
            <div class="tab-pane fade" id="trabajador" role="tabpanel" aria-labelledby="trabajador-tab">
                <div class="row">
                    <div class="col-md-12">
                        <label class="h4 offset-4">Reporte de Empleados:</label>
                    </div>
                </div>
                <form class="" action="{{ route('admin.trabajadors.pdf') }}">
                    <div class="form-group row">
                        <div class="col-md-4 offset-2">
                            <label for="">Departamento :</label>
                            {!! Form::select('departamento_id', $departamentos, null, ['class' => 'form-control selectpicker select2' . ($errors->has('departamento_id') ? ' is-invalid' : ''), 'placeholder' => '']) !!}
                            {!! $errors->first('departamento_id', ' <div class="invalid-feedback text-center"><strong>:message</strong></div>') !!}
                        </div>
                        <div class="col-md-4">
                            <label for="">Cargo :</label>
                            {!! Form::select('cargo_id', $cargos, null, ['class' => 'form-control selectpicker select2' . ($errors->has('cargo_id') ? ' is-invalid' : ''), 'placeholder' => '']) !!}
                            {!! $errors->first('cargo_id', ' <div class="invalid-feedback text-center"><strong>:message</strong></div>') !!}
                        </div>
                    </div>
                    <button target="_blank"
                        class="btn elevation-2 my-2 my-sm-0 bg-navy btn-md rounded btn-block col-md-8 offset-2"
                        title="Generar reporte" type="submit">BUSCAR </button>
                </form>
            </div>
            <div class="tab-pane fade" id="bienes" role="tabpanel" aria-labelledby="bienes-tab">
                <div class="row">
                    <div class="col-md-12">
                        <label class="h4 offset-4">Reportes de bienes:</label>
                    </div>
                </div>
                <form class="" action="{{ route('admin.biennacionals.pdf') }}">
                    <div class="row">
                        <br>
                        <div class="col-md-4 offset-2">
                            <div class="form-group">
                                <label>Adquirido desde: </label>
                                <input class="form-control mr-sm-2" name="desde" id="desde" type="date" placeholder="Search"
                                    aria-label="Search">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Hasta: </label>
                                <input class="form-control mr-sm-2" name="hasta" id="hasta" type="date" placeholder="Search"
                                    aria-label="Search">
                            </div>
                        </div>
                    </div>
                    <button target="_blank"
                        class="btn elevation-2 my-2 my-sm-0 bg-navy btn-md rounded btn-block col-md-8 offset-2"
                        title="Generar reporte" type="submit">BUSCAR </button>
                </form>
            </div>
            <div class="tab-pane fade" id="asignacion" role="tabpanel" aria-labelledby="asignacion-tab">
                <div class="row">
                    <div class="col-md-12">
                        <label class="h4 offset-4">Reportes de asignacion de bienes:</label>
                    </div>
                </div>
                <form class="" action="{{ route('admin.asignacions.pdf') }}">
                    <div class="form-group row">

                        <div class="col-md-4 offset-2">
                            <label for="">Usuario responsable :</label>
                            {!! Form::select('user_id', $users, null, ['class' => 'form-control selectpicker select2' . ($errors->has('user_id') ? ' is-invalid' : ''), 'placeholder' => '']) !!}
                            {!! $errors->first('user_id', ' <div class="invalid-feedback text-center"><strong>:message</strong></div>') !!}
                        </div>
                        <div class="col-md-4">
                            <label for="">Asignado a :</label>
                            {!! Form::select('empleado_id', $empleados, null, ['class' => 'form-control selectpicker select2' . ($errors->has('empleado_id') ? ' is-invalid' : ''), 'placeholder' => '']) !!}
                            {!! $errors->first('empleado_id', ' <div class="invalid-feedback text-center"><strong>:message</strong></div>') !!}
                        </div>
                    </div>
                    
                    <div class="form-group row">
                        <div class="col-md-8 offset-2">
                            <label for="">Bien nacional :</label>
                            {!! Form::select('biennacional_id', $biennacionals, null, ['class' => 'form-control selectpicker select2' . ($errors->has('biennacional_id') ? ' is-invalid' : ''), 'placeholder' => '']) !!}
                            {!! $errors->first('biennacional_id', ' <div class="invalid-feedback text-center"><strong>:message</strong></div>') !!}
                        </div>
                    </div>
                    <button target="_blank"
                        class="btn elevation-2 my-2 my-sm-0 bg-navy btn-md rounded btn-block col-md-8 offset-2"
                        title="Generar reporte" type="submit">BUSCAR </button>
                </form>
            </div>
        </div>
    </x-card-body>

@stop

@section('footer')
    <x-footer></x-footer>
@stop



@section('js')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script src=" {{ asset('vendor/select2/select2.full.min.js') }}"></script>

    <script>
        Livewire.on('alert', function($message) {
            Swal.fire(
                'Buen Trabajo!',
                $message,
                'success'
            )
        })

        $('.select2').select2({
            placeholder: 'Selecciona una opción'
        });
    </script>
@stop




@section('css')
    <link rel="stylesheet" href="{{ asset('vendor/select2/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/select2/select2-bootstrap4.min.css') }}">
    <style>
        .card-custom {
            overflow: hidden;
            min-height: 300px;
            box-shadow: 0 0 15px rgba(10, 10, 10, 0.3);
        }

        .card-custom-img {
            height: 50px;
            min-height: 10px;
            background-repeat: no-repeat;
            background-size: cover;
            background-position: center;
            border-color: inherit;
        }

        /* First border-left-width setting is a fallback */
        .card-custom-img::after {
            position: absolute;
            content: '';
            top: 161px;
            left: 0;
            width: 0;
            height: 0;
            border-style: solid;
            border-top-width: 40px;
            border-right-width: 0;
            border-bottom-width: 0;
            border-left-width: 545px;
            border-left-width: calc(575px - 5vw);
            border-top-color: transparent;
            border-right-color: transparent;
            border-bottom-color: transparent;
            border-left-color: inherit;
        }

        .card-custom-avatar img {
            border-radius: 50%;
            box-shadow: 0 0 15px rgba(10, 10, 10, 0.3);
            position: absolute;
            top: 10px;
            left: 1.25rem;
            width: 50px;
            height: 50px;
        }

    </style>
@stop
