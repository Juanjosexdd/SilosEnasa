@extends('adminlte::page')

@section('title', 'ENASA | CREAR NUEVO MUNICIPIO')

@section('content')
    @include('sweetalert::alert')
    <x-card-header>
        <h3 class="text-white">Crear un nuevo municipio</h3>
    </x-card-header>

    <x-card-body>
        {!! Form::open(['route' => 'admin.ciudads.store']) !!}

        @include('admin.ciudads.partials.form')
        {!! Form::submit('Guardar Municipio', ['class' => 'btn bg-navy btn-block']) !!}
        {!! Form::close() !!}
    </x-card-body>
@stop

@section('footer')
    <x-footer></x-footer>
@stop

@section('css')
    <link rel="stylesheet" href="{{ asset('vendor/cards.css') }}">
@stop
