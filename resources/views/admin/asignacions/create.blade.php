@extends('adminlte::page')

@section('title', 'ENASA | NUEVA ASIGNACION')


@section('content')
    @include('sweetalert::alert')
    <x-card-header>
        <h3 class="text-white">Registrar nueva asignacion</h3>
        </div>
    </x-card-header>

    <div class="container m-2">

        <div class="card card-custom bg-white border-white border-0 elevation-5">
            <div class="card-body" style="overflow-y: auto">
                {!! Form::open(['route' => 'admin.asignacions.store', 'autocomplete' => 'off', 'class' => 'confirmar']) !!}
                <div class="row">
                    <div class="col-md-6">
                        {!! Form::label('bienesnacionales_id', 'Bien a asignar : ', ['class' => 'text-blue']) !!}
                        <div class="input-group">
                            {!! Form::select('bienesnacionales_id', $biennacionals, null, ['class' => 'form-control selectpicker select2' . ($errors->has('bienesnacionales_id') ? ' is-invalid' : ''), 'data-live-search' => 'true', 'placeholder' => '']) !!}
                            {!! $errors->first('bienesnacionales_id', ' <div class="invalid-feedback text-center"><strong>:message</strong></div>') !!}
                        </div>
                    </div>
                    <div class="col-md-6">
                        {!! Form::label('empleado_id', 'Trabajador solicitante : ', ['class' => 'text-blue']) !!}
                        <div class="input-group">
                            {!! Form::select('empleado_id', $empleados, null, ['class' => 'form-control selectpicker select2' . ($errors->has('empleado_id') ? ' is-invalid' : ''), 'data-live-search' => 'true', 'placeholder' => '']) !!}
                            {!! $errors->first('empleado_id', ' <div class="invalid-feedback text-center"><strong>:message</strong></div>') !!}
                        </div>
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
                <input type="hidden" name="user_id" id="user_id" value="{{auth()->user()->id}}">

                <div class="row">
                    <div class="col-md-12">
                        {{-- <input name="_token" value="{{ csrf_token() }}" type="hidden"> --}}
                        {!! Form::submit('Guardar', ['class' => 'btn bg-navy btn-block elevation-4']) !!}
                        <a href="{{ route('admin.asignacions.index') }}"
                            class="btn btn-danger btn-block elevation-4">Cancelar</a>
                        {{-- {!! Form::reset('Cancelar', ['class' => 'btn btn-danger btn-block elevation-4']) !!} --}}

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
    <script src="{{ asset('vendor/select2/select2.full.min.js') }}"></script>
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
            placeholder: 'Selecciona una opcion'
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

        // function evaluar(cont) {
        //     if (cont > 0) {
        //         $("#guardar").show();
        //     } else {
        //         $("#guardar").hide();
        //     }
        // }

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
