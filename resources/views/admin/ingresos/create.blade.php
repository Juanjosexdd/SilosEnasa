@extends('adminlte::page')

@section('title', 'ENASA | CREAR NUEVO INGRESO')


@section('content')
    @include('sweetalert::alert')
    <x-card-header>
        <h3 class="text-white">Ingreso de productos al almacen</h3>
    </x-card-header>

    <x-card-body>

        {!! Form::open(['route' => 'admin.ingresos.store', 'autocomplete' => 'off', 'class' => 'confirmar']) !!}
        <div class="row">
            <div class="col-md-4">
                {!! Form::label('proveedor_id', 'Proveedor : ', ['class' => 'text-blue']) !!}
                <div class="input-group">
                    {!! Form::select('proveedor_id', $proveedors, null, ['class' => 'form-control  select2' . ($errors->has('proveedor_id') ? ' is-invalid' : ''), 'placeholder' => '']) !!}
                    {!! $errors->first('proveedor_id', ' <div class="invalid-feedback text-center"><strong>:message</strong></div>') !!}
                </div>
            </div>
            {{-- <div class="col-md-5">
                <label class="text-blue" for="nombre">Requisición nro. :</label>
                <select class="form-control select2" name="requisicion_id" id="requisicion_id" data-live-search="true"
                    required>
                    <option class="text-muted" value="0">Selecciona una opción</option>
                    @foreach ($requisicions as $requisicion)
                        <option value="{{ $requisicion->id }}">{{ $requisicion->correlativo }} - {{ $requisicion->departamento }}
                        </option>
                    @endforeach
                </select>
            </div> --}}
            <div class="col-md-4">
                <label class="text-blue" for="requisicion_id">Requisición nro. :</label>
                <select class="form-control select2" name="requisicion_id" id="requisicion_id">
                    <option class="text-muted" value="0">Selecciona una opción</option>
                    @foreach ($requisicions as $requisicion)
                        <option value="{{ $requisicion->id }}">{{ $requisicion->correlativo }} - {{$requisicion->empleado->departamento->nombre}}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-2">
                <div class="form-group">
                    {!! Form::label('correlativo', 'Correlativo : ', ['class' => 'text-blue ']) !!}
                    <div class="input-group">
                        @if (count($ingresos) == 0)
                            <input type="number" value="" class="form-control prevenir-envio" name="correlativo"
                                id="correlativo">
                            {!! $errors->first('correlativo', ' <div class="invalid-feedback text-center"><strong>:message</strong></div>') !!}
                        @else
                            <input type="number" value="{{ number_format($ingresos->last()->correlativo + 1, 0, '', '') }}"
                                class="form-control prevenir-envio" name="correlativo" id="correlativo">
                        @endif
                    </div>
                </div>
            </div>
            <div class="col-md-2">
                {!! Form::label('fecha_original', 'Fecha Org. : ', ['class' => 'text-blue ']) !!}
                <div class="form-group">
                    <input class="form-control mr-sm-2" name="fecha_original" id="fecha_original" type="date" placeholder="Search"
                        aria-label="Search">
                </div>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-md-3">
                <label class="text-blue" for="pproducto_id">Producto :</label>
                <select class="form-control  selectpicker select2" name="pproducto_id" id="pproducto_id"
                    data-live-search="true">
                    <option value="0">Seleccione una opción</option>
                    @foreach ($productos as $prod)
                        <option
                            value="{{ $prod->id }}_{{ $prod->marca }}_{{ $prod->observacionp }}_{{ $prod->ubicacion }}">
                            {{ $prod->abreviado }}{{ $prod->id }} - {{ $prod->nombre }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-3">
                <label class="text-blue" for="pproducto_id">Marca :</label>
                <input type="text" id="marca" name="marca" class="form-control prevenir-envio" placeholder="">
            </div>
            <div class="col-md-3">
                {!! Form::label('palmacen_id', 'Almacen : ', ['class' => 'text-blue']) !!}
                <div class="input-group">
                    {!! Form::select('palmacen_id', $almacens, null, ['class' => 'form-control select2', 'placeholder' => '']) !!}
                </div>
            </div>
            <div class="col-md-3">
                <label class="form-control-label text-blue" for="tipomovimiento_id">Tipo Movimiento :</label>
                <select class="form-control selectpicker" disabled name="tipomovimiento_id" id="tipomovimiento_id"
                    data-live-search="true" required>
                    <option value="1" selected>Ingreso al almacen</option>
                </select>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    {!! Form::label('pobservacionp', 'Observacion del Producto: ', ['class' => 'text-blue ']) !!}
                    <div class="input-group mb-3">
                        {!! Form::text('pobservacionp', null, ['class' => 'form-control prevenir-envio', 'placeholder' => 'Observacion']) !!}
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    {!! Form::label('pubicacion', 'Ubicación del Producto: ', ['class' => 'text-blue ']) !!}
                    <div class="input-group mb-3">
                        {!! Form::text('pubicacion', null, ['class' => 'form-control prevenir-envio', 'placeholder' => 'Ubicación']) !!}
                    </div>
                </div>
            </div>

            <div class="col-md-2">
                <div class="form-group">
                    {!! Form::label('pcantidad', 'Cantidad :', ['class' => 'text-blue ']) !!}
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
                        <th class="text-white">Almacén</th>
                        <th class="text-white">Ubicación</th>
                        <th class="text-white">Observación</th>
                        <th class="text-white">marca</th>
                    </thead>
                    <tfoot>
                        <th></th>
                        <th></th>
                        <th class="col-1"></th>
                        <th></th>
                        <th class="col-1"></th>
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
                {!! Form::submit('Guardar', ['class' => 'btn bg-navy btn-block elevation-4 ']) !!}
                <button type="reset" class="btn btn-danger btn-block elevation-4">Cancelar</button>

            </div>
        </div>
        {!! Form::close() !!}
        </div>
        </div>
        </div>

    </x-card-body>
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
    <script src=" {{ asset('vendor/sweetalert-estatus.js') }} "></script>
    <script src=" {{ asset('vendor/sweetalert-estatus2.js') }} "></script>
    <script src=" {{ asset('vendor/sweetalert-anular.js') }} "></script>
    <script src=" {{ asset('vendor/sweetalert-confirmar.js') }} "></script>


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
        $("#pproducto_id").change(mostrarValores);

        function mostrarValores() {
            datosProducto = document.getElementById('pproducto_id').value.split('_');
            $("#marca").val(datosProducto[1]);
            $("#pobservacionp").val(datosProducto[2]);
            $("#pubicacion").val(datosProducto[3]);

        }



        function agregar() {
            datosProducto = document.getElementById('pproducto_id').value.split('_');

            // producto_id = $("#pproducto_id").val();
            producto_id = datosProducto[0];

            marca = $("#marca").val();
            ubicacion = $("#pubicacion").val();
            producto = $("#pproducto_id option:selected").text();
            almacen = $("#palmacen_id option:selected").text();
            cantidad = $("#pcantidad").val();
            observacionp = $("#pobservacionp").val();
            almacen_id = $("#palmacen_id").val();

            if (producto_id != "" && cantidad > 0 && almacen_id != "") {
                var fila = '<tr class="selected" id="fila' + cont +
                    '"><td><button type="button" class="btn btn-warning btn-sm" onclick="eliminar(' + cont +
                    ');">X</button></td><td><input type="hidden"  name="producto_id[]" value="' + producto_id + '">' +
                    producto +
                    '</td><td><input type="number" class="form-control form-control-sm" name="cantidad[]" value="' +
                    cantidad +
                    '"></td><td><input type="hidden" name="almacen_id[]" value="' + almacen_id + '">' + almacen +
                    '</td><td><input type="text" class="form-control form-control-sm" name="ubicacion[]" value="' +
                    ubicacion +
                    '"></td><td><input type="text" class="form-control form-control-sm" name="observacionp[]" value="' +
                    observacionp +
                    '"></td><td><input type="text" class="form-control form-control-sm" name="marca[]" value="' +
                    marca +
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
            $("#pobservacionp").val(" ");
            $("#pubicacion").val(" ");
            $("#pcantidad").val("");
            $("#marca").val("");
        }

        function eliminar(index) {
            $("#fila" + index).remove();
            evaluar();
        }
    </script>
@stop
