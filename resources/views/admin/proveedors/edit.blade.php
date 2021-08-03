@extends('adminlte::page')

@section('title', 'ENASA | EDITAR PROVEEDOR')

@section('content')
    @include('sweetalert::alert')

    <x-card-header>
        <h3 class="text-white">Editar proveedor {{ $proveedor->nombre }} </h3>
    </x-card-header>

    <x-card-body>
        <a href=" {{ route('admin.proveedors.index') }} " class="float-right btn bg-navy btn-sm px-3 py-2 elevation-4"><i
                class="fas fa-reply"></i> Volver</a>
        <p class="h3 text-blue">Información proveedor</p>
        <hr>
        {!! Form::model($proveedor, ['route' => ['admin.proveedors.update', $proveedor], 'method' => 'PUT', 'autocomplete' => 'off']) !!}
        @include('admin.proveedors.partials.form')
        {!! Form::submit('Guardar proveedor', ['class' => 'btn bg-navy btn-block']) !!}
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
