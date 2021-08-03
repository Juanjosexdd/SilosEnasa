@extends('adminlte::page')

@section('title', 'ENASA | EDITAR TRABAJADOR')


@section('content')
    @include('sweetalert::alert')

    <x-card-header>
        <h3 class="text-white">Editar trabajador {{ $empleado->nombres }} {{ $empleado->apellidos }}</h3>
    </x-card-header>

    <x-card-body>
        {!! Form::model($empleado, ['route' => ['admin.empleados.update', $empleado], 'method' => 'PUT', 'autocomplete' => 'off']) !!}
        @include('admin.empleados.partials.form')
        {!! Form::submit('Guardar', ['class' => 'btn bg-navy btn-block']) !!}
        {!! Form::close() !!}
    </x-card-body>  
@stop

@section('footer')
    <x-footer></x-footer>
@stop

@section('css')
    <link rel="stylesheet" href="{{ asset('vendor/cards.css') }}">
@stop

@section('js')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

    <script>
        Livewire.on('alert', function($message) {
            Swal.fire(
                'Buen Trabajo!',
                $message,
                'success'
            )
        })

    </script>
@stop
