@extends('adminlte::page')

@section('title', 'ENASA | CREAR NUEVO CARGO')

@section('content')
    @include('sweetalert::alert')
    <x-card-header>
        <h3 class="text-white">Crear un nuevo cargo</h3>
    </x-card-header>

    <x-card-body>
        {!! Form::open(['route' => 'admin.cargos.store']) !!}
        @include('admin.cargos.partials.form')
        {!! Form::submit('Guardar cargo', ['class' => 'btn bg-navy btn-block']) !!}
        {!! Form::close() !!}
    </x-card-body>
@stop

@section('footer')
    <x-footer></x-footer>
@stop

@section('css')
    <link rel="stylesheet" href="{{ asset('vendor/cards.css') }}">
@stop
