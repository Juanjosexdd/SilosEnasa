@extends('adminlte::page')

@section('title', 'ENASA | CREAR NUEVO DEPARTAMENTO')

@section('content')
    @include('sweetalert::alert')
    <x-card-header>
        <h3 class="text-white">Crear un nuevo departamento</h3>
    </x-card-header>

    <x-card-body>
        {!! Form::open(['route' => 'admin.departamentos.store']) !!}
        @include('admin.departamentos.partials.form')
        {!! Form::submit('Guardar departamento', ['class' => 'btn bg-navy btn-block']) !!}
        {!! Form::close() !!}
    </x-card-body>
@stop

@section('footer')
    <x-footer></x-footer>
@stop

@section('css')
    <link rel="stylesheet" href="{{ asset('vendor/cards.css') }}">
@stop
