@extends('adminlte::page')

@section('title', 'ENASA | CREAR NUEVO DOCUMENTO')


@section('content')
    <x-card-header>
        <h3 class="text-white">Crear un nuevo tipo de documento</h3>
    </x-card-header>
    <x-card-body>
        {!! Form::open(['route' => 'admin.tipodocumentos.store']) !!}
        @include('admin.tipodocumentos.partials.form')
        {!! Form::submit('Guardar tipo documento', ['class' => 'btn bg-navy btn-block']) !!}
        {!! Form::close() !!}
    </x-card-body>
@stop
@section('footer')
    <x-footer></x-footer>
@stop
