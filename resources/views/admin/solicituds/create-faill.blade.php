@extends('adminlte::page')

@section('title', 'ENASA | CREAR NUEVO INGRESO')


@section('content')
    @include('sweetalert::alert')
    <div class="container">
        <div class="card elevation-4 col-md-12 col-sm-12" style="border-radius: 0.95rem">
            <div class="card-body">
                <h3 class="text-blue">Ingreso de productos</h3>
            </div>
        </div>
    </div>
    <div class="container">

        <div class="card card-custom card-responsive bg-white border-white border-0 elevation-5">
            <div class="card-body" style="overflow-y: auto">
                {!! Form::open(['route' => 'admin.ingresos.store']) !!}
                <div class="row">
                    <div class="col-xl-8 col-lg-8 col-md-8 col-sm-12 col-12">
                        {!! Form::label('proveedor_id', 'Proveedor : ', ['class' => 'text-blue']) !!}
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text ">
                                    <i class="fas fa-search text-blue"></i>
                                </span>
                            </div>
                            {!! Form::select('proveedor_id', $proveedors, null, ['class' => 'form-control selectpicker select2', 'data-live-search' => 'true', 'placeholder' => '']) !!}
                            
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
                        <label class="text-blue">Responsable :</label>
                        <input type="text" class="form-control"
                            value="{{ Auth::user()->name . ' ' . Auth::user()->last_name }}" disabled>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12">
                        {!! Form::label('pproducto_id', 'Productos : ', ['class' => 'text-blue']) !!}
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                    <i class="fas fa-search"></i>
                                </span>
                            </div>
                            {!! Form::select('pproducto_id', $productos, null, ['class' => 'form-control selectpicker select2', 'data-live-search' => 'true', 'placeholder' => '']) !!}
                            
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12">
                        <div>
                            {!! Form::label('palmacen_id', 'Almacen : ', ['class' => 'text-blue']) !!}
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        <i class="fas fa-search"></i>
                                    </span>
                                </div>
                                {!! Form::select('palmacen_id', $almacens, null, ['class' => 'form-control select2', 'placeholder' => '']) !!}
                                
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col-12">
                        <div class="form-group">
                            {!! Form::label('pcantidad', 'Cantidad ', ['class' => 'text-blue ']) !!}
                            <div class="input-group mb-3">
                                {!! Form::number('pcantidad', null, ['class' => 'form-control', 'placeholder' => 'Cantidad']) !!}
                            </div>
                        </div>
                    </div>
                    <div class="col-md-1 col-sm-12">
                        {!! Form::label('&nbsp;&nbsp;', 'Agregar ', ['class' => 'text-blue ']) !!}
                        <button type="button" id="bt_add" class="btn bg-navy elevation-4"><i
                                class="fas fa-plus mt-1 px-3"></i></button>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <table id="detalles" class="table table-striped table-sm table-hover">
                            <thead style="background-color: #001f3f; border-radius: 0.25 rem;" class="p-0" ;>
                                <th class="text-white">Opciones</th>
                                <th class="text-white">Producto</th>
                                <th class="text-white">Cantidad</th>
                                <th class="text-white">Almacen</th>
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
                <br>
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
                        {{-- <input name="_token" value="{{ csrf_token() }}" type="hidden"> --}}
                        {!! Form::submit('Guardar', ['class' => 'btn bg-navy btn-block elevation-4']) !!}
                        <button type="reset" class="btn btn-danger btn-block elevation-4">Cancelar</button>
                        {{-- {!! Form::reset('Cancelar', ['class' => 'btn btn-danger btn-block elevation-4']) !!} --}}

                    </div>
                </div>
                {{-- @include('admin.ingresos.partials.form') --}}
                {!! Form::close() !!}
            </div>
        </div>
    </div>





    <div class="modal fade" id="modal-lg" style="display: block; padding-right: 17px;" aria-modal="true" role="dialog">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Large Modal</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
              </button>
            </div>
            <div class="modal-body">
              <p>One fine body…</p>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button type="button" class="btn btn-primary">Save changes</button>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
@stop

@section('footer')
    <h5 class="text-center"><a href="https://github.com/Juanjosexdd/silosenasa" target="_blank">
            ENASA - UPTP "JJ MONTILLA"</a></h5>
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

    <script>
        $('.select2').select2({
            placeholder: 'Selecciona una opcion'
        });

        $(document).ready(function() {
            $('#bt_add').click(function() {
                agregar();
            });
        });

        var cont = 0;

        function evaluar() {
            if ($cont === 0) {
                $("#guardar").hide();
            } else {
                $("#guardar").show();
            }
        }


        function agregar() {
            producto_id = $("#pproducto_id").val();
            producto = $("#pproducto_id option:selected").text();
            almacen = $("#palmacen_id option:selected").text();
            cantidad = $("#pcantidad").val();
            almacen_id = $("#palmacen_id").val();

            if (producto_id != "" && cantidad > 0 && almacen_id != "") {
                var fila = '<tr class="selected" id="fila' + cont +
                    '"><td><button type="button" class="btn btn-warning btn-sm" onclick="eliminar(' + cont +
                    ');">X</button></td><td><input type="hidden"  name="producto_id[]" value="' + producto_id + '">' +
                    producto +
                    '</td><td><input type="number" class="form-control form-control-sm" name="cantidad[]" value="' +
                    cantidad +
                    '"></td><td><input type="hidden" class="form-control mr-5" name="almacen_id[]" value="' + almacen_id +
                    '">' + almacen +
                    '</td></tr>';
                cont++;
                limpiar();
                $('#detalles').append(fila);
                evaluar();
            } else {
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Debes agregar informacion completa en el encabezado',
                })
            }
        }

        function limpiar() {
            $("#pproducto_id").val("");
            $("#palmacen_id").val("");
            $("#pcantidad").val("");
        }

        function eliminar(index) {
            $("#fila" + index).remove();
        }
    </script>
@stop
