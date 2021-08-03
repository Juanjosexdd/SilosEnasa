@extends('adminlte::page')

@section('title', 'ENASA | CREAR ESTADO')

@section('content')
    @include('sweetalert::alert')
    <x-card-header>
        <h3 class="text-white">Crear nuevo estado</h3>

    </x-card-header>
    <x-card-body>

        {!! Form::open(['route' => 'admin.estados.store']) !!}

        @include('admin.estados.partials.form')
        {!! Form::submit('Guardar estado', ['class' => 'btn bg-navy btn-block']) !!}
        {!! Form::close() !!}
    </x-card-body>
@stop

@section('footer')
    <x-footer></x-footer>
@stop

@section('js')

    <script>
        swal({
            "timer": 1800,
            "title": "Título",
            "text": "Notificación Básica",
            "showConfirmButton": false
        });
    </script>
@stop
@section('css')
    <link rel="stylesheet" href=" {{ asset('vendor/cards.css') }} ">
@stop
