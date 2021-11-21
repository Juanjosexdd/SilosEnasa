@extends('adminlte::page')

@section('title', 'ENASA | EDITAR CLASIFICACIÓN')


@section('content')
    @include('sweetalert::alert')
    <x-card-header>
        <h3 class="text-white">Editar clasificacion {{ $clacificacion->nombre }}</h3>
    </x-card-header>

    <x-card-body>
        {!! Form::model($clacificacion, ['route' => ['admin.clacificacions.update', $clacificacion], 'method' => 'PUT', 'autocomplete' => 'off']) !!}
        @include('admin.clacificacions.partials.form')
        {!! Form::submit('Guardar clacificación', ['class' => 'btn bg-navy btn-block']) !!}
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
