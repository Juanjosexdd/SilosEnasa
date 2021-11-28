@extends('adminlte::page')

@section('title', 'ENASA | CREAR NUEVA CLASIFICACIÓN')


@section('content')
    @include('sweetalert::alert')

    <x-card-header>
        <h3 class="text-white">Crear una nueva clasificacion de bienes</h3>
    </x-card-header>

    <x-card-body>
        {!! Form::open(['route' => 'admin.clacificacionbienes.store']) !!}
        @include('admin.clacificacionbienes.partials.form')
        {!! Form::submit('Guardar clasificación', ['class' => 'btn bg-navy btn-block']) !!}
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
    <script src=" {{ asset('vendor/sweetalert-estatus2.js') }} "></script>
@stop
