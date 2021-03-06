@extends('adminlte::page')

@section('title', 'ENASA | NUEVA REQUISICIÓN')


@section('content')
    @include('sweetalert::alert')
    <x-card-header>
        <h3 class="text-white">Registrar nueva requisición</h3>
    </x-card-header>

    <div class="container">

        <div class="card card-custom bg-white border-white border-0 elevation-5">
            <div class="card-body" style="overflow-y: auto">
                {!! Form::open(['route' => 'admin.requisicions.store', 'autocomplete' => 'off', 'class' => 'confirmar']) !!}
                <div class="row">
                    {{-- <div class="col-md-4">
                        {!! Form::label('departamento_id', 'Unidad solicitante : ', ['class' => 'text-blue']) !!}
                        <div class="input-group">
                            {!! Form::select('departamento_id', $departamentos, null, ['class' => 'form-control select2'. ($errors->has('departamento_id') ? ' is-invalid' : ''), 'placeholder' => '']) !!}
                            {!! $errors->first('departamento_id', ' <div class="invalid-feedback text-center"><strong>:message</strong></div>') !!}

                        </div>
                    </div> --}}
                    <!-- <div class="col-md-4">
                        {!! Form::label('empleado_id', 'Trabajador solicitante : ', ['class' => 'text-blue']) !!}
                        <div class="input-group">
                            {!! Form::select('empleado_id', $empleados, null, ['class' => 'form-control selectpicker select2'. ($errors->has('empleado_id') ? ' is-invalid' : ''), 'placeholder' => '']) !!}
                            {!! $errors->first('empleado_id', ' <div class="invalid-feedback text-center"><strong>:message</strong></div>') !!}
                        </div>
                    </div> -->
                    <!-- <div class="col-md-4">
                        <label class="text-blue" for="nombre">Solicitud nro. :</label>
                        <select class="form-control select2" name="solicitud_id" id="solicitud_id" data-live-search="true"
                            required>
                            <option class="text-muted" value="0">Selecciona una opción</option>
                            @foreach ($solicituds as $solicitud)
                                <option value="{{ $solicitud->id }}">{{$solicitud->id}} - {{ $solicitud->departamento }}</option>
                            @endforeach
                        </select>
                    </div> -->
                    <div class="col-md-8">
                        {!! Form::label('solicitud_id', 'Solicitud nro. :', ['class' => 'text-blue ']) !!}
                        <select class="form-control select2" name="solicitud_id" id="solicitud_id" data-live-search="true"
                            required>
                            <option class="text-muted" value="0">Selecciona una opción</option> 
                            @foreach ($solicituds as $solicitud)
                                <option value="{{ $solicitud->id }}">Nro.: {{ $solicitud->id }} -
                                    {{ $solicitud->departamento }}  Solicitado por : {{ $solicitud->cedula . " - " . $solicitud->nombre . " - " . $solicitud->apellido }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            {!! Form::label('correlativo', 'Correlativo : ', ['class' => 'text-blue ']) !!}
                            <div class="input-group">

                                @if (count($requisicions) == 0)
                                    <input type="number" value="" class="form-control prevenir-envio" name="correlativo" id="correlativo">
                                @else
                                    <input type="number"
                                        value="{{ number_format($requisicions->last()->correlativo + 1, 0, '', '') }}"
                                        class="form-control prevenir-envio" name="correlativo" id="correlativo">
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <label class="text-blue">Responsable :</label>
                        <input type="text" class="form-control"
                            value="{{ Auth::user()->name . ' ' . Auth::user()->last_name }}" disabled>
                    </div>
                </div>
                <div class="row">
                <div class="col-md-4">
                        {!! Form::label('empleado_id', 'Trabajador solicitante : ', ['class' => 'text-blue']) !!}
                        <div class="input-group">
                            {!! Form::select('empleado_id', $empleados, null, ['class' => 'form-control selectpicker select2'. ($errors->has('empleado_id') ? ' is-invalid' : ''), 'placeholder' => '']) !!}
                            {!! $errors->first('empleado_id', ' <div class="invalid-feedback text-center"><strong>:message</strong></div>') !!}
                        </div>
                    </div>
                    
                    <div class="col-md-3">
                        {!! Form::label('pproducto_id', 'Productos : ', ['class' => 'text-blue']) !!}
                        <div class="input-group">
                            {!! Form::select('pproducto_id', $productos, null, ['class' => 'form-control selectpicker select2', 'placeholder' => '']) !!}
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            {!! Form::label('pobservacionp', 'Observacion del Producto: ', ['class' => 'text-blue ']) !!}
                            <div class="input-group mb-3">
                                {!! Form::text('pobservacionp', null, ['class' => 'form-control prevenir-envio', 'placeholder' => 'Observacion']) !!}
                            </div>
                        </div>
                    </div>
                    <div class="col-md-1">
                        <div class="form-group">
                            {!! Form::label('pcantidad', 'Cantidad ', ['class' => 'text-blue ']) !!}
                            <div class="input-group mb-3">
                                {!! Form::number('pcantidad', null, ['class' => 'form-control prevenir-envio', 'placeholder' => 'Cantidad']) !!}
                            </div>
                        </div>
                    </div>
                    <div class="col-md-1">
                        {!! Form::label('&nbsp;&nbsp;', 'Agregar ', ['class' => 'text-blue ']) !!}
                        <button type="button" id="bt_add" class="btn bg-navy elevation-4"><i
                                class="fas fa-plus mt-1 px-3"></i></button>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <table id="detalles" class="table table-striped table-sm table-hover">
                            <thead style="background-color: #001f3f; border-radius: 0.25 rem;" class="p-0" ;>
                                <th class="text-white"></th>
                                <th class="text-white">Producto</th>
                                <th class="text-white">Cantidad</th>
                                <th class="text-white">Observación</th>
                            </thead>
                            <tfoot>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th></th>
                            </tfoot>
                        </table>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            {!! Form::label('observacion', 'Observación : ', ['class' => 'text-blue']) !!}
                            {!! Form::textarea('observacion', null, ['class' => 'form-control', 'rows' => '2']) !!}
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 guardar" id="guardar">
                        {!! Form::submit('Guardar', ['class' => 'btn bg-navy btn-block elevation-4']) !!}
                        <button type="reset" class="btn btn-danger btn-block elevation-4">Cancelar</button>

                    </div>
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>


@stop

@section('footer')
    <x-footer></x-footer>
@stop

@section('css')
    <link rel="stylesheet" href="{{ asset('vendor/select2/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/select2/select2-bootstrap4.min.css') }}">
@stop


@section('js')
    <script src=" {{ asset('vendor/select2/select2.full.min.js') }}"></script>
    <script src=" {{ asset('vendor/sweetalert2.js') }}  "></script>
    <script src=" {{ asset('vendor/sweetalert-eliminar.js') }} "></script>
    <script src=" {{ asset('vendor/sweetalert-confirmar.js') }} "></script>
    <script src=" {{ asset('vendor/sweetalert-estatus.js') }} "></script>
    <script src=" {{ asset('vendor/sweetalert-estatus2.js') }} "></script>

    <script>
        const $elementos = document.querySelectorAll(".prevenir-envio");

        $elementos.forEach(elemento => {
            elemento.addEventListener("keydown", (evento) => {
                if (evento.key == "Enter") {
                    // Prevenir
                    evento.preventDefault();
                    return false;
                }
            });
        });
        //////////////////////////////////////////////
        $('.select2').select2({
            placeholder: 'Selecciona una opción'
        });

        $(document).ready(function() {
            $('#bt_add').click(function() {
                agregar();
            });
        });

        var cont = 0;
        $("#guardar").hide();



        function agregar() {
            producto_id = $("#pproducto_id").val();
            producto = $("#pproducto_id option:selected").text();
            cantidad = $("#pcantidad").val();
            observacionp = $("#pobservacionp").val();

            if (producto_id != "" && cantidad > 0) {
                var fila = '<tr class="selected" id="fila' + cont +
                    '"><td><button type="button" class="btn btn-warning btn-sm" onclick="eliminar(' + cont +
                    ');">X</button></td><td><input type="hidden" name="producto_id[]" value="' + producto_id + '">' +
                    producto +
                    '</td><td><input type="number" class="form-control form-control-sm" name="cantidad[]" value="' +
                    cantidad +
                    '"></td><td><input type="text" class="form-control form-control-sm" name="observacionp[]" value="' +
                    observacionp +
                    '"></td></tr>';
                cont++;
                limpiar();
                $('#detalles').append(fila);
                evaluar(cont);
            } else {
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Debes agregar informacion completa en el encabezado',
                })
            }
        }

        function evaluar(cont) {
            if (cont > 0) {
                $("#guardar").show();
            } else {
                $("#guardar").hide();
            }
        }

        function limpiar() {
            $("#pproducto_id").val(" ");
            $("#pcantidad").val("");
            $("#pobservacionp").val("");
        }

        function eliminar(index) {
            $("#fila" + index).remove();
            evaluar();
        }
    </script>
@stop
