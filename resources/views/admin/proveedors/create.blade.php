@extends('adminlte::page')

@section('title', 'ENASA | CREAR NUEVO PROVEEDOR')

@section('content')
    @include('sweetalert::alert')

    <x-card-header>
        <h3 class="text-blue">Crear un nuevo proveedor</h3>
    </x-card-header>

    <x-card-body>
        <a href=" {{ route('admin.proveedors.index') }} " class="float-right btn bg-navy btn-sm px-3 py-2 elevation-4"><i
                class="fas fa-reply"></i> Volver</a>
        <p class="h3 text-blue">Información proveedor</p>
        <hr>
        {!! Form::open(['route' => 'admin.proveedors.store']) !!}
        @include('admin.proveedors.partials.form')
        {!! Form::submit('Guardar proveedor', ['class' => 'btn bg-navy btn-block']) !!}
        {!! Form::close() !!}
    </x-card-body>

@stop

@section('footer')
    <x-footer></x-footer>
@stop
