@extends('adminlte::page')

@section('title', 'ENASA | CREAR NUEVO ROL')

@section('content')
    @include('sweetalert::alert')
    <x-card-header>
        <h3 class="text-white">Registrar nuevo rol</h3>
    </x-card-header>

    <x-card-body>
        {!! Form::open(['route' => 'admin.roles.store']) !!}
        @include('admin.roles.partials.form')
        {!! Form::submit('CREAR ROL', ['class' => 'btn btn-block bg-navy btn-sm px-3 py-2 elevation-4']) !!}
        {!! Form::close() !!}
    </x-card-body>
@stop
@section('footer')
    <x-footer></x-footer>
@stop