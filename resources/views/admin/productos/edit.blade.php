@extends('adminlte::page')

@section('title', 'ENASA | EDITAR PRODUCTO')


@section('content')
    @include('sweetalert::alert')
    <div class="container">
        <div class="card elevation-4 col-md-12 col-sm-12" style="border-radius: 0.95rem">
            <div class="card-body">
                <h3 class="text-blue">Editar {{ $producto->nombre }}</h3>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="card elevation-5 col-md-12 col-sm-12 pt-3" style="border-radius: 0.95rem" bis_skin_checked="1">
            <div class="card-body" style="overflow-y: auto">
                <a href=" {{route('admin.productos.index')}} " class="float-right btn bg-navy btn-sm px-3 py-2 elevation-4"><i class="fas fa-reply"></i>    Volver</a>
                <p class="h3 text-blue">Producto</p>
                <hr>
                {!! Form::model($producto, ['route' => ['admin.productos.update', $producto], 'method' => 'PUT', 'autocomplete' => 'off']) !!}
                @include('admin.productos.partials.form')
                {!! Form::submit('Guardar producto', ['class' => 'btn bg-navy btn-block']) !!}
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@stop

@section('footer')
    <h5 class="text-center"><a href="https://github.com/Juanjosexdd/silosenasa" target="_blank">ENASA - UPTP "JJ MONTILLA"</a></h5>
@stop

@section('js')
    <script src="{{ asset('vendor/sweetalert2.js') }}  "></script>
    <script src=" {{ asset('vendor/sweetalert-eliminar.js') }} "></script>
    <script src=" {{ asset('vendor/sweetalert-estatus.js') }} "></script>
@stop
