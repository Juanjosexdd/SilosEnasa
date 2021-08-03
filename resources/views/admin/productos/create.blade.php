@extends('adminlte::page')

@section('title', 'ENASA | CREAR NUEVO PRODUCTO')

@section('content')
    @include('sweetalert::alert')

    <x-card-header>
        <h3 class="text-white">Registrar un nuevo producto</h3>
    </x-card-header>

    <x-card-body>

        {!! Form::open(['route' => 'admin.productos.store']) !!}
        <a href=" {{ route('admin.productos.index') }} " class="float-right btn bg-navy btn-sm px-3 py-2 elevation-4"><i
                class="fas fa-reply"></i> Volver</a>
        <p class="h3 text-blue">Producto</p>
        <hr>
        @include('admin.productos.partials.form')
        {!! Form::submit('Guardar producto', ['class' => 'btn bg-navy btn-block']) !!}
        {!! Form::close() !!}
    </x-card-body>
@stop

@section('footer')
    <x-footer></x-footer>
@stop
