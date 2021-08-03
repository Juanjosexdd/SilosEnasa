@extends('adminlte::page')

@section('title', 'ENASA | EDITAR PRODUCTO')


@section('content')
    @include('sweetalert::alert')
    <x-card-header>
        <h3 class="text-white">Editar {{ $producto->nombre }}</h3>
    </x-card-header>

    <x-card-body>
        <a href=" {{ route('admin.productos.index') }} " class="float-right btn bg-navy btn-sm px-3 py-2 elevation-4"><i
                class="fas fa-reply"></i> Volver</a>
        <p class="h3 text-blue">Producto</p>
        <hr>
        {!! Form::model($producto, ['route' => ['admin.productos.update', $producto], 'method' => 'PUT', 'autocomplete' => 'off']) !!}
        @include('admin.productos.partials.form')
        {!! Form::submit('Guardar producto', ['class' => 'btn bg-navy btn-block']) !!}
        {!! Form::close() !!}
    </x-card-body>

@stop

@section('footer')
    <x-footer></x-footer>  
@stop

@section('js')
    <script src="{{ asset('vendor/sweetalert2.js') }}  "></script>
    <script src=" {{ asset('vendor/sweetalert-eliminar.js') }} "></script>
    <script src=" {{ asset('vendor/sweetalert-estatus.js') }} "></script>
@stop
