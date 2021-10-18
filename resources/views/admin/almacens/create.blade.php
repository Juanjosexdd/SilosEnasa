@extends('adminlte::page')

@section('title', 'ENASA | CREAR NUEVO ALMACEN')

@section('content')
    @include('sweetalert::alert')

    <x-card-header>
        <h3 class="text-white">Crear un nuevo almacen</h3>
    </x-card-header>

    <x-card-body>
        {!! Form::open(['route' => 'admin.almacens.store']) !!}
        @include('admin.almacens.partials.form')
        {!! Form::submit('Guardar almacen', ['class' => 'btn bg-navy btn-block']) !!}
        {!! Form::close() !!}
    </x-card-body>

@stop

@section('footer')
    <x-footer></x-footer>
@stop

@section('js')
    <script src="{{ asset('vendor/sweetalert2.js') }}  "></script>
    <script src="{{ asset('vendor/sweetalert-eliminar.js') }} "></script>
    <script src="{{ asset('vendor/sweetalert-estatus.js') }} "></script>
@stop
